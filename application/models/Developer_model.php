<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Developer_model extends CI_Model {

	public function Insert($table,$data)
    {
        $res = $this->db->insert($table, $data); 
        return $res; 
    }

    public function tampiluniv($table)
    {
          $this->db->select('*');
          $this->db->from($table);
    
          $query = $this->db->get();
          return $query->result_array();
          
    }
    public function tampiluser($table)
    {
        $this->db->from($table);
        $this->db->order_by('id','DESC');
        $res=$this->db->get();
        return $res->result_array();
    }
    public function hapus($table,$id)
    {
        $this->db->where($id);
		$res=$this->db->delete($table);
		return $res;
    }
    public function detailuser($table,$where)
    {
        $res = $this->db->get_where($table, $where);
        return $res->result_array();
    }
}
