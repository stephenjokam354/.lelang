<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
		
		$this->model->admin();
		$this->model->aksesAdmin();
		$this->model->countdown();
	}

	public function index()
	{
		
		$data['title']="Petugas | Lelang";
		$where=[
			'id_level' => 2,
		];
		$data['petugas'] = $this->model->get_where('tb_petugas',$where)->result_array();

		$this->load->view('Admin/Template/Header' , $data);
		$this->load->view('Admin/Template/Menu' );
		$this->load->view('Admin/Petugas' );
		$this->load->view('Admin/Template/Footer' );

	}

	public function insert()
    {
		
        $nama = $this->input->post('txtNama');
        $username = $this->input->post('txtUsername');
        $password = $this->input->post('txtPassword');

        $where = [
            'nama_petugas' => $nama,
            'username' => $username,
            'password' => $password,
            'id_level' => 2,
        ];
		$wherecek =[
			'username' => $username,
		];
        
		$cek = $this->db->get_where('tb_petugas', $wherecek)->row_array();

		if($username!=$cek['username']){
			$insert = $this->db->insert('tb_petugas',$where);
			if($insert){
				echo $this->flash('Berhasil Menambahkan','success');
			
			}
			else{
				echo $this->flash('Gagal Menambahkan','error');
			
			}

		}else{
			echo $this->flash('Username Sudah Ada','error');
		}

		
			redirect('Admin/Master/Petugas');
		
}
	public function delete(){
		$id = $this->input->post('txtId');
		if($id==""){
			redirect('Admin/Master/Petugas');
		}
		$where = [
			'id_petugas' => $id
		];
		$stored = "CALL hapusPetugas(?)";
		$result = $this->db->query($stored, $where);
		if($result){
			echo $this->flash('Berhasil Menghapus','success');
		
		}
		else{
			echo $this->flash('Gagal Menghapus','error');
		
		}
		redirect('Admin/Master/Petugas');
	}

	public function update(){
		$id = $this->input->post('txtId');
		if($id==""){
			redirect('Admin/Master/Petugas');
		}

		$nama = $this->input->post('txtNama');
        $username = $this->input->post('txtUsername');
        $password = $this->input->post('txtPassword');

        $where = [
            'nama_petugas' => $nama,
            'username' => $username,
            'password' => $password,
            'id_level' => 2,
        ];
		$wherecek =[
			'username' => $username,
		];
		$whereid =[
			'id_petugas' => $id
		];
        
		$cek = $this->db->get_where('tb_petugas', $wherecek)->row_array();
		
		if($id==$cek['id_petugas']||$username!=$cek['username']){
			
			$update = $this->model->put('tb_petugas',$where,$whereid);
			if($update){
				echo $this->flash('Berhasil Update','success');
			
			}
			else{
				echo $this->flash('Gagal Update','error');
			
			}

		}else{
			echo $this->flash('Username Sudah Ada','error');
		}
	
		
			redirect('Admin/Master/Petugas');
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

