<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgetPassword extends CI_Controller {

	
	public function index()
	{
        if($this->session->userdata('id_user')){
            redirect('User/Dashboard');
        }
		$this->form_validation->set_rules('txtUsername', 'username', 'trim|required', [
            'required' => 'Masukkan username.'
        ]);
        $this->form_validation->set_rules('txtTelp', 'telp', 'trim|required', [
            'required' => 'Masukkan Telp.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title']="Forget Password | Lelang";
			$this->load->view('Auth/Header' , $data);
			$this->load->view('Auth/ForgetPassword');
        } else {
            $this->_Masuk();
        }
	}
	private function _Masuk(){
		$username = $this->input->post('txtUsername');
        $telp = $this->input->post('txtTelp');
		$where = [
			'username' => $username,
            'telp' => $telp,
		];

        $masyarakat = $this->db->get_where('tb_masyarakat' , $where)->row_array();
		

        if ($masyarakat) {
            
                    $data = [
                        'username' => $masyarakat['username'],
                        'telp' => $masyarakat['telp'],
                    ];
                    $this->session->set_userdata($data);
					
                    redirect('Auth/ForgetPassword_2');
					
			
            
        }
		
		else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    <p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Akun belum terdaftar.</p>
                    
                    </div>');
            redirect('Auth/ForgetPassword');
        }
	}
    
}
