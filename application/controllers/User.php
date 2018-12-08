<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		$email = $this->session->userdata('email');
		$cek = $this->User_model->cekUser($email);
		$cek = $cek->row_array();
		
		if($cek == NULL)
		{
			redirect(base_url('profile'));
		}
		else
		{
			$this->session->set_userdata('username', $cek['nama']);
			$this->load->view('user/dashboard');
		}
	}

	public function dashboard()
	{
		$this->load->view('user/dashboard');
	}

	public function inputprofile()
	{
		$email = array('email' => $this->session->userdata('email')) ;
		$cek = $this->User_model->GetWhere('user', $email);
		$cek = $cek->row_array();
		$this->load->view('user/profile/inputprofile');
	}

	public function editprofile()
	{
		$email = array('email' => $this->session->userdata('email')) ;
		$cek = $this->User_model->tampilProfile('user', $email);
		$cek=array('cek'=> $cek);
		$this->load->view('user/profile/editprofile', $cek);
	}

	public function myprofile()
	{	
		$email = array('email' => $this->session->userdata('email')) ;
		$cek = $this->User_model->tampilProfile('user', $email);
		$cek=array('cek'=> $cek);
		$this->load->view('user/profile/myprofile', $cek);			
	}

	public function history()
	{	
		$this->load->view('user/history');			
	}

	public function upload()
	{
		$email = array('email' => $this->session->userdata('email')) ;
		$cek = $this->User_model->tampilProfile('user', $email);
		$cek=array('cek'=> $cek);
		$this->load->view('user/upload', $cek);
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
			$email = array('email' => $this->session->userdata('email')) ;
			$cek = $this->User_model->tampilProfile('user', $email);
			$cek=array('cek'=> $cek);		
			$this->load->view('user/profile/editprofile', $cek);			
		}
		else
		{
			$data = array(				
				'nama' => $this->input->post('nama_lengkap'), // yang kanan nama di form
				'nohape' => $this->input->post('no_handphone'),
				'gender' => $this->input->post('jenis_kelamin'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),		
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
			$where=array(
				'email'=>$this->input->post('email')
			);	
			$data=$this->User_model->update($where,$data,'user');
			$this->session->set_flashdata('success_update', 'Berhasil Mengupdate Data');
			redirect(base_url('myprofile'));
		}
		
		
	}

	public function inputdatapemesanan()
	{
		$config['upload_path'] = "./asset/user/pemesanan";
		$config['allowed_types'] = "pdf";
		$config['max_size'] = "30720";
		$config['remove_space'] = TRUE;
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload("upload_file"))
		{
			$data=array('upload_data' => $this->upload->data());

			$datas = array(
				'nama_file' => $data['upload_data']['file_name'],
				'tipe_file' => $data['upload_data']['file_type'],
				'ukuran_file' => $data['upload_data']['file_size'],
			);

			$datas = $this->User_model->Insert('pemesanan', $datas);
			redirect('user/history');
		}
		echo $this->upload->display_errors();
	}

	public function listkota()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$province_id = $this->input->post('province_id');
    
		$kota = $this->User_model->viewByProvinsi($province_id);
		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih</option>";
		
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
		$lists = "<option value=''>Pilih</option>";
		
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
