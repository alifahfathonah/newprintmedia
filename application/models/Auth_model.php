<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auth_model extends CI_Model{ 
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
    
    public function daftarUser()
    {
        date_default_timezone_set("Asia/Jakarta");
		$data = array(
		    'email' => $this->input->post('email', TRUE),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'level' => 'Member',
			'token' => md5($this->input->post('email', TRUE)),
			'waktu' => date('Y-m-d H:i:s'),
			'status' => 'Belum Aktif',
        );
        
        $ci = get_instance();
		$ci->load->library('email');
		$email = $this->input->post('email');
		$code = md5($this->input->post('email'));
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "testingemailmahasiswa@gmail.com";
		$config['smtp_pass'] = "akusayangkamu123";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
				
		$ci->email->initialize($config);

		$isi = '<table>';
		$isi .= '<tr><td><h4>Aktifkan Akun Print Media!</h4></td></tr>';
		$isi .= '<tr><td><p>Halo <b>' . $email . '</b> terima kasih telah melakukan pendaftaran di Print Media. Kami beritahukan kepada Anda untuk melakukan aktivasi akun agar bisa digunakan.</p></td></tr>';
		$isi .= '<tr><td><a href="'.base_url().'aktivasi/'.$code.'">AKTIVASI AKUN</a></td></tr>';
		$isi .= '<tr><td><p>Terima Kasih, Salam Print Media</p></td></tr>';
        $isi .= '</table>';

		$ci->email->from('noreply@printmedia.com', 'PRINT MEDIA');
		$ci->email->to($email);
		$ci->email->subject('AKTIFASI AKUN PRINT MEDIA');
		$ci->email->message($isi);
        $this->email->send();
        $query = $this->db->insert('auth', $data);
        return $query;
    }

    public function daftarDeveloper()
    {
        date_default_timezone_set("Asia/Jakarta");
		$data = array(
		    'email' => $this->input->post('email', TRUE),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'level' => 'Developer',
			'token' => md5($this->input->post('email', TRUE)),
			'waktu' => date('Y-m-d H:i:s'),
			'status' => 'Aktif',
        );
        
        $query = $this->db->insert('auth', $data);
        return $query;
    }

    public function daftarMitra()
    {
        date_default_timezone_set("Asia/Jakarta");
		$data = array(
		    'email' => $this->input->post('email', TRUE),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'level' => 'Mitra',
			'token' => md5($this->input->post('email', TRUE)),
			'waktu' => date('Y-m-d H:i:s'),
			'status' => 'Aktif',
        );
        
        $query = $this->db->insert('auth', $data);
        return $query;
    }

    public function loginUser()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        $this->db->from('auth');
        $this->db->select('email, password, level, status');
        $this->db->where('email', $email);
		$query = $this->db->get();
		
        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
            if(password_verify($password, $data['password']))
            {
                if($data['status'] == 'Aktif')
				{
					if($data['level'] === 'Member' )
					{
						$this->session->set_userdata('akses', 'Member');
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
						redirect(base_url('user/index'));
					}
					
					if($data['level'] === 'Developer')
					{
						$this->session->set_flashdata('error', 'Gagal Login!');
						redirect(base_url('login'));
					}
					
					if($data['level'] === 'Mitra')
					{
						$this->session->set_flashdata('error', 'Gagal Login!');
						redirect(base_url('login'));
					}
				}
				if($data['status'] == 'Belum Aktif')
				{
					$this->session->set_flashdata('belumaktif', 'Gagal Login!');
					redirect(base_url('login'));
				}
				if($data['status'] == 'Suspend')
				{
					$this->session->set_flashdata('error', 'Maaf! Akun Anda telah kami <b>SUSPEND</b>. Karena terbukti melanggar beberapa peraturan yang telah diterapkan. Harap hubungi kami melalui menu Kontak, jika terbukti tidak melakukan kesalahan.');
					redirect(base_url('login'));
				}
            }
            else 
            {
                $this->session->set_flashdata('errorpassword', 'Maaf! Password Salah.');
				redirect(base_url('login'));
            }
        }
        else 
        {
            $this->session->set_flashdata('error', 'Maaf!');
			redirect(base_url('login'));
        }
    }

    public function Insert($table,$data)
    {
        $res = $this->db->insert($table, $data); 
        return $res; 
    }

    public function login($table, $data)
    {
        $res = $this->db->get_where($table, $data);
        return $res;
    }
    
    public function aktivasi($email)
    {
        $data = array(
            'status' => 'Aktif',
        );
        $this->db->from('auth');
        $this->db->where('token', $email);
        $this->db->update('auth', $data);
        return true;
    }

    public function GetWhere($table, $data){
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
    }

}
