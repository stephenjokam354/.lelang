<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
		$this->model->user();
		$this->model->countdown();
	}
	public function index()
	{
		$data['title']="History | Lelang";
        $id = $this->session->userdata('id_user');
        $data['barang']=$this->db->query('SELECT * FROM tb_barang INNER JOIN tb_lelang USING(id_barang) INNER JOIN history_lelang b USING(id_barang) WHERE b.id_user="'.$id.'"')->result_array();
        $this->load->view('User/Template/Header' , $data);
		$this->load->view('User/Template/Menu' );
		$this->load->view('User/History' );
		$this->load->view('User/Template/Footer' );

	}
	public function bayar($id,$penawaran,$jaminan){
		$user = $this->session->userdata('id_user');
		if($id==null){
			redirect('User/Master/History');
		}
		$where = [
			'id_user' => $user,
			'id_barang' => $id
		];
		$whereid = [
			'id_user' => $user,
		];
		$pen = $penawaran-$jaminan;
		$cek = $this->db->get_where('tb_virtual',$whereid)->row_array();
		if($pen<=$cek['saldo']){
			$up = ['status_penawar'=>"lunas"];
			$up2 = ['saldo'=>$cek['saldo']-$pen];
			$update = $this->model->put('history_lelang',$up,$where);
			$update2 = $this->model->put('tb_virtual',$up2,$whereid);
			if($update){
				$this->flash("Pembayaran Sukses",'success');
				redirect('User/Master/History');
			}
		}else{
			$this->flash("Saldo Anda Kurang",'error');
			redirect('User/Master/History');
		}
		
	}
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