<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ktp extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
	}
	public function insert()
	{
		$valid = $this->input->post('Valid');
		$noValid = $this->input->post('noValid');
		$id = $this->input->post('id_user');
		
		if($noValid){
			$this->_noValid();
		}else if($valid){
			$where =['id_user'=>$id];
			$update = ['status_ktp'=>3];
			$this->model->put('tb_ktp',$update,$where);

			redirect('Admin/Master/Persyaratan/Proses');
		}
	}
	private function _noValid(){

		$id = $this->input->post('id_user');
		
			$where =['id_user'=>$id];
			$update = ['status_ktp'=>2];
			$this->model->put('tb_ktp',$update,$where);

			redirect('Admin/Master/Persyaratan/Proses');
		
	}
    
}