<?php
defined ('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

    }

    public function index()
    {
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
        else
        {
            $this->_login();
        }
    }
}