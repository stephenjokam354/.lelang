<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
		$this->model->countdown();
	}
	public function index()
	{
		$data['title']="Home | Lelang";
        
        $data['barang']=$this->db->query('SELECT * FROM tb_barang INNER JOIN tb_lelang b USING(id_barang) WHERE b.status="dibuka"')->result_array();
		$this->load->view('UserLelang/Template/Header' , $data);
		$this->load->view('UserLelang/Template/Menu' );
		$this->load->view('UserLelang/Home' );
		$this->load->view('UserLelang/Template/Footer' );

	}
    public function location(){
        if($this->session->userdata('username')!=""&&$this->session->userdata('id_petugas')!=""){
            redirect('Admin/Dashboard');
        }else if($this->session->userdata('username')!=""&&$this->session->userdata('id_user')!=""){
            redirect('User/Dashboard');
        }else{
            redirect('Auth/Login');
        }
    }
	public function countdown($id,$location){

	}
    
}