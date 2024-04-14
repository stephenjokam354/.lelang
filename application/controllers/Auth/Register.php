<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index()
	{
		
        $this->form_validation->set_rules('txtNama', 'Nama', 'trim|required|min_length[8]', [
            'required' => 'Masukkan Nama.'
        ]);
		$this->form_validation->set_rules('txtUsername', 'Username', 'trim|required|min_length[8]', [
            'required' => 'Masukkan username.'
        ]);
        $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required|min_length[8]', [
            'required' => 'Masukkan password.',
        ]);
        $this->form_validation->set_rules('txtTypePass', 'Typepass', 'trim|required', [
            'required' => 'Masukkan TypePas.'
        ]);
        $this->form_validation->set_rules('txtTelp', 'telp', 'trim|required', [
            'required' => 'Masukkan No Telp.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title']="Register | Lelang";
		$this->load->view('Auth/Header' , $data);
		$this->load->view('Auth/Register');
        } else {
            $this->_Regis();
        }
	}
    private function _Regis(){
        $nama = $this->input->post('txtNama');
        $username = $this->input->post('txtUsername');
        $password = $this->input->post('txtPassword');
        $typePass = $this->input->post('txtTypePass');
        $telp = $this->input->post('txtTelp');

        if($password==$typePass){
            $wherecek =[
                'username'=>$username,
            ];
            $where=[
                'nama_lengkap'=>$nama,
                'username'=>$username,
                'password'=>$password,
                'telp'=>$telp,
            ];
            
            $cek = $this->db->get_where('tb_masyarakat' , $wherecek)->row_array();
            $cek2 = $this->db->get_where('tb_petugas' , $wherecek)->row_array();
            
            // cek
            if($username==$cek['username']){
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    <p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Username Sudah Ada.</p>
                    
                    </div>');
                    redirect('Auth/Register');
            }else if($username==$cek2['username']){
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    <p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Username Sudah Ada.</p>
                    
                    </div>');
                    redirect('Auth/Register');
            }else if($telp==$cek['telp']){
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    <p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Telp Sudah Ada.</p>
                    
                    </div>');
                    redirect('Auth/Register');
            }else{
            $this->db->insert('tb_masyarakat' , $where);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                    <p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Register Berhasil.</p>
                    
                    </div>');
                    redirect('Auth/Login');       
            }
            //cek selesai
            
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    <p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Password salah.</p>
                    
                    </div>');
            redirect('Auth/Register');
        }
    }

}
