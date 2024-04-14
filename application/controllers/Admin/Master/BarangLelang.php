<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangLelang extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
		$this->model->aksesAdmin();
		$this->model->countdown();
	}
	
	public function index()
	{
		$data['title']="Barang Lelang | Lelang";
		$data['barang']= $this->db->query('SELECT * FROM tb_barang INNER JOIN tb_lelang USING(id_barang) INNER JOIN tb_petugas USING(id_petugas) ORDER BY id_barang DESC')->result_array();

		$this->load->view('Admin/Template/Header' , $data);
		$this->load->view('Admin/Template/Menu' );
		$this->load->view('Admin/BarangLelang' );
		$this->load->view('Admin/Template/Footer' );

	}
	public function insert(){

		$id = $this->input->post('txtId');
		
		$tgl = $this->input->post('tgl');
		$jaminan = $this->input->post('txtJaminan');
		$tglJaminan = $this->input->post('tglJaminan');
		$timeAwal = $this->input->post('txtTimeAwal');
		$timeAkhir = $this->input->post('txtTimeAkhir');

		$where = [
			'id_barang' => $id,
			'tgl_lelang' => $tgl,
			'id_petugas' => $this->session->userdata('id_petugas'),
			'jaminan' => $jaminan,
			'tgl_jaminan' => $tglJaminan,
			'time_awal' => $timeAwal,
			'time_akhir' => $timeAkhir
		];
		
		$insert = $this->db->insert('tb_lelang',$where);
		
		if($insert){
			echo $this->flash('Berhasil Menambahkan','success');
		
		}
		else{
			echo $this->flash('Gagal Menambahkan','error');
		
		}
		redirect('Admin/Master/BarangLelang');
	

	}
	// private function _update(){
	// 	$id = $this->input->post('txtId');
	// 	$where_cek=[
	// 		'id_barang' => $id,
	// 	];

	// 	$tgl = $this->input->post('tgl');
	// 	$jaminan = $this->input->post('txtJaminan');
	// 	$tglJaminan = $this->input->post('tglJaminan');
	// 	$timeAwal = $this->input->post('txtTimeAwal');
	// 	$timeAkhir = $this->input->post('txtTimeAkhir');

	// 	$where = [
	// 		'tgl_lelang' => $tgl,
	// 		'id_petugas' => $this->session->userdata('id_petugas'),
	// 		'jaminan' => $jaminan,
	// 		'tgl_jaminan' => $tglJaminan,
	// 		'time_awal' => $timeAwal,
	// 		'time_akhir' => $timeAkhir
	// 	];

	// 	$update = $this->model->put('tb_lelang',$where,$where_cek);
	// 	if($update){
	// 		echo $this->flash('Berhasil Update','success');
		
	// 	}
	// 	else{
	// 		echo $this->flash('Gagal Update','error');
		
	// 	}
	// 	redirect('Admin/Master/BarangLelang');
	// }

	public function flash($data,$status){
		return $this->session->set_flashdata('message', "<script>
			Swal.fire(
			'".$data."',
			'You clicked the button!',
			'".$status."'
							);
				</script> ");
	}
    
}