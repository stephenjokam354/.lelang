<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		if($this->session->userdata('level')){
            redirect('Admin/Dashboard');
        }
        if($this->session->userdata('id_user')){
            redirect('User/Dashboard');
        }
		$this->form_validation->set_rules('txtUsername', 'username', 'trim|required', [
            'required' => 'Masukkan username.'
        ]);
        $this->form_validation->set_rules('txtPassword', 'password', 'trim|required', [
            'required' => 'Masukkan password.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title']="Login | Lelang";
			$this->load->view('Auth/Header' , $data);
			$this->load->view('Auth/Login');
        } else {
            $this->_Masuk();
        }
	}
	private function _Masuk(){
		$username = $this->input->post('txtUsername');
        $password = $this->input->post('txtPassword');
		$where = [
			'username' => $username,
		];

        $masyarakat = $this->db->get_where('tb_masyarakat' , $where)->row_array();
		$petugas = $this->db->query('SELECT * FROM tb_petugas INNER JOIN tb_level USING(id_level) WHERE username="'.$username.'"')->row_array();
		

        if ($masyarakat) {
            if ($password==$masyarakat['password']) {
               
                    $data = [
                        'id_user' => $masyarakat['id_user'],
                        'username' => $masyarakat['username'],
                        'nama_lengkap' => $masyarakat['nama_lengkap'],
                        'password' => $masyarakat['password']
                    ];
                    $this->session->set_userdata($data);
					
                    redirect('User/Dashboard');
					
			
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    <p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Password salah.</p>
                    
                    </div>');
                redirect('Auth/Login');
            }
        }else if($petugas){
			if ($password==$petugas['password']) {
				$data = [
                    'id_petugas' => $petugas['id_petugas'],
					'username' => $petugas['username'],
					'level' => $petugas['id_level'],
					'nama_petugas' => $petugas['nama_petugas'],
				];
				$this->session->set_userdata($data);
				
				redirect('Admin/Dashboard');
			} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
				<p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Password salah.</p>
				
				</div>');
			redirect('Auth/Login');
		}
		} 
		
		else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    <p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; color: black">Akun belum terdaftar.</p>
                    
                    </div>');
            redirect('Auth/Login');
        }
	}
}
