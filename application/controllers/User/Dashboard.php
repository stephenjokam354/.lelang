<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
		$this->model->user();
		$this->model->countdown();
	}
	public function index()
	{
		$data['title']="Dashboard | Lelang";
		$where = ['id_user' => $this->session->userdata['id_user']];
		$data['npwp'] = $this->db->get_where('tb_npwp',$where)->row_array();
		$data['ktp'] = $this->db->get_where('tb_ktp',$where)->row_array();
		$data['identitas']= $this->db->get_where('tb_masyarakat',$where)->row_array();
		
		$this->load->view('User/Template/Header' , $data);
		$this->load->view('User/Template/Menu' );
		$this->load->view('User/Dashboard' );
		$this->load->view('User/Template/Footer' );

	}
	public function logout(){
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_lengkap');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
				<p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Logout Berhasil</p>
				
				</div>');
		redirect('Auth/Login');
	}
	public function edit(){
		$id = $this->session->userdata('id_user');
		$nama = $this->input->post('txtNama');
		$telp = $this->input->post('txtTelp');

		$cek = $this->db->query('SELECT * FROM tb_masyarakat WHERE telp='.$telp.' AND id_user!='.$id)->row_array();
		if(!$cek){
			$update = [
				'nama_lengkap'=>$nama,
				'telp'=>$telp
			];
			$where = [
				'id_user' => $id
			];
	
			$up = $this->model->put('tb_masyarakat',$update,$where);

			if($up){
				$va = [
					'va'=>$telp
				];
				$virtual = $this->model->put('tb_virtual',$va,$where);
				$this->flash('Edit Berhasil','success');
				redirect('User/Dashboard');
			}
		}else{
			$this->flash('Telp Sudah Ada','error');
			redirect('User/Dashboard');
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