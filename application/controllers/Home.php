<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Functions');
        $this->load->helper('url');
    }

    public function index() {

        $this->load->view('home');
        $this->load->view('template/head');
        $data["items"] = $this->Functions->count_items();
        $this->load->view('modules/navigation', $data);
        $this->load->view('sections/about');
        $this->load->view('sections/contact');
        $this->load->view('modules/modal_registo');
        $this->load->view('template/footer');
    }

    public function contact() {

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'yourhost',
            'smtp_port' => 465,
            'smtp_user' => 'youruser',
            'smtp_pass' => 'yourpassword',
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'smtp_timeout' => '4',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);

        $emailcontact = $this->input->post('emailcontact');

        $array = array(
            'namecontact' => $this->input->post('namecontact'),
            'emailcontact' => $this->input->post('emailcontact'),
            'subjectcontact' => $this->input->post('subjectcontact'),
            'messagecontact' => $this->input->post('messagecontact'),
        );

        

        //EMAIL ADMIN

        $messageamin = $this->load->view('sections/email/email_admin', $array, TRUE);

        $this->email->from('geral@pizzaria-jota.pt', 'Pizzaria Jota');
        $this->email->to('geral@jbr-projects.pt');

        $this->email->subject('Contacto');
        $this->email->message($messageamin);

        $this->email->send();

        //EMAIL CLIENT

        $messageclient = $this->load->view('sections/email/email_client', $array, TRUE);

        $this->email->from('geral@pizzaria-jota.pt', 'Pizzaria Jota');
        $this->email->to($emailcontact);

        $this->email->subject('Contacto');
        $this->email->message($messageclient);

        $this->email->send();
        $this->db->insert('messages', $array);
    }

    public function email() {
        $this->load->view('sections/email/email_client');
    }

}
