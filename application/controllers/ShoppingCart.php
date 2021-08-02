<?php

class ShoppingCart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Functions');
        if (!$this->session->userdata('name')) {
            redirect();
        }
    }

    public function car() {
        $this->load->view('template/head');
        $data["items"] = $this->Functions->count_items();
        $this->load->view('modules/navigation', $data);
        $data["get_cart"] = $this->Functions->get_cart();
        $data["soma"] = $this->Functions->calcTotal();
        $this->load->view('backoffice/car', $data);
        $this->load->view('template/footer');
    }

    public function addproduct() {

//BUSCAR O ID DO UTILIZADOR COM SESSÃO INICIADA
        $userdataname = $this->session->userdata('name');
        $query = $this->db->query("SELECT user_id FROM users WHERE name='$userdataname'");
        $user_id = $query->row()->user_id;

//QUANTIDADE DO PRODUTO
        $quantity = 1;

//BUSCAR O ID DA PIZZA SELECIONADA
        if ($this->input->post('pizza_id')) {
            $pizza_id = $this->input->post('pizza_id');
            echo $pizza_id;
        }

//BUSCAR O PREÇO DA PIZZA SELECIONADA
        if ($this->input->post('pizza_price')) {
            $pizza_price = $this->input->post('pizza_price');
            echo $pizza_price;
        }

//BUSCAR O ID DO MENU SELECIONADO
        if ($this->input->post('menu_id')) {
            $menu_id = $this->input->post('menu_id');
            echo $menu_id;
        }
//BUSCAR O PREÇO DO MENU SELECIONADO
        if ($this->input->post('menu_price')) {
            $menu_price = $this->input->post('menu_price');
            echo $menu_price;
        }

        $array = array(
            'user_id' => $user_id,
            'quantity' => $quantity,
            'pizza_id' => $pizza_id,
            'pizza_price' => $pizza_price,
            'menu_id' => $menu_id,
            'menu_price' => $menu_price
        );



        if ($menu_id == null) {
//VERIFICAR SE A PIZZA SELECIONADA JÁ ESTA NA BASE DE DADOS
            $userdataid = $this->session->userdata('user_id');
            $query2 = $this->db->query("SELECT quantity FROM cart WHERE user_id='$userdataid' AND pizza_id='$pizza_id' AND pizza_price='$pizza_price'");
//SE ESTIVER UPDATE QUANTITY DA PIZZA
            if ($query2->num_rows() > 0) {
                foreach ($query2->result()as $row) {
                    $quantity = $row->quantity + 1;
                    $this->db->query("UPDATE cart SET quantity='$quantity' WHERE user_id='$userdataid' AND pizza_id='$pizza_id' AND pizza_price='$pizza_price'");
                }
            } else {
//SE NÃO ESTIVER INSERT PIZZA
                $insert = $this->db->insert('cart', $array);
                if ($insert == TRUE) {
                    $query = $this->db->get('cart');
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $value_query) {
                            $user_id = $value_query->user_id;
                            $pizza_id = $value_query->pizza_id;
                            $pizza_price = $value_query->pizza_price;
                            $menu_id = $value_query->menu_id;
                            $menu_price = $value_query->menu_price;
                            $quantity = $value_query->quantity;
                        }
                        $this->session->set_userdata(array(
                            'user_id' => $user_id,
                            'pizza_id' => $pizza_id,
                            'pizza_price' => $pizza_price,
                            'menu_id' => $menu_id,
                            'menu_price' => $menu_price,
                            'quantity' => $quantity
                        ));
                    }
                }
            }
        } else {



//VERIFICAR SE O MENU SELECIONADO JÁ ESTA NA BASE DE DADOS
            $userdataid = $this->session->userdata('user_id');
            $query3 = $this->db->query("SELECT quantity FROM cart WHERE user_id='$userdataid' AND menu_id='$menu_id'");
//SE ESTIVER UPDATE QUANTITY DO MENU
            if ($query3->num_rows() > 0) {
                foreach ($query3->result()as $row) {
                    $quantity = $row->quantity + 1;
                    $this->db->query("UPDATE cart SET quantity='$quantity' WHERE user_id='$userdataid' AND menu_id='$menu_id'");
                }
            } else {
//SE NÃO ESTIVER INSERT MENU
                $insert = $this->db->insert('cart', $array);
                if ($insert == TRUE) {
                    $query = $this->db->get('cart');
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $value_query) {
                            $user_id = $value_query->user_id;
                            $pizza_id = $value_query->pizza_id;
                            $pizza_price = $value_query->pizza_price;
                            $menu_id = $value_query->menu_id;
                            $menu_price = $value_query->menu_price;
                            $quantity = $value_query->quantity;
                        }
                        $this->session->set_userdata(array(
                            'user_id' => $user_id,
                            'pizza_id' => $pizza_id,
                            'pizza_price' => $pizza_price,
                            'menu_id' => $menu_id,
                            'menu_price' => $menu_price,
                            'quantity' => $quantity
                        ));
                    }
                }
            }
        }
    }

    public function removeproduct() {

        if ($this->input->post('cart_id')) {
            $cart_id = $this->input->post('cart_id');
            echo $cart_id;
        }
        $this->db->where('cart_id', $cart_id);
        $this->db->delete('cart');
    }

    public function changequantity() {

        $quantity = 0;

        if ($this->input->post('quantity')) {
            $quantity = $this->input->post('quantity');
            echo $quantity;
        }
        if ($this->input->post('pizza_id')) {
            $pizza_id = $this->input->post('pizza_id');
            echo $pizza_id;
        }

//BUSCAR O PREÇO DA PIZZA SELECIONADA
        if ($this->input->post('pizza_price')) {
            $pizza_price = $this->input->post('pizza_price');
            echo $pizza_price;
        }

//BUSCAR O ID DO MENU SELECIONADO
        if ($this->input->post('menu_id')) {
            $menu_id = $this->input->post('menu_id');
            echo $menu_id;
        }
//BUSCAR O PREÇO DO MENU SELECIONADO
        if ($this->input->post('menu_price')) {
            $menu_price = $this->input->post('menu_price');
            echo $menu_price;
        }

        if ($menu_id == null) {
//VERIFICAR SE A PIZZA SELECIONADA JÁ ESTA NA BASE DE DADOS
            $userdataid = $this->session->userdata('user_id');
            $query2 = $this->db->query("SELECT quantity FROM cart WHERE user_id='$userdataid' AND pizza_id='$pizza_id' AND pizza_price='$pizza_price'");
//SE ESTIVER UPDATE QUANTITY DA PIZZA
            if ($query2->num_rows() > 0) {
                foreach ($query2->result()as $row) {
                    $this->db->query("UPDATE cart SET quantity='$quantity' WHERE user_id='$userdataid' AND pizza_id='$pizza_id' AND pizza_price='$pizza_price'");
                }
            }
        } else {
            $userdataid = $this->session->userdata('user_id');
            $query3 = $this->db->query("SELECT quantity FROM cart WHERE user_id='$userdataid' AND menu_id='$menu_id'");
            if ($query3->num_rows() > 0) {
                foreach ($query3->result()as $row) {
                    $this->db->query("UPDATE cart SET quantity='$quantity' WHERE user_id='$userdataid' AND menu_id='$menu_id'");
                }
            }
        }
    }

    public function payment() {
        $this->load->view('template/head');
        $data["items"] = $this->Functions->count_items();
        $this->load->view('modules/navigation', $data);
        $data["get_cart"] = $this->Functions->get_cart();
        $data["soma"] = $this->Functions->calcTotal();
        $this->load->view('backoffice/payment', $data);
        $this->load->view('template/footer');
    }

    public function purchase() {

        $userdataid = $this->session->userdata('user_id');
        $date = date("Y/m/d");
        $hour = date("H:i:sa");
        $status = 'A ser preparada';
        $type_payment = 'Cobrança';

        if ($this->input->post('total')) {
            $total_price = $this->input->post('total');
        }

        $array = array(
            'user_id' => $userdataid,
            'date' => $date,
            'hour' => $hour,
            'total_price' => $total_price,
            'status' => $status,
            'type_payment' => $type_payment
        );

        $insert = $this->db->insert('orders', $array);
        if ($insert == TRUE) {
            $query = $this->db->get('orders');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $value_query) {
                    $userdataid = $value_query->user_id;
                    $date = $value_query->date;
                    $hour = $value_query->hour;
                    $total_price = $value_query->total_price;
                    $status = $value_query->status;
                    $type_payment = $value_query->type_payment;
                }
            }
        }
        $this->db->query("DELETE FROM cart WHERE user_id='$userdataid'");

        $query3 = $this->db->query("SELECT order_id FROM orders WHERE user_id='$userdataid' ORDER BY order_id DESC LIMIT 1");
        $order_id = $query3->row()->order_id;

        if ($this->input->post('menu_id')) {
            $menu_id = $this->input->post('menu_id');
            echo $menu_id;
        }

        if ($this->input->post('pizza_id')) {
            $pizza_id = $this->input->post('pizza_id');
            echo $pizza_id;
        }
        if ($this->input->post('quantity_pizza')) {
            $quantity_pizza = $this->input->post('quantity_pizza');
            echo $quantity_pizza;
        }
        if ($this->input->post('quantity_menu')) {
            $quantity_menu = $this->input->post('quantity_menu');
            echo $quantity_menu;
        }
        if ($this->input->post('subtotal_menu')) {
            $subtotal_menu = $this->input->post('subtotal_menu');
            echo $subtotal_menu;
        }
        if ($this->input->post('subtotal_pizza')) {
            $subtotal_pizza = $this->input->post('subtotal_pizza');
            echo $subtotal_pizza;
        }

        if ($pizza_id != null) {
            $array_pizza = array(
                'order_id' => $order_id,
                'pizza_id' => $pizza_id,
                'quantity_pizza' => $quantity_pizza,
                'subtotal_pizza' => $subtotal_pizza
            );
            $insert_pizza = $this->db->insert('orders_detail_pizza', $array_pizza);
            if ($insert_pizza == TRUE) {
                $query2 = $this->db->get('orders_detail_pizza');
                if ($query2->num_rows() > 0) {
                    foreach ($query2->result() as $value_query) {
                        $order_id = $value_query->order_id;
                        $pizza_id = $value_query->pizza_id;
                        $quantity_pizza = $value_query->quantity_pizza;
                        $subtotal_pizza = $value_query->subtotal_pizza;
                    }
                }
            }
        }

        if ($menu_id != null) {

            $array_menu = array(
                'order_id' => $order_id,
                'menu_id' => $menu_id,
                'quantity_menu' => $quantity_menu,
                'subtotal_menu' => $subtotal_menu,
            );

            $insert_menu = $this->db->insert('orders_detail_menu', $array_menu);
            if ($insert_menu == TRUE) {
                $query2 = $this->db->get('orders_detail_menu');
                if ($query2->num_rows() > 0) {
                    foreach ($query2->result() as $value_query) {
                        $order_id = $value_query->order_id;
                        $menu_id = $value_query->menu_id;
                        $quantity_menu = $value_query->quantity_menu;
                        $subtotal_menu = $value_query->subtotal_menu;
                    }
                }
            }
        }
    }

}
