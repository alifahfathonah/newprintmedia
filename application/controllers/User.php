<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "vendor/autoload.php";
class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');		
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		if($this->session->userdata('status')=='login' && $this->session->userdata('akses')=='Member'){
			$email = $this->session->userdata('email');
			$cek = $this->User_model->cekUser($email);
			$cek = $cek->row_array();
			
			if($cek == NULL)
			{
				redirect(base_url('profile'));
			}
			else
			{
				$this->session->set_userdata('username', $cek['pm1_user_name']);
				$this->session->set_flashdata('login', 'Selamat Datang!');
				$this->load->view('user/dashboard');
			}
		}
		else{
			redirect(base_url('login'));
		}
	}


	// Bagian Dashboard
	public function dashboard()
	{
		if($this->session->userdata('status')=='login' && $this->session->userdata('akses')=='Member')
		{
			$data=array(
				'total' => $this->User_model->total()->num_rows(),
				'sukses' => $this->User_model->sukses()->num_rows(),
				'pengiriman' => $this->User_model->pengiriman()->num_rows(),
				'proses' => $this->User_model->proses()->num_rows(),
			);
			$this->load->view('user/dashboard', $data);
		}
		else
		{
			redirect(base_url('login'));
		}
	}

	// Bagian Profile Member
	public function myprofile()
	{
		if($this->session->userdata('status')=='login' && $this->session->userdata('akses')=='Member'){
			$email = array('pm1_user_email' => $this->session->userdata('email')) ;
			$cek = $this->User_model->tampilProfile('pm1_user', $email);
			$cek=array('cek'=> $cek);
			$this->load->view('user/profile/myprofile', $cek);	
		}
		else{
			redirect(base_url('login'));
		}		
	}

	public function inputprofile()
	{
		if($this->session->userdata('status')=='login' && $this->session->userdata('akses')=='Member')
		{
			$email = array('pm1_user_email' => $this->session->userdata('email')) ;
			$cek = $this->User_model->GetWhere('pm1_user', $email);
			$cek = $cek->row_array();
			$this->load->view('user/profile/inputprofile');
		}
		else
		{
			redirect(base_url('login'));
		}
	}

	public function inputdataprofile()
	{	
		// Set Aturan
		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'trim|required|regex_match[/^[a-zA-Z]+(?:[\s.]+[a-zA-Z]+)*$/]');
		$this->form_validation->set_rules('no_handphone', 'Nomor Handphone', 'trim|required|numeric|xss_clean|min_length[10]|max_length[13]');	
		$this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim|required|numeric|xss_clean|min_length[5]|max_length[5]');	
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('detail_alamat', 'Detail Alamat', 'trim|required|xss_clean');

		// Set Pesan 
		$this->form_validation->set_message('required', ' Maaf, Kolom <b>%s</b> Anda Tidak Boleh Kosong');
		$this->form_validation->set_message('min_length', '<b>%s</b> Minimal <b>%s</b> Angka');
		$this->form_validation->set_message('max_length', '<b>%s</b> Maksimal <b>%s</b> Angka');
		$this->form_validation->set_message('regex_match', 'Maaf, <b>%s</b> Anda Tidak Manusiawi');
		$this->form_validation->set_message('numeric', 'Maaf, <b>%s</b> Harus Berupa Angka');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('user/profile/inputprofile');
		}
		else
		{
			$this->User_model->inputProfile();
			$this->session->set_flashdata('success_input', 'Berhasil Menambahkan Data');
			redirect(base_url('upload'));
		}

		
	}

	public function editprofile()
	{
		if($this->session->userdata('status')=='login' && $this->session->userdata('akses')=='Member'){
			$email = array('pm1_user_email' => $this->session->userdata('email')) ;
			$cek = $this->User_model->tampilProfile('pm1_user', $email);
			$cek=array('cek'=> $cek);
			$this->load->view('user/profile/editprofile', $cek);
		}
		else{
			redirect(base_url('login'));
		}
	}

	public function updatedataprofile()
	{
		// Set Aturan
		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'trim|required|regex_match[/^[a-zA-Z]+(?:[\s.]+[a-zA-Z]+)*$/]');
		$this->form_validation->set_rules('no_handphone', 'Nomor Handphone', 'trim|required|numeric|xss_clean|min_length[10]|max_length[13]');	
		$this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim|required|numeric|xss_clean|min_length[5]|max_length[5]');	
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('detail_alamat', 'Detail Alamat', 'trim|required|xss_clean');

		// Set Pesan
		$this->form_validation->set_message('required', 'Kolom <b>%s</b> Anda Tidak Boleh Kosong');
		$this->form_validation->set_message('alpha', '<b>%s</b> tidak boleh mengandung angka');
		$this->form_validation->set_message('numeric', 'Maaf, %s Tidak boleh mengandung huruf');
		$this->form_validation->set_message('min_length', 'Maaf, <b>%s</b> Minimal <b>%s</b> Angka');
		$this->form_validation->set_message('max_length', 'Maaf, <b>%s</b> Maksimal <b>%s</b> Angka');
		$this->form_validation->set_message('regex_match', 'Maaf, Kolom <b>%s</b> Salah');

		if($this->form_validation->run() == FALSE)
		{
			$email = array('pm1_user_email' => $this->session->userdata('email')) ;
			$cek = $this->User_model->tampilProfile('pm1_user', $email);
			$cek=array('cek'=> $cek);		
			$this->load->view('user/profile/editprofile', $cek);			
		}
		else
		{
			$this->User_model->updateProfile();
			$this->session->set_flashdata('success_update', 'Berhasil Mengupdate Data');
			redirect(base_url('myprofile'));
		}			
	}

	public function history()
	{	
		if($this->session->userdata('status')=='login' && $this->session->userdata('akses')=='Member'){
			$email = array('pm4_orders_sender_email' => $this->session->userdata('email')) ;
			$cek = $this->User_model->tampilProfile('pm4_orders', $email);
			$cek=array('cek'=> $cek);
			$this->load->view('user/history', $cek);		
		}
		else{
			redirect(base_url('login'));
		}	
	}

	// Bagian Pemesanan
	public function upload()
	{
		if($this->session->userdata('status')=='login' && $this->session->userdata('akses')=='Member')
		{
			$cekOrderan = $this->User_model->checkUpload($this->session->userdata('email'));
			if($cekOrderan -> num_rows() > 0)
			{
				redirect(base_url('User/upload2'));
			}
			else 
			{				
				$email = array('pm1_user_email' => $this->session->userdata('email')) ;
				$cek = $this->User_model->tampilProfile('pm1_user', $email);
				$cek=array('cek'=> $cek);
				$this->load->view('user/upload', $cek);			
			}			
		}
		else{
			redirect(base_url('login'));
		}
	}

	public function hitunghalaman()
	{
		// Set Aturan
		$this->form_validation->set_rules('judul_dokumen', 'Judul Dokumen', 'trim|required');	
		$this->form_validation->set_rules('nama_penerima', 'Nama', 'trim|required|xss_clean');	
		$this->form_validation->set_rules('nohape_penerima', 'Nomor Handphone', 'trim|required|numeric|xss_clean|min_length[10]|max_length[13]');	
		$this->form_validation->set_rules('alamat_penerima', 'Alamat', 'trim|required|xss_clean');		

		// Set Pesan 
		$this->form_validation->set_message('required', ' Maaf, Kolom <b>%s</b> Anda Tidak Boleh Kosong');
		$this->form_validation->set_message('numeric', 'Maaf, %s Tidak boleh mengandung huruf');
		$this->form_validation->set_message('min_length', 'Maaf, <b>%s</b> Minimal <b>%s</b> Angka');
		$this->form_validation->set_message('max_length', 'Maaf, <b>%s</b> Maksimal <b>%s</b> Angka');
		
		if($this->form_validation->run() == FALSE)
		{		
			$email = array('pm1_user_email' => $this->session->userdata('email')) ;
			$cek = $this->User_model->tampilProfile('pm1_user', $email);
			$cek=array('cek'=> $cek);
			$this->load->view('user/upload', $cek);			
		}

		else
		{
			$config['upload_path'] = "./asset/user/pemesanan";
			$config['allowed_types'] = "pdf";
			$config['max_size'] = "30720";
			$config['remove_space'] = TRUE;
			
			$this->load->library('upload', $config);
	
			if($this->upload->do_upload("inputFile"))
			{
				$data=array('upload_data' => $this->upload->data());
				$nama=$data['upload_data']['file_name'];				 
				$data2 = base_url('asset/user/pemesanan/').$data['upload_data']['file_name'];
	
				$parser = new \Smalot\PdfParser\Parser();
				$pdf    = $parser->parseFile($data2);
		
				$details  = $pdf->getDetails();							
				
				$halaman = $details['Pages'];
				
				$this->User_model->inputTemp($nama,$halaman);

				redirect('User/upload2');
			}		

			echo $this->upload->display_errors();
			
		}
	}

	public function upload2()
	{
		$email = array('pm4_temporders_sender_email' => $this->session->userdata('email')) ;
		$cek = $this->User_model->tampilTemp('pm4_temporders', $email);
		$cek=array('cek'=> $cek);
		$this->load->view('user/upload2', $cek);
	}
	
	public function inputdatapemesanan()
	{
		$this->User_model->inputPemesanan();
		$this->db->delete('pm4_temporders', array('pm4_temporders_sender_email' => $this->session->userdata('email') )); 
		$this->session->set_flashdata('success_order', 'Berhasil Memesan');
		redirect(base_url('user/history'));
	}

	public function batalPesanan()
	{
		if($this->User_model->cancelOrder($this->session->userdata('email')))
		{
			$this->session->set_flashdata('success', 'Berhasil membatalkan pemesanan');
			redirect(base_url('user/history'));
		}
		else 
		{
			$this->session->set_flashdata('error', 'Gagal membatalkan pemesanan');
			redirect(base_url('User/upload2'));
		}
	}

	// Bagian Alamat
	public function listkota()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$province_id = $this->input->post('province_id');
    
		$kota = $this->User_model->viewByProvinsi($province_id);
		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih Kota/Kabupaten</option>";
		
		foreach($kota as $data){
		  $lists .= "<option value='".$data['id']."'>".$data['name']."</option>"; // Tambahkan tag option ke variabel $lists
		}
		
		$callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function listkecamatan()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$regency_id = $this->input->post('regency_id');
    
		$kota = $this->User_model->viewByKota($regency_id);
		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih Kecamatan</option>";
		
		foreach($kota as $data){
		  $lists .= "<option value='".$data['id']."'>".$data['name']."</option>"; // Tambahkan tag option ke variabel $lists
		}
		
		$callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}
	
	public function test()
	{
		$this->load->view('user/test');
	}

	
}
