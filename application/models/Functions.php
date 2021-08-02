<?php

class Functions extends CI_Model {

    public function alert($message, $url) {

        echo '<script>'
        . 'alert("' . $message . '");'
        . 'window.location.href="' . base_url() . $url . '";'
        . '</script>';
    }

    public function alert2($url) {

        echo '<script>'
        . 'window.location.href="' . base_url() . $url . '";'
        . '</script>';
    }

    public function get_pizzas() {
        $query = $this->db->query("SELECT * FROM pizzas ORDER BY pizza_id");
        return $query;
    }

    public function get_menus() {
        $query1 = $this->db->query("SELECT * FROM menus ORDER BY menu_id");
        return $query1;
    }

    public function get_cart() {
        $userdataid = $this->session->userdata('user_id');
        $query2 = $this->db->query("SELECT * FROM cart as c LEFT OUTER JOIN pizzas as p on c.pizza_id=p.pizza_id LEFT OUTER JOIN menus as m on c.menu_id=m.menu_id WHERE user_id='$userdataid'");
        return $query2;
    }

    public function count_items() {
        $userdataid = $this->session->userdata('user_id');
        $query3 = $this->db->query("SELECT cart_id FROM cart WHERE user_id=' $userdataid'");
        return $query3->num_rows();
    }

    public function calcTotal() {
        $userdataid = $this->session->userdata('user_id');
        $query4 = $this->db->query("SELECT pizza_price, menu_price, quantity FROM cart WHERE user_id='$userdataid'");
        $soma = 0;
        $totalmenus = 0;
        $totalpizzas = 0;
        if ($query4->num_rows() > 0) {
            foreach ($query4->result()as $row) {
                $quantity = $row->quantity;
                if ($row->pizza_price != null) {
                    $pizza_price = $row->pizza_price;
                    $totalpizzas += $pizza_price * $quantity;
                } else {
                    $menu_price = $row->menu_price;
                    $totalmenus += $menu_price * $quantity;
                }
            }
            $soma = $totalmenus + $totalpizzas;
        }
        return $soma;
    }

    public function get_orders() {
        $userdataid = $this->session->userdata('user_id');
        $query = $this->db->query("select o.order_id,date,status,total_price,menu_name,pizza_name from orders o left outer join orders_detail_menu odm on o.order_id=odm.order_id left outer join menus m on m.menu_id=odm.menu_id left outer join orders_detail_pizza odp on o.order_id=odp.order_id left outer join pizzas p on p.pizza_id=odp.pizza_id WHERE o.user_id='" . $userdataid . "' order by order_id DESC LIMIT 4");
        return $query;
    }

    public function count_orders() {
        $query3 = $this->db->query("Select order_id from orders WHERE status='Paga' or status='A ser preparada' or status='A ser entregue' order by hour DESC");
        return $query3->num_rows();
    }

    public function get_orders_pendent() {
        $query3 = $this->db->query("Select * from orders WHERE status='Paga' or status='A ser preparada' or status='A ser entregue' order by hour DESC");
        return $query3;
    }

    public function count_clients() {
        $query3 = $this->db->query("Select user_id from users where type_account='client'");
        return $query3->num_rows();
    }

    public function get_clients() {
        $query3 = $this->db->query("Select * from users where type_account='client' order by user_id DESC");
        return $query3;
    }

    public function count_total() {
        $last_date = date("Y/m/d", strtotime('-1 month'));
        $present_date = date("Y/m/d");
        $total = 0;
        $total_price = 0;
        $query3 = $this->db->query("SELECT total_price FROM orders WHERE date >= '$last_date' and date <= '$present_date' and status='Entregue'");
        if ($query3->num_rows() > 0) {
            foreach ($query3->result()as $row) {
                $total_price += $row->total_price;
            }
            $total = $total_price;
        }
        return $total;
    }

    public function get_orders_backoffice() {
        $query = $this->db->query("select o.order_id, name, menu_name Produto, total_price,status from orders o LEFT OUTER JOIN users as u on u.user_id=o.user_id inner join orders_detail_menu odm on o.order_id=odm.order_id join menus m on m.menu_id=odm.menu_id where status='Paga' or status='A ser Preparada' or status='A ser Entregue' union all select o.order_id, name, pizza_name Produto, total_price, status from orders o LEFT OUTER JOIN users as u on u.user_id=o.user_id inner join orders_detail_pizza odp on o.order_id=odp.order_id join pizzas p on p.pizza_id=odp.pizza_id where status='Paga' or status='A ser Preparada' or status='A ser Entregue' order by order_id DESC");
        return $query;
    }
    
    public function get_messages() {
        $query= $this->db->query("SELECT * FROM `messages` order by message_id DESC Limit 3");
        return $query;
    }
    
    public function get_all_orders_backoffice() {
        $query = $this->db->query("select o.order_id, name, menu_name Produto, total_price,status from orders o LEFT OUTER JOIN users as u on u.user_id=o.user_id inner join orders_detail_menu odm on o.order_id=odm.order_id join menus m on m.menu_id=odm.menu_id union all select o.order_id, name, pizza_name Produto, total_price, status from orders o LEFT OUTER JOIN users as u on u.user_id=o.user_id inner join orders_detail_pizza odp on o.order_id=odp.order_id join pizzas p on p.pizza_id=odp.pizza_id order by order_id DESC");
        return $query;
    }

}
