<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home/index');
	}

	public function tentang()
	{
		$this->load->view('home/tentang');
	}

	public function test()
	{
		echo $_SERVER['HTTP_HOST'] . "<br>" . getHostByName(getHostName());;
	}
}
