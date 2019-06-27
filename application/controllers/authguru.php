<?php
defined ('BASEPATH') or exit('No direct script access allowed');

class authguru extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama','Name','required|trim');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('templates/auth_header');
            $this->load->view('authguru/login');
            $this->load->view('templates/auth_footer');
        }
        else
        {
            $this->_login();
        }
            

    }
    private function _login()
    {
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');

        $user = $this->db->get_where('nama_guru', ['username' => $nama])->row_array();

        if($user != null)
        {
            if(password_verify($password,$user['password']))
            {
                $data = [
                    'nama' => $user['username']
                    
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            }
            else
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah !!</div>');
                redirect('authguru');    
            }
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">user tidak terdaftar !!! </div>');
            redirect('authguru');
        }
        
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama','Name','required|trim');
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[0]|matches[password2]',[
            'matches' => 'password tidak sama!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

       if($this->form_validation->run() == false)
        {
            $this->load->view('templates/auth_header');
            $this->load->view('authguru/registration');
            $this->load->view('templates/auth_footer');
            $this->session->set_flashdata('message1','<div class="alert alert-danger" role="alert">Data GAGAL !! </div>');
        }
        else {
            if($this->admin_model->cek_guru($this->input->post('username'))==true)
            {
                $data = [
                    'username' => htmlspecialchars($this->input->post('username')),
                    'nama_guru' =>  htmlspecialchars($this->input->post('nama')),
                    'jenis_kelamin' => $this->input->post('kelamin'),
                    'password' =>  password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                    
                ];
                $this->db->where('username',$this->input->post('username'));
                $this->db->update('nama_guru',$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Edit Suksess !! </div>');
                redirect('authguru');
            }
            else
            {
            $data = [
                'username' => htmlspecialchars($this->input->post('username')),
                'nama_guru' =>  htmlspecialchars($this->input->post('nama')),
                'jenis_kelamin' => $this->input->post('kelamin'),
                'password' =>  password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                
            ];
            $this->db->insert('nama_guru',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data simpan Suksess !! </div>');
            redirect('authguru');
            }
        }
        
    }
    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat kamu sudah keluar !!! </div>');
        redirect('authguru');

    }
}