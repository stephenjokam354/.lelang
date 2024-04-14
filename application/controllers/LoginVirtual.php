<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginVirtual extends CI_Controller {

	
	public function index()
	{
		

		$this->form_validation->set_rules('txtNama', 'nama', 'trim|required', [
            'required' => 'Masukkan Nama.'
        ]);
        $this->form_validation->set_rules('txtRekening', 'rekening', 'trim|required', [
            'required' => 'Masukkan Rekening.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title']="Login | Virtual Account";
			$this->load->view('LoginVirtual' , $data);
			
        } else {
            $data = [
                'rekening' => $this->input->post('txtRekening'),
                'nama' => $this->input->post('txtNama'),
                'saldo' => 100000000,
            ];
            $this->session->set_userdata($data);
            redirect('LoginVirtual/Pin');
        }
        
	}
    public function Pin(){
        $data['title']="Pin | Virtual Account";
        $this->load->view('Pin' , $data);
    }
    public function PinMasuk(){
        redirect('VA');
    }

	
}
