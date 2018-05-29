<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Ckform_pengaduan extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mkoor_pengaduan');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['kategori']=$this->Mkoor_pengaduan->kategori();
		$data['tempat']=$this->Mkoor_pengaduan->tempat();
		$this->load->view('koor_formpeng', $data);
	}
	public function ruang()
	{
		$id = $this->input->post('id');
		$data = $this->Mkoor_pengaduan->ruang($id);
		echo json_encode($data);
	}

	
}
