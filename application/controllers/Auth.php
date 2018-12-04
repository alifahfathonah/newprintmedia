<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function register()
	{
		$this->load->view('Auth/Register');
	}

	public function prosesregister()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[auth.email]|valid_email|valid_emails|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]|xss_clean');
		$this->form_validation->set_message('required', 'Mohon Maaf! Harap mengisi kolom <b>%s</b>.');
		$this->form_validation->set_message('is_unique', 'Mohon Maaf! <b>%s</b> sudah digunakan.');
		$this->form_validation->set_message('min_length', 'Mohon Maaf! <b>%s</b> minimal %s karakter.');
		$this->form_validation->set_message('max_length', 'Mohon Maaf! <b>%s</b> maksimal %s karakter.');
		$this->form_validation->set_message('valid_email', 'Mohon Maaf! Harap Memasukkan <b>%s</b> yang Benar.');
		$this->form_validation->set_message('valid_emails', 'Mohon Maaf! Harap Memasukkan <b>%s</b> yang Benar.');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('auth/register');
		}
		else
		{
			if(preg_match("/ac.id/", $this->input->post('email', TRUE)) || preg_match("/.edu/", $this->input->post('email', TRUE)) ) 
			{
				$data = $this->Auth_model->daftarUser();
				$this->session->set_flashdata('success', 'Berhasil Mendaftar!');
				redirect(base_url('register'));
			} 
			else 
			{ 
				$this->session->set_flashdata('error', 'Gagal Mendaftar!');
				redirect(base_url('register'));
			}  
		}
	}

	public function aktivasi($token)
	{
		$this->Auth_model->aktivasi($token);
		$where = array('token' => $token);
		$data = $this->Auth_model->GetWhere('auth', $where);
		$data = array('data' => $data);
		$this->load->view('auth/suksesaktivasi', $data);
	}

	public function login()
	{
		$this->load->view('auth/Login');
	}

	public function proseslogin()
	{		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]|xss_clean');
		$this->form_validation->set_message('required', 'Mohon Maaf! Harap mengisi kolom <b>%s</b>.');
		$this->form_validation->set_message('min_length', 'Mohon Maaf! <b>%s</b> minimal %s karakter.');
		$this->form_validation->set_message('max_length', 'Mohon Maaf! <b>%s</b> maksimal %s karakter.');
		
		$email		= $this->input->post('email');
		$password	= $this->input->post('password');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('auth/login');
		}
		else
		{
			$this->Auth_model->loginUser();
		}		
	}

	public function logout()
    {
		$this->session->sess_destroy();
        redirect(base_url('login'), 'refresh');
	}
	
	public function logindeveloper()
	{
		$this->load->view('auth/logindeveloper');
	}

	public function prosesloginadmin()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]');
		$this->form_validation->set_message('required', 'Mohon Maaf! Harap mengisi kolom <b>%s</b>.');
		$this->form_validation->set_message('min_length', 'Mohon Maaf! <b>%s</b> yang dimasukkin kurang dari 8 karakter.');
		$this->form_validation->set_message('max_length', 'Mohon Maaf! <b>%s</b> yang dimasukkin lebih dari 15 karakter.');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('auth/login');
		}
		else
		{
			$cek=$this->Auth_model->login('auth', array('email' => $email, 'password' => md5($password)));

			if( $cek->num_rows() > 0 )
			{
				$data = $cek->row_array();	
				if($data['status'] == 'Aktif')
				{
					if($data['level'] === 'Admin' )
					{
						$this->session->set_userdata('akses', 'Admin');
						$this->session->set_userdata('email', $data['email']);
						$this->session->set_userdata('status', 'login');

						if ($this->agent->is_browser())
						{
								$agent = $this->agent->browser().' '.$this->agent->version();
						}
						elseif ($this->agent->is_robot())
						{
								$agent = $this->agent->robot();
						}
						elseif ($this->agent->is_mobile())
						{
								$agent = $this->agent->mobile();
						}
						else
						{
								$agent = 'Unidentified User Agent';
						}

						date_default_timezone_set("Asia/Jakarta");
						$data = array(
							'email' => $this->input->post('email'),
							'alamat_ip' => $this->input->ip_address(),
							'browser' => $agent.' - '.$this->agent->platform(),
							'waktu_masuk' => date('Y-m-d h:i:s'),
							'keterangan' => 'Melakukan Login',
							'session' => session_id(),
						);
						$data = $this->Auth_model->Insert('activity_user', $data);
						redirect(base_url('Developer/index'));
					}
				}
				if($data['level'] !== 'Admin' )
				{
					$this->session->set_flashdata('error', 'Salah Tempat');
					redirect(base_url('developer'));
				}
				if($data['status'] == 'Belum Aktif')
				{
					$this->session->set_flashdata('error', 'Maaf Akun Anda <b>BELUM AKTIF</b>. Silahkan aktifkan terlebih dahulu dengan cara membuka Email yang telah kami kirimkan.');
					redirect(base_url('developer'));
				}
				if($data['status'] == 'Suspend')
				{
					$this->session->set_flashdata('error', 'Maaf! Akun Anda telah kami <b>SUSPEND</b>. Karena terbukti melanggar beberapa peraturan yang telah diterapkan. Harap hubungi kami melalui menu Kontak, jika terbukti tidak melakukan kesalahan.');
					redirect(base_url('developer'));
				}
			}
			else
			{
				$cek = $this->db->get_where('auth', array('email' => $email));
				$data = $cek->row_array();

				if($data['email'] != $email && $data['password'] != $password)
				{
					$this->session->set_flashdata('error', 'Maaf Akun Anda Tidak Terdaftar');
					redirect(base_url('developer'));
				}
				else
				{
					if($data['password'] != $password)
					{
						$this->session->set_flashdata('error', 'Maaf Password Salah');
						redirect(base_url('developer'));
					}
				}	
			}
		}
	}
}
