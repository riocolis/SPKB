<?php
defined ('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');

    }
    public function index()
    {
        $data['title'] = 'Halaman Utama Guru';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebarguru',$data);
        $this->load->view('templates/topbarguru',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('templates/footerguru');
    }

    public function kelas()
    {
        $data['title'] = 'Buat Kelas';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $data['menu'] = $this->admin_model->kelas();
        $data['mapel'] = $this->admin_model->get_mapel();
        $data['kelas'] = $this->admin_model->get_kelas();
        $data['guru'] = $this->admin_model->get_guru();
        $data['kode'] = $this->admin_model->kode_kelas();

        $this->form_validation->set_rules('mapel','Mapel','required');
        $this->form_validation->set_rules('kelas','Kelas','required');
        $this->form_validation->set_rules('guru','Guru','required');

        if($this->form_validation->run()==false)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebarguru',$data);
            $this->load->view('templates/topbarguru',$data);
            $this->load->view('admin/kelas',$data);
            $this->load->view('templates/footerguru');
        }
        else
        {
            $kode = $this->input->post('kode');
            $qmapel = $this->input->post('mapel');
            $qkelas = $this->input->post('kelas');
            $qguru = $this->input->post('guru');
            $data = array(
                'kode_kelas' => $kode,
                'id_mapel' => $qmapel,
                'id_kelas' => $qkelas,
                'id_guru' => $qguru,
            );
            if($this->admin_model->cekkelas($kode,$qmapel,$qkelas,$qguru)==true)
            {
                $this->db->update('kelas',$data);
            }
            else
            {
                $this->db->insert('kelas',$data);
            }
            redirect('admin/kelas');
        }
    }
    public function hapuskelas()
    {
        $kode = $this->input->post('kode');
        $qmapel = $this->input->post('mapel');
        $qkelas = $this->input->post('kelas');
        $qguru = $this->input->post('guru');
        $data = array(
            'kode_kelas' => $kode,
            'id_mapel' => $qmapel,
            'id_kelas' => $qkelas,
            'id_guru' => $qguru,
        );
        if ($this->admin_model->cekkelas($kode, $qmapel, $qkelas, $qguru) == true) 
        {
            $this->db->delete('kelas', $data);
        }
        $data['title'] = 'Buat Kelas';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $data['menu'] = $this->admin_model->kelas();
        $data['mapel'] = $this->admin_model->get_mapel();
        $data['kelas'] = $this->admin_model->get_kelas();
        $data['guru'] = $this->admin_model->get_guru();
        $data['kode'] = $this->admin_model->kode_kelas();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebarguru',$data);
        $this->load->view('templates/topbarguru',$data);
        $this->load->view('admin/kelas',$data);
        $this->load->view('templates/footerguru');
    }
    public function tugas()
    {
        $data['title'] = 'Tugas';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarguru', $data);
        $this->load->view('templates/topbarguru', $data);
        $this->load->view('admin/tugas', $data);
        $this->load->view('templates/footerguru');
    }
    public function buattugas()
    {
        $data['title'] = 'Buat Tugas';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $data['tugas'] = $this->admin_model->get_tugas();
        $data['kelas'] = $this->admin_model->kelas();
        $data['upload'] = $this->admin_model->do_upload();
        $data['alltugas'] = $this->admin_model->getalltugas();

        $this->form_validation->set_rules('kode','KodeKelas','required');
        $this->form_validation->set_rules('tugas','Tugas','required');
        
        if($this->form_validation->run()==false)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebarguru',$data);
            $this->load->view('templates/topbarguru',$data);
            $this->load->view('admin/tugas/buattugas',$data);
            $this->load->view('templates/footerguru');
        }
        else
        {
            $kode = $this->input->post('kode');
            $tugas = $this->input->post('tugas');
            $waktu = $this->input->post('tanggal');
            $doc = $_FILES['doc']['name'];
            $test = str_replace(' ','_',$doc);
        
            $data = array(
                'id_kode_kelas' => $kode,
                'id_tugas' => $tugas,
                'nama_dokumen' => $test,
                'date' => $waktu
            );
            
            if($this->admin_model->cektugas($kode,$tugas)==true)
            {
                $this->db->update('tugas',$data);
            }
            else
            {
                $this->db->insert('tugas',$data);
            }
            redirect('admin/buattugas');
        }
    }
    public function tugassiswa()
    {
        $data['title'] = 'Tugas Siswa';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $data['tugas'] = $this->admin_model->get_tugas();
        $data['kelas'] = $this->admin_model->kelas();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebarguru',$data);
        $this->load->view('templates/topbarguru',$data);
        $this->load->view('admin/tugas/tugassiswa',$data);
        $this->load->view('templates/footerguru');
    }
    public function lihattugasiswa()
    {
        $data['title'] = 'Table tugas Siswa';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $kode = $this->input->post('kode');
        $data['tugas'] = $this->input->post('tugas');
        if($data['tugas'] == 1)
        {
            $data['siswa']= $this->admin_model->get_tugasiswaindividu($kode);
        }
        else
        {
            $data['siswa']=$this->admin_model->tampilsiswakelompok($kode,$data['tugas']);
        }
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebarguru',$data);
        $this->load->view('templates/topbarguru',$data);
        $this->load->view('admin/tugas/lihattugassiswa',$data);
        $this->load->view('templates/footerguru');
    }

    public function download($nama)
    {
        $this->load->helper('download');
        $fileinfo = $this->admin_model->download($nama);
        $file = 'dokumen/'.$fileinfo['nama_dokumen'];
        force_download($file, NULL);
    }

    public function downloadtugassiswa($nama)
    {
        $this->load->helper('download');
        $fileinfo = $this->admin_model->downloadindividu($nama);
        $file = 'dokumensiswa/'.$fileinfo['nama_dokumen'];
        force_download($file, NULL);
    }

    public function kategorinilai()
    {
        $data['title'] = 'Nilai';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $data['tugas'] = $this->admin_model->get_tugas();
        $data['kelas'] = $this->admin_model->kelas();
        
        $this->form_validation->set_rules('kode','KodeKelas','required');
        $this->form_validation->set_rules('tugas','Tugas','required');

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebarguru',$data);
        $this->load->view('templates/topbarguru',$data);
        $this->load->view('admin/kategorinilai',$data);
        $this->load->view('templates/footerguru');

    }

    public function tambahnilaisiswa()
    {
        $data['title'] = 'Tampil Nilai';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $data['tugas'] = $this->admin_model->get_tugas();
        $data['kelas'] = $this->admin_model->kelas();

        $kode = $this->input->post('kode');
        $tugas = $this->input->post('tugas');
        $data['simple'] = $kode;
        $data['tugas'] = $tugas;
        $data['siswa'] = $this->admin_model->getallnilai($kode,$tugas);
        

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebarguru',$data);
        $this->load->view('templates/topbarguru',$data);
        $this->load->view('admin/nilai/tambahnilaisiswa',$data);
        $this->load->view('templates/footerguru');
    }

    public function editnilai()
    {
        $data['title'] = 'Edit Nilai';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $kode = $this->input->post('kode1');
        $tugas = $this->input->post('tugas1');
        $id_siswa = $this->input->post('id_siswa');
        $nilai = $this->input->post('nilai');
        $data1 = array(
            'id_kode_kelas' => $kode,
            'id_tugas' => $tugas,
            'id_siswa' => $id_siswa,
            'nilai' => $nilai
        );
        if($id_siswa != null || $id_siswa = '')
        {
            $this->admin_model->update_nilai($data1,$id_siswa,$kode,$tugas);
        }
        $data['simple'] = $kode;
        $data['tugas'] = $tugas;
        $data['siswa'] = $this->admin_model->getallnilai($kode,$tugas);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebarguru',$data);
        $this->load->view('templates/topbarguru',$data);
        $this->load->view('admin/nilai/tambahnilaisiswa',$data);
        $this->load->view('templates/footerguru');
    }

    public function kelompok()
    {
        $data['title'] = 'Kelompok';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $data['tugas'] = $this->admin_model->get_tugas();
        $data['kelas'] = $this->admin_model->kelas();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebarguru',$data);
        $this->load->view('templates/topbarguru',$data);
        $this->load->view('admin/kelompok',$data);
        $this->load->view('templates/footerguru');
    }
    public function bagikelompok()
    {
        $data['title'] = 'Pembagian Kelompok';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $data['tugas'] = $this->admin_model->get_tugas();
        $data['kelas'] = $this->admin_model->kelas();

        $kode = $this->input->post('kode');
        $tugas = $this->input->post('tugas');
        $data['siswa'] = $this->admin_model->ranking($kode,$tugas);
        $data['simple'] = $kode;
        $data['tugas'] = $tugas;
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebarguru',$data);
        $this->load->view('templates/topbarguru',$data);
        $this->load->view('admin/kelompok/bagikelompok',$data);
        $this->load->view('templates/footerguru');
    }
    public function bagibagikelompok()
    {
        $data['title'] = 'Bagi Kelompok Kelompok';
        $data['user'] = $this->db->get_where('nama_guru', ['username' => $this->session->userdata('nama')])->row_array();
        $data['tugas'] = $this->admin_model->get_tugas();
        $data['kelas'] = $this->admin_model->kelas();
        
        $kode = $this->input->post('kode1');
        $tugas = $this->input->post('tugas1');
        
        $data['simple'] = $kode;
        $data['tugas'] = $tugas;
        $jmlkelompok = $this->input->post('jmlkelompok');
        $data['max'] = $jmlkelompok;
        $data['siswa'] = $this->admin_model->ranking($kode,$tugas);
        $this->admin_model->bagikelompok($data['siswa'],$jmlkelompok,$kode);
        $data['test']=$this->admin_model->get_bagikelompok();
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebarguru',$data);
        $this->load->view('templates/topbarguru',$data);
        $this->load->view('admin/kelompok/bagibagikelompok',$data);
        $this->load->view('templates/footerguru');
    }
}