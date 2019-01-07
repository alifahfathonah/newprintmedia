<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mitra_model');
    }

    public function index()
    {
        $this->load->view('mitra/index');
    }

    public function profiltoko()
    {
        $this->load->view('mitra/profil/toko');
    }

    public function profilpemilik()
    {
        $this->load->view('mitra/profil/pemilik');
    }

    public function ajax()
    {
        $this->load->view('Mitra/ajax');
    }

    public function cek()
    {
        $date = date('2019-01-31');
        $currentMonth = date("m",strtotime($date));
        $nextMonth = date("m",strtotime($date."+1 month"));
        if($currentMonth==$nextMonth-1){
            $nextDate = date('Y-m-d',strtotime($date." +1 month"));
        }else{
            $nextDate = date('Y-m-d', strtotime("last day of next month",strtotime($date)));
        }
        echo "Next date would be : $nextDate";
    }
}
