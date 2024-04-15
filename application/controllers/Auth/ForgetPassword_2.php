<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgetPassword_2 extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model');
    }

    public function index(){
        if($this->session->userdata('id_user')){
            redirect('User/Dashboard');
        }
        if(!$this->session->userdata('username')){
            redirect('Auth/ForgetPassword');
        }
		$this->form_validation->set_rules('txtPass1', 'Password', 'trim|required|min_length[8]', [
            'required' => 'Masukkan Password.'
        ]);
        $this->form_validation->set_rules('txtPass2', 'pass2', 'trim|required', [
            'required' => 'Masukkan Type-Password.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title']="Forget Password | Lelang";
			$this->load->view('Auth/Header' , $data);
			$this->load->view('Auth/ForgetPassword_2');
        } else {
            $this->_pass();
        }
    }
    private function _pass(){
        $pass1 = $this->input->post('txtPass1');
        $pass2 = $this->input->post('txtPass2');

        if($pass1==$pass2){
            $up = ['password'=>$pass1];
            $where = [
                'username' => $this->session->userdata('username'),
                'telp' => $this->session->userdata('telp'),
        
        ];
            $update = $this->model->put('tb_masyarakat',$up,$where);
            if($update){
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
            <p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Password Berhasil Diganti.</p>
            
            </div>');
            redirect('Auth/Login');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    <p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Password Tidak Sama.</p>
                    
                    </div>');
            redirect(this);
        }
    }
}
