<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintData extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		
		$data['barang']=$this->db->query('SELECT * FROM tb_barang INNER JOIN tb_lelang a USING(id_barang) LEFT OUTER JOIN history_lelang b USING(id_barang,id_user)')->result_array();
	
		$this->load->view('Admin/print' ,$data);
		$this->load->view('Admin/Template/Footer' );

	}
    
	
}
