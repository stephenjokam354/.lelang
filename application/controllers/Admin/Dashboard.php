<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
		$this->model->aksesAdmin();
		$this->model->countdown();
	}
	public function index()
	{
		$data['title']="Dashboard | Lelang";
		$data['barang']=$this->model->barangCount();
		$data['barangLelang']=$this->model->barangLCount();
		$data['user']=$this->model->userCount();
		$data['userBayar']=$this->model->userBCount();
		$data['petugas']=$this->model->petugasCount();

		$this->load->view('Admin/Template/Header' , $data);
		$this->load->view('Admin/Template/Menu' );
		$this->load->view('Admin/Dashboard' );
		$this->load->view('Admin/Template/Footer' );

	}
	public function logout(){
		$this->session->unset_userdata('id_petugas');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_petugas');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
				<p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Logout Berhasil</p>
				
				</div>');
		redirect('Auth/Login');
	}
    
}