<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_datauser extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin_datauser');
		$this->load->database();
		$this->load->helper(array('url','download'));
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['user']=$this->Madmin_datauser->user();
		$this->load->view('adm_datauser',$data);
	}

	public function upload()
	{
		$fileName = time().$_FILES['file']['name'];

		$config['upload_path']='./assets/';
		$config['file_name']=$fileName;
		$config['allowed_types']='xls|xlsx|csv';
		$config['max_size']=10000;

		$this->load->library('upload',$config);
		if (! $this->upload->do_upload('file')) {
			$this->upload->display_errors();

		}else{
			$media = $this->upload->data();
			$inputFileName = './assets/'.$media['file_name'];

			try {
				$inputFileType = IOFactory::identify($inputFileName);
				$objReader = IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			
			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();

			for ($row=2; $row <= $highestRow; $row++) { 
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

				$data = array(
					"nama_pengguna" => $rowData[0][1],
					"email" => $rowData[0][2],
					"password" => password_hash($rowData[0][3], PASSWORD_BCRYPT),
					"status" => $rowData[0][4],
					"id_level" => $rowData[0][5]
				);

				$insert = $this->db->insert("user",$data);
			unlink($inputFileName); //File Deleted After uploading in database .
		}
	}
	redirect('admin/data_user');
}

	public function download()
	{
		force_download('file/format_user_data.xlsx',NULL);
	}
}
