<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User_model extends CI_Model{ 
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    public function Insert($table,$data)
    {
        $res = $this->db->insert($table, $data); 
        return $res; 
    } 

    public function cekUser($where)
    {
        $this->db->from('user');
        $this->db->select('nama, email'); // nama kolom di tabel database
        $this->db->where('email', $where);
        $res = $this->db->get();
        return $res;
    }

    public function inputProfile()
    {
        $data = array
        (
            'nama' => $this->input->post('nama_lengkap'), // Kiri Nama Kolom
            'nohape' => $this->input->post('no_handphone'), // Kanan nama form di views
            'gender' => $this->input->post('jenis_kelamin'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'detail_alamat' => $this->input->post('detail_alamat'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'kecamatan' => $this->input->post('kecamatan'),				
            'kodepos' => $this->input->post('kodepos'),
            'universitas' => $this->input->post('universitas'),
            'jurusan' => $this->input->post('jurusan'),
            'jenjang' => $this->input->post('jenjang'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'tahun_keluar' => $this->input->post('tahun_keluar'),
        );
        
        $res = $this->db->insert('user', $data);
        return $res;
        
    }

    public function GetWhere($table, $data)
    {
        $res = $this->db->get_where($table, $data);
        return $res;
    }

    public function update($where,$data,$table) /// Fungsi Untuk Edit data
    {
      $this->db->where($where);
      $this->db->update($table,$data);
    }

     public function tampilProfile($table, $data)
    {
        $res = $this->db->get_where($table, $data);
        return $res->result_array();
    }
    
    public function viewByProvinsi($province_id)
    {
        $this->db->where('province_id', $province_id);
        $result = $this->db->get('regencies')->result_array(); // Tampilkan semua data kota berdasarkan id provinsi
        
        return $result; 
    }

    public function viewByKota($regency_id)
    {
        $this->db->where('regency_id', $regency_id);
        $result = $this->db->get('districts')->result_array(); // Tampilkan semua data kecamatan berdasarkan id kota
        
        return $result; 
    }
}
