<?php
class user_model extends CI_Model
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
    public function get_kelas_id($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('nama_kelas');
        return $query->result_array();
    }
    public function get_kode_id($id)
    {
        $this->db->join('kelas','nilai.id_kode_kelas = kelas.kode_kelas');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->where('id_siswa',$id);
        $this->db->where('id_tugas',1);
        $this->db->order_by('id_kode_kelas','ASC');
        $query = $this->db->get('nilai');
        return $query->result_array();
    }
    public function get_siswa()
    {
        $query = $this->db->get('nama_siswa');
        return $query->result_array();
    }
    public function get_nilaisemua()
    {
        $query = $this->db->get('nilai');
        return $query->result_array();
    }
    public function get_nilai($id_siswa)
    {
        $this->db->where('id_siswa',$id_siswa);
        $query = $this->db->get('nilai');
        return $query->result_array();
    }

    public function cek_siswa($id)
    {
        $this->db->where('id_nis',$id);
        $query = $this->db->get('nama_siswa');
        if($query->num_rows() > 0)
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
    public function get_tugas()
    {
        $query = $this->db->get('nama_tugas');
        return $query->result_array();
    }
    public function get_tugasdownload($kode,$tugas)
    {
        $this->db->where('id_kode_kelas',$kode);
        $this->db->where('id_tugas',$tugas);
        $query = $this->db->get('tugas');
        return $query->result_array();
    }
    public function download($nama){
        $query = $this->db->get_where('tugas',array('nama_dokumen'=> $nama));
        return $query->row_array();
    }
    public function kode_siswa()
    {
        $this->db->select('RIGHT(nama_siswa.id_nis,2)as id_nis',FALSE);
        $this->db->order_by('id_nis','DESC');
        $this->db->limit(1);
        $query = $this->db->get('nama_siswa');
        if($query->num_rows() <> 0)
        {
            $data = $query->row();
            $kode=intval($data->id_nis) + 1;
        }
        else
        {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "A00".$kode;
        return $kodetampil;
    }
    public function getallkelas($mapel,$namakelas)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->join('nama_kelas','kelas.id_kelas = nama_kelas.id');
        $this->db->join('nama_guru','kelas.id_guru = nama_guru.id');
        $this->db->where('id_mapel',$mapel);
        $this->db->where('id_kelas',$namakelas);
        $this->db->order_by('kode_kelas','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_kelas($data,$id,$kode,$jenis)   
    {
        $query = $this->db->get('nilai');
        $test = $query->result_array();
        foreach($test as $ts)
        {
            if(($ts['id_kode_kelas'] == $kode) && ($ts['id_siswa']==$id) && ($ts['id_tugas']==$jenis))
            {
                $this->db->where('id_siswa',$id);
                $this->db->where('id_kode_kelas',$kode);
                return $this->db->update('nilai',$data);
                
            }
        }
        return $this->db->insert('nilai',$data);
    }

    public function ceksiswakelas($id_kode_kelas,$tugas,$id_siswa)
    {
        $this->db->where('id_siswa',$id_siswa);
        $this->db->where('id_tugas',$tugas);
        $this->db->where('id_kode_kelas',$id_kode_kelas);
        $query = $this->db->get('nilai');
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function do_upload()
    {
        $config['upload_path'] = './dokumensiswa/';
        $config['allowed_types'] = 'doc|docx|pdf|xls|xlsx';
        $config['remove_space'] = true;

        $this->load->library('upload',$config);
        
        if(! $this->upload->do_upload('doc'))
        {
            $query = $this->upload->data();
            return $query;
        }
    }
    public function do_upload2()
    {
        $config['upload_path'] = './dokumensiswakelompok/';
        $config['allowed_types'] = 'doc|docx|pdf|xls|xlsx';
        $config['remove_space'] = true;

        $this->load->library('upload',$config);
        
        if(! $this->upload->do_upload('doc'))
        {
            $query = $this->upload->data();
            return $query;
        }
    }
    public function downloadtugassiswa($nama){
        $query = $this->db->get_where('tugas_siswa',array('nama_dokumen'=> $nama));
        return $query->row_array();
    }
    public function downloadtugassiswakelompok($nama){
        $query = $this->db->get_where('tugas_siswa_kelompok',array('nama_dokumen'=> $nama));
        return $query->row_array();
    }
    public function get_bagikelompok()
    {
        $this->db->select('*');
        $this->db->from('kelompok');
        $this->db->order_by('id_kelompok','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function cekkodekelompok($kode,$idkel)
    {
        $this->db->where('kode_kelas',$kode);
        $this->db->where('id_kelompok',$idkel);
        $query = $this->db->get('kelompok');
        return $query->result_array();
    }
    public function ceknilaikodekelompok($kode,$idkel)
    {
        $this->db->where('kode_kelas',$kode);
        $this->db->where('id_kelompok',$idkel);
        $this->db->join('nilai','nilai.id_siswa = kelompok.id_siswa AND nilai.id_tugas = kelompok.id_tugas');
        $query = $this->db->get('kelompok');
        return $query->result_array();
    }
    public function cekuploadsiswa($kode_kelas,$id_siswa)
    {
        $this->db->where('id_siswa',$id_siswa);
        $this->db->where('id_kode_kelas',$kode_kelas);
        $query = $this->db->get('tugas_siswa');
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function cekuploadsiswakelompok($kode_kelas,$kelompok)
    {
        $this->db->where('id_kelompok',$kelompok);
        $this->db->where('id_kode_kelas',$kode_kelas);
        $query = $this->db->get('tugas_siswa_kelompok');
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function get_kode_id2($id)
    {
        $this->db->join('kelas','nilai.id_kode_kelas = kelas.kode_kelas');
        $this->db->join('nama_mapel','kelas.id_mapel = nama_mapel.id');
        $this->db->where('id_siswa',$id);
        $this->db->where('id_tugas',2);
        $this->db->order_by('id_kode_kelas','ASC');
        $query = $this->db->get('nilai');
        return $query->result_array();
    }
}

?>