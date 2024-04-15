<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
		$this->model->aksesAdmin();
		$this->model->countdown();
	}
	public function index()
	{
		$data['title']="History | Lelang";
		$data['barang']=$this->db->query('SELECT * FROM tb_barang INNER JOIN tb_lelang a USING(id_barang) LEFT OUTER JOIN history_lelang b USING(id_barang,id_user)')->result_array();

		$this->load->view('Admin/Template/Header' , $data);
		$this->load->view('Admin/Template/Menu' );
		$this->load->view('Admin/History' );
		$this->load->view('Admin/Template/Footer' );

	}
	public function resetLelang($id){
		if($id==null){
			redirect('Admin/Master/History');
		}
		$where = ['id_barang'=>$id];
		$this->model->delete('tb_lelang',$where);
		$this->model->delete('history_lelang',$where);
		redirect('Admin/Master/Barang');
	}
	// public function resetHLelang($id){
	// 	if($id==null){
	// 		redirect('Admin/Master/History');
	// 	}
	// 	$where = ['id_barang'=>$id];
	// 	$select=$this->model->get_where('tb_barang',$where)->row_array();
	// 	$wherein = [
	// 		'nama_barang' => $select['nama_barang'],
	// 		'tgl' => date('Y-m-d'),
	// 		'harga_awal' => $select['harga_awal'],
	// 		'gambar' => 'default.jpg'
	// 	];
	// 	$insert=$this->model->insert('tb_barang',$wherein);
	// 	redirect('Admin/Master/Barang');
	// }
    
}