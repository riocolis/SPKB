<?php
defined ('BASEPATH') or exit('No direct script access allowed');

class authsiswa extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');

    }

    public function index()
    {
        $this->form_validation->set_rules('nama','Name','required|trim');
        $this->form_validation->set_rules('password','Password','trim|required');
        $test['nama_kelas'] = $this->user_model->get_kelas();
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('templates/auth_header');
            $this->load->view('authsiswa/login',$test);
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
        $kelas = $this->input->post('kelas');
        $user = $this->db->get_where('nama_siswa', ['id_nis' => $nama,'id_kelas' => $kelas, ])->row_array();
        if($user != null)
        {
            if(password_verify($password,$user['password'])&& $user['id_kelas']==$kelas && $user['id_nis']==$nama)
            {
                $data = [
                    'id' => $user['id'],  
                    'nama' => $user['nama_siswa'],
                    'id_kelas' => $user['id_kelas']
                ];
                $this->session->set_userdata($data);
                redirect('user');
            }
            else
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">NIS, Password atau Kelas Salah !!</div>');
                redirect('authsiswa');    
            }
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">user tidak terdaftar !!! </div>');
            redirect('authsiswa');
        }
        
    }

    public function registration()
    {
        $test['id_nis'] = $this->user_model->kode_siswa();
        $test['nama_kelas'] = $this->user_model->get_kelas();
        $this->form_validation->set_rules('nama','Name','required|trim');
        $this->form_validation->set_rules('kelas','Kelas','required|trim');
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[0]|matches[password2]',[
            'matches' => 'password tidak sama!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

       if($this->form_validation->run() == false)
        {
            $this->load->view('templates/auth_header');
            $this->load->view('authsiswa/registration',$test);
            $this->load->view('templates/auth_footer');
            $this->session->set_flashdata('message1','<div class="alert alert-danger" role="alert">Data GAGAL !! </div>');
        }
        else 
        {
            if($this->user_model->cek_siswa($this->input->post('id_nis'))== true )
            {
                $data = [
                    //'id_nis' => $this->input->post('id_nis'),
                    'nama_siswa' =>  htmlspecialchars($this->input->post('nama')),
                    'jenis_kelamin' => $this->input->post('kelamin'),
                    'password' =>  password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                    'id_kelas' => $this->input->post('kelas')
                ];
                $this->db->where('id_nis',$this->input->post('id_nis'));
                $this->db->update('nama_siswa',$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Edit Suksess !! </div>');
                redirect('authsiswa');
            }
            else
            {
                $data = [
                    'id_nis' => $this->input->post('id_nis'),
                    'nama_siswa' =>  htmlspecialchars($this->input->post('nama')),
                    'jenis_kelamin' => $this->input->post('kelamin'),
                    'password' =>  password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                    'id_kelas' => $this->input->post('kelas')
                ];
                $this->db->insert('nama_siswa',$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data simpan Baru Suksess !! </div>');
                redirect('authsiswa');
            }

        }
        
    }
    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat kamu sudah keluar !!! </div>');
        redirect('authsiswa');

    }
}