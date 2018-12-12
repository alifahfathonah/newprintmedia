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
        $this->db->from('pm1_user');
        $this->db->select('pm1_user_name, pm1_user_email'); // nama kolom di tabel database
        $this->db->where('pm1_user_email', $where);
        $res = $this->db->get();
        return $res;
    }

    public function inputProfile()
    {
        $data = array
        (
            'pm1_user_name' => $this->input->post('nama_lengkap'), // Kiri Nama Kolom
            'pm1_user_phonenumber' => $this->input->post('no_handphone'), // Kanan nama form di views
            'pm1_user_gender' => $this->input->post('jenis_kelamin'),
            'pm1_user_birthdate' => $this->input->post('tanggal_lahir'),
            'pm1_user_email' => $this->input->post('email'),
            'pm1_user_address' => $this->input->post('alamat'),
            'pm1_user_detailaddress' => $this->input->post('detail_alamat'),
            'pm1_user_province' => $this->input->post('provinsi'),
            'pm1_user_regency' => $this->input->post('kota'),
            'pm1_user_district' => $this->input->post('kecamatan'),				
            'pm1_user_poscode' => $this->input->post('kodepos'),
            'pm1_user_university' => $this->input->post('universitas'),
            'pm1_user_major' => $this->input->post('jurusan'),
            'pm1_user_degree' => $this->input->post('jenjang'),
            'pm1_user_in' => $this->input->post('tahun_masuk'),
            'pm1_user_out' => $this->input->post('tahun_keluar'),
        );
        
        $res = $this->db->insert('pm1_user', $data);
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
        $result = $this->db->get('pm2_regencies')->result_array(); // Tampilkan semua data kota berdasarkan id provinsi
        
        return $result; 
    }

    public function viewByKota($regency_id)
    {
        $this->db->where('regency_id', $regency_id);
        $result = $this->db->get('pm2_districts')->result_array(); // Tampilkan semua data kecamatan berdasarkan id kota
        
        return $result; 
    }
}