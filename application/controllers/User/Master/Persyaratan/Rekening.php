<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
		$this->model->countdown();
	}
	public function index()
	{
		$data['title']="Rekening | Lelang";
        
        
		$this->load->view('User/Template/Header' , $data);
		$this->load->view('User/Template/Menu' );
		$this->load->view('User/Rekening' );
		$this->load->view('User/Template/Footer' );

	}
    
}