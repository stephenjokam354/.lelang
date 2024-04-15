<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
		$this->model->aksesAdmin();
	}
	public function index()
	{
		$data['title']="Persyaratan (Proses) | Lelang";

		$data['proses']=$this->db->query('SELECT * FROM tb_masyarakat m LEFT OUTER JOIN tb_ktp a USING(id_user) LEFT OUTER JOIN tb_npwp b USING(id_user) WHERE status_npwp ="1" OR status_ktp="1"')->result_array();

		$this->load->view('Admin/Template/Header' , $data);
		$this->load->view('Admin/Template/Menu' );
		$this->load->view('Admin/Persyaratan' );
		$this->load->view('Admin/Template/Footer' );

	}
    
}