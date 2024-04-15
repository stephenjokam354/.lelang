<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ktp extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        $this->model->user();
		$this->model->countdown();
	}

	public function index()
	{
		$data['title']="KTP | Lelang";
        $where = ['id_user' => $this->session->userdata['id_user']];

        $data['barang'] = $this->db->get_where('tb_ktp',$where)->result_array();

		
		$this->load->view('User/Template/Header' , $data);
		$this->load->view('User/Template/Menu' );
		$this->load->view('User/Ktp' );
		$this->load->view('User/Template/Footer' );

	}
    public function insert(){
		$id = $this->session->userdata('id_user');
		$wherecek = ['id_user' => $id];
		$cek = $this->db->get_where('tb_ktp',$wherecek)->result_array();
		if($cek){
			$this->_update();
		}else{
        $image = $this->_uploadImage();

		$where = [
			'id_user' => $id,
			'ktp' => $image,
			'status_ktp' => 1
		];

		$insert = $this->db->insert('tb_ktp',$where);
		if($insert){
			echo $this->flash('Berhasil Menambahkan','success');
			}else{
				echo $this->flash('Gagal Menambahkan','error');
			}
			redirect('User/Master/Persyaratan/Ktp');
		}
    }
		private function _update(){
			$id = $this->session->userdata('id_user');
		$wherecek = ['id_user' => $id];
		$cek = $this->db->get_where('tb_ktp',$wherecek)->result_array();
		
        if (!empty($_FILES["txtGambar"]["name"])) {
			$image = $this->_uploadImage();
		} else {
			$image = $this->input->post("txtGambar");
		}

		$where = [
			'id_user' => $id,
			'ktp' => $image,
			'status_ktp' => 1
		];


		$update = $this->model->put('tb_ktp',$where,$wherecek);
		if($update){
			echo $this->flash('Berhasil Update','success');
			}else{
				echo $this->flash('Gagal Update','error');
			}
			redirect('User/Master/Persyaratan/Ktp');
		
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

		private function _uploadImage()
		{
			$config['upload_path']          = './assets/images/ktp';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['file_name']            = $this->session->userdata('id_user');
			$config['overwrite']			= true;
			$config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('txtGambar')) {
				return $this->upload->data("file_name");
			}else{
				return "default.jpg";
			}
		
			
		}
}