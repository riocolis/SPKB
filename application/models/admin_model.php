<?php
class Admin_model extends CI_Model
{
    public function __construct()
    {
            parent::__construct();
    }
    public function get_mapel()
    {
        $query = $this->db->get('nama_mapel');
        return $query->result_array();
    }
    public function get_kelas()
    {
        $query = $this->db->get('nama_kelas');
        return $query->result_array();
    }
    public function get_guru()
    {
        $query = $this->db->get('nama_guru');
        return $query->result_array();
    }
    public function get_guru_name($name)
    {
        $this->db->where('username',$name);
        $query = $this->db->get('nama_guru');
        return $query->result_array();
    }
    public function get_siswa()
    {
        $query = $this->db->get('nama_siswa');
        return $query->result_array();
    }
    public function get_kelompok()
    {
        $query = $this->db->get('nama_kelompok');
        return $query->result_array();
    }
    public function get_bagikelompok()
    {
        $this->db->select('*');
        $this->db->from('kelompok');
        $this->db->order_by('id_kelompok','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_tugasiswaindividu($kode)
    {
        $this->db->select('*');
        $this->db->from('tugas_siswa');
        $this->db->join('nama_siswa','tugas_siswa.id_siswa = nama_siswa.id');
        $this->db->join('kelas','tugas_siswa.id_kode_kelas = kelas.kode_kelas');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->where('kode_kelas',$kode);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_tugasiswakelompok($kode)
    {
        $this->db->where('id_kode_kelas',$kode);
        $query = $this->db->get('tugas_siswa_kelompok');
        return $query->result_array();
    }
    public function kelas($nama)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->join('nama_kelas','kelas.id_kelas = nama_kelas.id');
        $this->db->join('nama_guru','kelas.id_guru = nama_guru.id');
        $this->db->where('username',$nama);
        $this->db->order_by('kode_kelas','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function kode_kelas()
    {
        $this->db->select('RIGHT(kelas.kode_kelas,2)as kode_kelas',FALSE);
        $this->db->order_by('kode_kelas','DESC');
        $this->db->limit(1);
        $query = $this->db->get('kelas');
        if($query->num_rows() <> 0)
        {
            $data = $query->row();
            $kode=intval($data->kode_kelas) + 1;
        }
        else
        {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "K00".$kode;
        return $kodetampil;
    }

    public function get_tugas()
    {
        $query = $this->db->get('nama_tugas');
        return $query->result_array();
    }

    public function getalltugas($test)
    {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('kelas','tugas.id_kode_kelas = kelas.kode_kelas');
        $this->db->join('nama_tugas','tugas.id_tugas = nama_tugas.id');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->join('nama_guru','kelas.id_guru = nama_guru.id');
        $this->db->where('username',$test);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function do_upload()
    {
        $config['upload_path'] = './dokumen/';
        $config['allowed_types'] = 'doc|docx|pdf|xls|xlsx';
        $config['remove_space'] = true;

        $this->load->library('upload',$config);

        if(! $this->upload->do_upload('doc'))
        {
            $query = $this->upload->data();
            return $query;
        }
    }
    public function download($nama){
        $query = $this->db->get_where('tugas',array('nama_dokumen'=> $nama));
        return $query->row_array();
    }

    public function downloadindividu($nama){
        $query = $this->db->get_where('tugas_siswa',array('nama_dokumen'=> $nama));
        return $query->row_array();
    }

    public function downloadkelompok($nama){
        $query = $this->db->get_where('tugas_siswa_kelompok',array('nama_dokumen'=> $nama));
        return $query->row_array();
    }
    
    public function getallnilai($kode,$jenis)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('kelas','nilai.id_kode_kelas = kelas.kode_kelas');
        $this->db->join('nama_tugas','nilai.id_tugas = nama_tugas.id');
        $this->db->join('nama_siswa','nilai.id_siswa = nama_siswa.id');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->where('id_kode_kelas ',$kode);
        $this->db->where('id_tugas',$jenis);
        $this->db->order_by('id_siswa','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getallnilaikelompok($kode,$jenis)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('kelas','nilai.id_kode_kelas = kelas.kode_kelas');
        $this->db->join('nama_tugas','nilai.id_tugas = nama_tugas.id');
        $this->db->join('nama_siswa','nilai.id_siswa = nama_siswa.id');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->join('kelompok','nilai.id_siswa = kelompok.id_siswa');
        $this->db->where('id_kode_kelas ',$kode);
        $this->db->where('nilai.id_tugas',$jenis);
        $this->db->order_by('kelompok.id_kelompok','ASC');
        $this->db->order_by('kelompok.id','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_nilai($data,$id,$kode,$tugas)
    {
        $this->db->where('id_siswa',$id);
        $this->db->where('id_kode_Kelas',$kode);
        $this->db->where('id_tugas',$tugas);
        $this->db->update('nilai',$data);
    }

    public function ranking($kode,$jenis)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('kelas','nilai.id_kode_kelas = kelas.kode_kelas');
        $this->db->join('nama_tugas','nilai.id_tugas = nama_tugas.id');
        $this->db->join('nama_siswa','nilai.id_siswa = nama_siswa.id');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->where('id_kode_kelas ',$kode);
        $this->db->where('id_tugas',$jenis);
        $this->db->order_by('nilai','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function bagikelompok($data,$kelompok,$anggota)
    {
        $test = array();
        $tampung = array();
        $i=1;
        foreach($data as $dt)
        {
            $test[$i]['kode_kelas'] = $dt['kode_kelas'];
            $test[$i]['id_nis'] = $dt['id_nis'];
            $test[$i]['nama_siswa'] = $dt['nama_siswa'];
            $test[$i]['id_siswa'] = $dt['id_siswa'];
            $test[$i]['jenis_kelamin'] = $dt['jenis_kelamin'];
            $test[$i]['id_tugas'] = 2;
            $test[$i]['id_kelompok'] = $i;
            $test[$i]['nilai'] = $dt['nilai'];
            $i++;
        }
        $bataskelompok=1;
        foreach($test as $ts)
        {
            $tampung= array(
                'kode_kelas'=> $ts['kode_kelas'],
                'id_nis'=> $ts['id_nis'],
                'id_siswa'=> $ts['id_siswa'],
                'nama_siswa'=> $ts['nama_siswa'],
                'jenis_kelamin'=> $ts['jenis_kelamin'],
                'id_tugas'=> $ts['id_tugas'],
                'id_kelompok' => $ts['id_kelompok'],
            );
            $tampung2 = array(
                'id_kode_kelas'=> $ts['kode_kelas'],
                'id_tugas' => $ts['id_tugas'],
                'id_siswa' =>$ts['id_siswa'],
                'nilai' => 0,
            );

            if($this->ceknilaikelompok($tampung2['id_kode_kelas'],$tampung2['id_tugas'],$tampung2['id_siswa'])==false)
            {
                $this->db->insert('nilai',$tampung2);
            }
            else
            {
                $this->db->where('id_kode_kelas',$tampung2['id_kode_kelas']);
                $this->db->where('id_tugas',$tampung2['id_tugas']);
                $this->db->where('id_siswa',$tampung2['id_siswa']);
                $this->db->update('nilai',$tampung2);
            }
            
            if($this->cekkodekelaskelompok($ts['kode_kelas'],$ts['id_nis'])==false)
            {
                if($bataskelompok < $kelompok)
                {
                    $tampung['id_kelompok']=$bataskelompok;
                    $this->db->insert('kelompok',$tampung);
                       
                }
                else
                {
                    $tampung['id_kelompok']=$bataskelompok;
                    $this->db->insert('kelompok',$tampung);
                    $bataskelompok=0;
                }
                $bataskelompok++;
            }
            else
            {
                if($bataskelompok < $kelompok)
                {
                    $tampung['id_kelompok']=$bataskelompok;
                    $this->db->where('kode_kelas',$tampung['kode_kelas']);
                    $this->db->where('id_nis',$tampung['id_nis']);
                    $this->db->update('kelompok',$tampung);
                }
                else
                {
                    $tampung['id_kelompok']=$bataskelompok;
                    $this->db->where('kode_kelas',$tampung['kode_kelas']);
                    $this->db->where('id_nis',$tampung['id_nis']);
                    $this->db->update('kelompok',$tampung);
                    $bataskelompok=0;
                }
                $bataskelompok++;
            }
        }
    }
    public function cekkodekelaskelompok($kode,$id_nis)
    {
        $this->db->select('*');
        $this->db->from('kelompok');
        $this->db->where('kode_kelas',$kode);
        $this->db->where('id_nis',$id_nis);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function ceknilaikelompok($kode,$idtugas,$idsiswa)
    {
        $this->db->where('id_kode_kelas',$kode);
        $this->db->where('id_tugas',$idtugas);
        $this->db->where('id_siswa',$idsiswa);
        $query = $this->db->get('nilai');
        return $query->result_array();
    }
    public function get_kelompoksiswa($kode,$id_kel)
    {
        $this->db->where('kode_kelas',$kode);
        $this->db->where('id_kelompok',$id_kel);
        $query = $this->db->get('kelompok');
        return $query->result_array();
    }
    public function get_kelompoksiswanilai($kode,$id_kel)
    {
        $this->db->where('kelompok.kode_kelas',$kode);
        $this->db->where('id_kelompok',$id_kel);
        $this->db->join('nilai','nilai.id_siswa = kelompok.id_siswa AND nilai.id_tugas = kelompok.id_tugas');
        $this->db->join('kelas','nilai.id_kode_kelas = kelas.kode_kelas');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->order_by('kelompok.id_kelompok','ASC');
        $query = $this->db->get('kelompok');
        return $query->result_array();
    }
    public function cekkodekelompok($kode)
    {
        $this->db->where('kode_kelas',$kode);
        $query = $this->db->get('kelompok');
        return $query->result_array();
    }
    public function cekkelas($k,$m,$kls,$gr)
    {
        $this->db->where('kode_kelas',$k);
        $this->db->where('id_mapel',$m);
        $this->db->where('id_kelas',$kls);
        $this->db->where('id_guru',$gr);
        $query = $this->db->get('kelas');
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function cektugas($kode,$tugas)
    {
        $this->db->where('id_kode_kelas',$kode);
        $this->db->where('id_tugas',$tugas);
        $query = $this->db->get('tugas');
        if($query->num_rows() > 0 )
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    public function get_mapelkelas($data)
    {
        $this->db->where('kode_kelas',$data);
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $query = $this->db->get('kelas');
        return $query->result_array();
    }
    public function tampiltugaskelompok($kode,$tugas)
    {
        $this->db->select('*');
        $this->db->from('tugas_siswa_kelompok');
        $this->db->join('kelas','tugas_siswa_kelompok.id_kode_kelas = kelas.kode_kelas');
        $this->db->join('kelompok','tugas_siswa_kelompok.id_kelompok = kelompok.id_kelompok');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->where('id_kode_kelas',$kode);
        $this->db->where('tugas_siswa_kelompok.id_tugas',$tugas);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function cek_guru($nama)
    {
        $this->db->where('username',$nama);
        $query = $this->db->get('nama_guru');
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>