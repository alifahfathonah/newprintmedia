<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Developer extends CI_Controller {
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Developer_model');
	}
	
	public function index()
	{	
		$data=$this->Developer_model->tampiluser('pm0_loginregister');
		$data=array('data'=> $data);
		$this->load->view('Developer/index',$data);
	}

	public function Inputdb_Univ()
	{
		 $this->form_validation->set_rules('univ', 'Universitas', 'trim|required|is_unique[pm3_university.pm3_university_name]|xss_clean');
		 $this->form_validation->set_message('required', 'Mohon Maaf! Harap mengisi kolom <b>%s</b>.');
		 $this->form_validation->set_message('is_unique', 'Mohon Maaf! <b>%s</b> sudah diinputkan.');
		
		if($this->form_validation->run() == FALSE)
		{
			//$this->session->set_flashdata('error_univ',validation_errors());
			//var_dump(validation_errors());
			//$errors = $this->form_validation->error_array();
			//echo json_encode(['error' => true, 'errors' => $errors]);
			
		}
		else
		{
			$data = array
			(
				'pm3_university_name' => $this->input->post('univ'),
				'pm3_university_city' => $this->input->post('kota')
	        );

			$data = $this->Developer_model->insert('pm3_university', $data);
			$this->session->set_flashdata('success_univ', 'Berhasil Menambahkan Universitas '.$this->input->post('univ'));
			echo json_encode(array("status" => TRUE));

		}
	}

	public function Inputdb_Jurusan()
	{
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required|is_unique[pm3_major.pm3_major_name]|xss_clean');
		$this->form_validation->set_message('required', 'Mohon Maaf! Harap mengisi kolom <b>%s</b>.');
		$this->form_validation->set_message('is_unique', 'Mohon Maaf! <b>%s</b> sudah diinputkan.');
		
		if($this->form_validation->run() == FALSE)
		{
		// 	$this->session->set_flashdata('error_jurusan',"'.form_error('jurusan').'");
		// 	$data = $this->Developer_model->tampiluniv('regencies');
		// 	$data=array('data'=> $data);
		// 	$this->load->view('Developer/Input_Universitas',$data);
		 }
		else
		{
			$data = array
			(
				'pm3_major_name' => $this->input->post('jurusan') // yang kanan nama di form
	        );

			$data = $this->Developer_model->insert('pm3_major', $data);

			$this->session->set_flashdata('success_jurusan', 'Berhasil Menambahkan Jurusan '.$this->input->post('jurusan'));
			// redirect(base_url('Developer/Input_Universitas'));
			echo json_encode(array("status" => TRUE));
		}
		
	}

	public function Tampil_Univ()
	{
		$data=$this->Developer_model->tampiluniv('pm3_university');
		$kota=$this->Developer_model->tampiluniv('pm2_regencies');
		$data=array(
			'data'=> $data,
			'kota'=>$kota
		);
		$this->load->view('Developer/Data_Univ',$data);
	}

	public function Tampil_Pemesanan()
	{
		$data=$this->Developer_model->tampiluniv('pm4_orders');
		$data=array(
			'data'=> $data
		);
		$this->load->view('Developer/Pemesanan',$data);
	}

	public function Tampil_Jurusan()
	{
		$data=$this->Developer_model->tampiluniv('pm3_major');
		$data=array('data'=> $data);
		$this->load->view('Developer/Data_Jurusan',$data);
	}
	public function Tampil_User()
	{
		$data=$this->Developer_model->tampiluniv('pm1_user');
		$data=array('data'=> $data);
		$this->load->view('Developer/Data_User',$data);
	}

	public function Hapus_Univ($id)
		{
			$where = array('pm3_university_id' => $id);
			$data=$this->Developer_model->hapus('pm3_university',$where);
			if($data){
				echo json_encode(array("status" => TRUE));
			}
			else{
				$this->session->set_flashdata('error_del_univ', 'GAGAL MENGHAPUS');
				redirect(base_url('Developer/Tampil_Univ'));
			}
		}

	public function Hapus_Jurusan($id)
		{
			$where = array('pm3_major_id' => $id);
			$data=$this->Developer_model->hapus('pm3_major',$where);
			if($data){
				echo json_encode(array("status" => TRUE));
			}
			else{
				$this->session->set_flashdata('error_del_jurusan', 'GAGAL MENGHAPUS');
				redirect(base_url('Developer/Tampil_Jurusan'));
			}
		}

	public function Hapus_User($email)
		{
			$where1 = array('pm1_user_email' => $email);
			$where1 = array('pm1_auth_password' => $email);
			$data=$this->Developer_model->hapus('pm1_auth',$where1);
			$data1=$this->Developer_model->hapus('pm1_user',$where);
			if($data){
				if($data1){
					$this->session->set_flashdata('success_del_user', 'BERHASIL MENGHAPUS');
					redirect(base_url('Developer/Tampil_User'));
				}
				$this->session->set_flashdata('error_del_user', 'GAGAL MENGHAPUS');
				redirect(base_url('Developer/Tampil_User'));
			}
			else{
				$this->session->set_flashdata('error_del_user', 'GAGAL MENGHAPUS');
				redirect(base_url('Developer/Tampil_User'));
			}
		}

	public function Detail_User($id)
		{
			$id = array('pm1_user_id' => $id) ;
			$cek = $this->Developer_model->detailuser('pm1_user', $id);
			$cek=array('cek'=> $cek);
			$this->load->view('Developer/detail_user', $cek);
		
		}

	public function Detail_Pemesanan($id)
		{
			$id = array('pm4_orders_id' => $id) ;
			$cek = $this->Developer_model->detailuser('pm4_orders', $id);
			$cek=array('cek'=> $cek);
			$this->load->view('Developer/Detail_Pesanan', $cek);
		
		}

	public function Do_Download($namefile)
	{
		$newfile='./asset/user/pemesanan/'.$namefile;
		force_download($newfile,NULL);
	}
}
?>