<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Virtual extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
		$this->model->countdown();
	}

	public function index()
	{
		$data['title']="Virtual Account | Lelang";
		$where = ['id_user'=>$this->session->userdata('id_user')];
		$data['va']=$this->db->get_where('tb_virtual',$where)->row_array();
		$this->load->view('User/Template/Header' , $data);
		$this->load->view('User/Template/Menu' );
		$this->load->view('User/Virtual' );
		$this->load->view('User/Template/Footer' );

	}
	
    
}