<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
		$this->model->aksesAdmin();
	}
	public function index()
	{
		$data['title']="Persyaratan (User) | Lelang";

		$data['proses']=$this->db->query('SELECT * FROM tb_masyarakat LEFT OUTER JOIN tb_ktp USING(id_user) LEFT OUTER JOIN tb_npwp USING(id_user)')->result_array();

		$this->load->view('Admin/Template/Header' , $data);
		$this->load->view('Admin/Template/Menu' );
		$this->load->view('Admin/User' );
		$this->load->view('Admin/Template/Footer' );

	}
    
}