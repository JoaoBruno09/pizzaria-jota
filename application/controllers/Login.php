<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Functions');
    }

    public function index() {
        
    }

    public function oi(){
        echo("oi");
    }
    
    public function logar() {

        $email = $this->input->post('email');
        $password = do_hash($this->input->post('password'));

        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));

        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value_query) {
                $name = $value_query->name;
                $address = $value_query->address;
                $phone = $value_query->phone;
                $place = $value_query->place;
                $postal_code1 = $value_query->postal_code1;
                $postal_code2 = $value_query->postal_code2;
                $nif = $value_query->nif;
                $type_account = $value_query->type_account;
                $photo = $value_query->photo;
            }
            $this->session->set_userdata(array(
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'password' => $password,
                'place' => $place,
                'postal_code1' => $postal_code1,
                'postal_code2' => $postal_code2,
                'nif' => $nif,
                'type_account' => $type_account,
                'photo' => $photo,
            ));
            if($this->session->userdata('type_account') === 'client'){
                echo '<script>window.location.href="' . base_url() . '";</script>';
            }
            if($this->session->userdata('type_account') === 'admin'){
                $this->Functions->alert2('Backoffice/admin');
            }
        } else {
            echo '<script>alert("Dados incorretos");</script>';
            echo '<script>window.location.href="' . base_url() . '";</script>';
        }
    }

    public function deslogar() {
        $userdataid = $this->session->userdata('user_id');
        $this->db->query("DELETE FROM cart WHERE user_id='$userdataid'");
        $this->session->sess_destroy();
        redirect();
    }

    public function createaccount() {
        $type_account = 'client';
        $array = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => do_hash($this->input->post('password')),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'place' => $this->input->post('place'),
            'postal_code1' => $this->input->post('postal_code1'),
            'postal_code2' => $this->input->post('postal_code2'),
            'nif' => $this->input->post('nif'),
            'type_account' => $type_account,
        );
        $email = $this->input->post('email');
        $insert = $this->db->insert('users', $array);
        if ($insert == TRUE) {
            $query = $this->db->get('users');
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $value_query) {
                    $name = $value_query->name;
                    $address = $value_query->address;
                    $phone = $value_query->phone;
                    $password = $value_query->password;
                    $place = $value_query->place;
                    $postal_code1 = $value_query->postal_code1;
                    $postal_code2 = $value_query->postal_code2;
                    $nif = $value_query->nif;
                    $type_account = $value_query->type_account;
                }
                $this->session->set_userdata(array(
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'password' => $password,
                    'place' => $place,
                    'postal_code1' => $postal_code1,
                    'postal_code2' => $postal_code2,
                    'nif' => $nif,
                    'type_account' => $type_account
                ));
                echo '<script>window.location.href="' . base_url() . '";</script>';
            } else {
                echo '<script>alert("Dados incorretos, tente novamente.");</script>';
                echo '<script>window.location.href="' . base_url() . '";</script>';
            }
        }
    }
    
        public function updateaccount() {

        $nif = $this->session->userdata('nif');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $place = $this->input->post('place');
        $postal_code1 = $this->input->post('postal_code1');
        $postal_code2 = $this->input->post('postal_code2');

        //GRAVAR NOVOS DADOS

        $array = array(
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'place' => $place,
            'postal_code1' => $postal_code1,
            'postal_code2' => $postal_code2
        );
        $this->db->where('nif', $nif);
        $update = $this->db->update('users', $array);

        if ($update == TRUE) {
            $this->Functions->alert2('Backoffice/profile');
        } else {
            $this->Functions->alert('Erro na atualização', 'Backoffice/profile');
        }
    }

    public function updatepw() {

        $email = $this->session->userdata('email');
        $password = do_hash($this->input->post('new_password'));

        //GRAVAR NOVA PASSWORD

        $array = array(
            'password' => $password
        );
        $this->db->where('email', $email);
        $update = $this->db->update('users', $array);

        if ($update == TRUE) {
            $this->Functions->alert2('Backoffice/profile');
        } else {
            $this->Functions->alert('Erro na atualização', 'Backoffice/profile');
        }
    }

}