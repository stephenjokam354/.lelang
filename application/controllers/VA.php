<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VA extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('rekening')){
            redirect('LoginVirtual');
        }
	}
	public function index()
	{
        $this->form_validation->set_rules('txtVA','va','trim|required',[
            'required' => "Masukkan VA"
        ]);
        $this->form_validation->set_rules('txtSaldo','saldo','trim|required',[
            'required' => "Masukkan Saldo"
        ]);
        
        
		if($this->form_validation->run()==false){
            $data['title']="VA Top Up | Virtual";
		    $this->load->view('VA' ,$data);
        }else{
            $this->_saldo();
        }
	}
    private function _saldo()
    {
        $va = $this->input->post('txtVA');
        $saldo = $this->input->post('txtSaldo');
        $where=[
            'va' => $va
        ];
        
        $cek = $this->db->get_where('tb_virtual',$where)->row_array();
        if($cek){
            $sesSaldo = $this->session->userdata('saldo') - $saldo;
            $this->session->set_userdata(['saldo'=>$sesSaldo]);
            $update=['saldo'=> $saldo + $cek['saldo']];
            $this->model->put('tb_virtual',$update,$where);
            $this->flash("Berhasil Transfer",'success');
            redirect('VA');
        }else{
            $this->flash("Virtual Account tidak valid",'error');
            redirect('VA');
        }
    }
    public function logout(){
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('rekening');
        $this->session->unset_userdata('saldo');
        redirect('LoginVirtual');
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