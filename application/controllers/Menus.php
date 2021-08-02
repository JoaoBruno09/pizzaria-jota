<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('name')) {
            redirect();
        }
        $this->load->Model('Functions');
    }

    public function index() {
        $this->load->view('template/head');
        $data["items"] = $this->Functions->count_items();
        $this->load->view('modules/navigation',$data);
        $data1["get_menus"] = $this->Functions->get_menus();
        $this->load->view('sections/menus',$data1);
        $this->load->view('template/footer');
    }

}
