<?php

class Backoffice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Functions');
        if (!$this->session->userdata('name')) {
            redirect();
        }
    }

    public function profile() {

        $this->load->view('template/head');
        $data["items"] = $this->Functions->count_items();
        $this->load->view('modules/navigation', $data);
        $data["get_orders"] = $this->Functions->get_orders();
        $this->load->view('backoffice/profile', $data);
        $this->load->view('template/footer');
    }

    public function admin() {

        $this->load->view('template/head_admin');
        $datamessages["messages"] = $this->Functions->get_messages();
        $this->load->view('modules/sidebar');
        $data["count_orders"] = $this->Functions->count_orders();
        $data["count_clients"] = $this->Functions->count_clients();
        $data["count_total"] = $this->Functions->count_total();
        $data["get_orders_backoffice"] = $this->Functions->get_orders_backoffice();
        $this->load->view('modules/dashboard', $data);
        $this->load->view('template/footer_admin');
    }

    public function clients() {

        $this->load->view('template/head_admin');
        $datamessages["messages"] = $this->Functions->get_messages();
        $this->load->view('modules/sidebar');
        $data["get_clients"] = $this->Functions->get_clients();
        $this->load->view('backoffice/clients', $data);
        $this->load->view('template/footer_admin');
    }

    public function allorders() {
        $this->load->view('template/head_admin');
        $datamessages["messages"] = $this->Functions->get_messages();
        $this->load->view('modules/sidebar');
        $data["get_all_orders_backoffice"] = $this->Functions->get_all_orders_backoffice();
        $this->load->view('backoffice/allorders',$data);
        $this->load->view('template/footer_admin');
    }

    public function orders() {

        $this->load->view('template/head_admin');
        $datamessages["messages"] = $this->Functions->get_messages();
        //$this->load->view('modules/navigation_admin', $datamessages);
        $this->load->view('modules/sidebar');
        $data["get_orders_backoffice"] = $this->Functions->get_orders_backoffice();
        $this->load->view('backoffice/orders', $data);
        $this->load->view('template/footer_admin');
    }

    public function vieworder($order_id) {

        $data["orderview"] = $this->db->query("select o.order_id, name,nif, phone, total_price, type_payment, date, status, hour, address, menu_name Produto, quantity_menu Quantidade from orders o LEFT OUTER JOIN users as u on u.user_id=o.user_id inner join orders_detail_menu odm on o.order_id=odm.order_id join menus m on m.menu_id=odm.menu_id where o.order_id='" . $order_id . "' union all select o.order_id, name,nif, phone, total_price, type_payment, date, status, hour, address, pizza_name Produto, quantity_pizza Quantidade from orders o LEFT OUTER JOIN users as u on u.user_id=o.user_id inner join orders_detail_pizza odp on o.order_id=odp.order_id join pizzas p on p.pizza_id=odp.pizza_id where o.order_id='" . $order_id . "'");

        $this->load->view('template/head_admin');
        $datamessages["messages"] = $this->Functions->get_messages();
        $this->load->view('modules/sidebar');
        $this->load->view('backoffice/vieworder', $data);
        $this->load->view('template/footer_admin');
    }

    public function addproducts() {

        $this->load->view('template/head_admin');
        $datamessages["messages"] = $this->Functions->get_messages();
        $this->load->view('modules/sidebar');
        $this->load->view('backoffice/addproducts');
        $this->load->view('template/footer_admin');
    }

    public function deleteorder() {

        if ($this->input->post('order_id')) {
            $order_id = $this->input->post('order_id');
            echo $order_id;
        }
        $this->db->where('order_id', $order_id);
        $this->db->delete('orders');
    }

    public function viewclient($user_id) {
        $this->db->where('user_id', $user_id);
        $data["clientview"] = $this->db->get('users');
        $this->load->view('template/head_admin');
        $datamessages["messages"] = $this->Functions->get_messages();
        $this->load->view('modules/sidebar');
        $this->load->view('backoffice/viewclient', $data);
        $this->load->view('template/footer_admin');
    }

    public function updateorder() {
        if ($this->input->post('order_id')) {
            $order_id = $this->input->post('order_id');
            echo $order_id;
        }
        if ($this->input->post('statusorder')) {
            $statusorder = $this->input->post('statusorder');
            echo $statusorder;
        }

        $data = array(
            'status' => $statusorder
        );

        $this->db->where('order_id', $order_id);
        $this->db->update('orders', $data);
    }

}
