<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pizzas extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->Model('Functions');
    }

    public function index() {
        $this->load->view('template/head');
        $data["items"] = $this->Functions->count_items();
        $this->load->view('modules/navigation',$data);
        $data["get_pizzas"] = $this->Functions->get_pizzas();
        $this->load->view('sections/pizzas',$data);
        $this->load->view('modules/modal_registo');
        $this->load->view('template/footer');
    }

}
