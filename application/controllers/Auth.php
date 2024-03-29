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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[pm1_auth.pm1_auth_email]|valid_email|valid_emails|xss_clean');
		$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required|min_length[8]|max_length[15]|xss_clean');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Kata Sandi', 'trim|required|min_length[8]|max_length[15]|matches[password]|xss_clean');
		$this->form_validation->set_rules('validasi', 'Checkbox', 'trim|required|xss_clean');
		$this->form_validation->set_message('required', 'Mohon Maaf! Harap mengisi kolom <b>%s</b>.');
		$this->form_validation->set_message('is_unique', 'Mohon Maaf! <b>%s</b> sudah digunakan.');
		$this->form_validation->set_message('min_length', 'Mohon Maaf! <b>%s</b> minimal %s karakter.');
		$this->form_validation->set_message('max_length', 'Mohon Maaf! <b>%s</b> maksimal %s karakter.');
		$this->form_validation->set_message('valid_email', 'Mohon Maaf! Harap Memasukkan <b>%s</b> yang Benar.');
		$this->form_validation->set_message('valid_emails', 'Mohon Maaf! Harap Memasukkan <b>%s</b> yang Benar.');
		$this->form_validation->set_message('matches', 'Mohon Maaf! <b>%s</b> Tidak Sama dengan <b>%s</b>.');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('Auth/register');
		}
		else
		{
			if(preg_match("/ac.id/", $this->input->post('email', TRUE)) || preg_match("/.edu/", $this->input->post('email', TRUE)) ) 
			{
				$this->Auth_model->daftarUser();
				$this->session->set_flashdata('sukses', 'Berhasil Mendaftar!');
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
		date_default_timezone_set('Asia/Jakarta');
		$token = array('pm1_auth_token' => $token);
		$cek = $this->Auth_model->GetWhere('pm1_auth', $token);
		$view = $this->Auth_model->GetWhere('pm1_auth', $token);
		$view = array('view' => $view);
		$status = $cek[0]['pm1_auth_status'];
		$date1 = $cek[0]['pm1_auth_date'];
		$date1 = strtotime($date1);
		$date2 = time();
		$interval = $date2-$date1;
		$hari = floor($interval / (60*60*24) );
		var_dump($hari);

		if($token = $cek[0]['pm1_auth_token'] && $hari <= 1)
		{
			$data = array(
				'pm1_auth_status'		=> 2
			);
			$update = $this->Auth_model->aktivasi($data, $cek[0]['pm1_auth_token']);
			$this->load->view('Auth/suksesaktivasi', $view);
		}
		else
		{
			if($token = $cek[0]['pm1_auth_token'] && $hari > 1 && $status == 2)
			{
				redirect(base_url('login'));
			}
			else
			{
				if($token = $cek[0]['pm1_auth_token'] && $hari > 1)
				{
					$this->Auth_model->hapusUser($cek[0]['pm1_auth_token']);
					echo '<script>
							alert("Silahkan Daftar Ulang");
							window.location.href = "'. base_url('register') .'";
						</script>';
				}
			}
		}
	}

	public function login()
	{
		$this->load->view('Auth/Login');
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
			$this->load->view('Auth/login');
		}
		else
		{
			$cek = $this->Auth_model->loginUser();
			if($cek->num_rows() > 0)
			{
				$data = $cek->row_array();
				if(password_verify($password, $data['pm1_auth_password']))
				{
					if($data['pm1_auth_status'] == "2")
					{
						if($data['pm1_auth_level'] === "2")
						{
							$this->session->set_userdata('akses', 'Member');
							$this->session->set_userdata('email', $data['pm1_auth_email']);
							$this->session->set_userdata('status', 'login');							
							redirect(base_url('user/index'));
						}
						
						if($data['pm1_auth_level'] === "1")
						{
							$this->session->set_flashdata('error', 'Gagal Login!');
							redirect(base_url('login'));
						}
						
						if($data['pm1_auth_level'] === "3")
						{
							$this->session->set_flashdata('error', 'Gagal Login!');
							redirect(base_url('login'));
						}
					}
					if($data['pm1_auth_status'] == "1")
					{
						$this->session->set_flashdata('belum_aktif', 'Gagal Login!');
						redirect(base_url('login'));
					}
					if($data['pm1_auth_status'] == "3")
					{
						$this->session->set_flashdata('blokir', 'Maaf! Akun Anda telah kami <b>BLOKIR</b>. Karena terbukti melanggar beberapa peraturan yang telah diterapkan. Harap hubungi kami melalui menu Kontak, jika terbukti tidak melakukan kesalahan.');
						redirect(base_url('login'));
					}
				}
				else 
				{
					$this->session->set_flashdata('password_salah', 'Maaf! Password Salah.');
					redirect(base_url('login'));
				}
			}
			else 
			{
				$this->session->set_flashdata('tidak_ada', 'Maaf! <br>Akun Tidak Ditemukan');
				redirect(base_url('login'));
			}
		}		
	}

	public function logout()
    {
		$this->session->sess_destroy();
        redirect(base_url('login'), 'refresh');
	}
	
	public function logindeveloper()
	{
		$this->load->view('Auth/logindeveloper');
	}

	public function proseslogindeveloper()
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
			$this->load->view('Auth/logindeveloper');
		}
		else
		{
			$this->Auth_model->loginDeveloper();
		}
	}

	// KHUSUS DEVELOPER
	public function akuninstan()
	{
		date_default_timezone_set("Asia/Jakarta");
		$email = "developer".rand()."@printmedia.co.id";
		$str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$random = date('Y-m-d h:i:s').substr(str_shuffle($str), 0,15);
		$random2 = str_shuffle($str);
		$kodeunik = md5($random);
		$data = array(
			'pm1_auth_code' 	=> $kodeunik,
		    'pm1_auth_email' 	=> $email,
			'pm1_auth_password' => password_hash('developer', PASSWORD_BCRYPT),
			'pm1_auth_level' 	=> 1,
			'pm1_auth_token' 	=> md5($this->input->post('email')).$random2,
			'pm1_auth_date' 	=> date('Y-m-d'),
			'pm1_auth_time' 	=> date('H:i:s'),
			'pm1_auth_status' 	=> 2,
		);
		$this->Auth_model->Insert('pm1_auth', $data);
		echo "Selamat Anda Mendapatkan <br>";
		echo "Email: ".$email."<br>";
		echo "Password: developer"."<br>";
		echo "Level: Developer";
	}

	public function email()
	{
		$data = array(
			'pm1_auth_code' 	=> 1,
		    'pm1_auth_email' 	=> $this->input->post('email'),
			'pm1_auth_password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'pm1_auth_level' 	=> 2,
			'pm1_auth_token' 	=> md5($this->input->post('email')).$random2,
			'pm1_auth_date' 	=> date('Y-m-d'),
			'pm1_auth_time' 	=> date('H:i:s'),
			'pm1_auth_status' 	=> 1,
		);
		$data = array('data' => $data);
		$this->load->view('Auth/email', $data);
	}

	/* ----- MITRA ----- */
	public function loginmitra()
	{
		$this->load->view('Auth/loginmitra');
	}

	public function log_auth()
	{
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
			'pm0_loginregister_email' => $this->input->post('email'),
			'pm0_loginregister_ip' => $this->input->ip_address(),
			'pm0_loginregister_browser' => $agent,
			'pm0_loginregister_platform' => $this->agent->platform(),
			'pm0_loginregister_time' => date('Y-m-d h:i:s'),
			'pm0_loginregister_information' => 'Login',
			'pm0_loginregister_session' => session_id(),
		);
		$data = $this->Auth_model->Insert('pm0_loginregister', $data);
	}

	public function logoutdev()
	{
		$this->session->sess_destroy();
    	redirect(base_url('logindeveloper'));
	}
}
