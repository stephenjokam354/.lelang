<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
	}
   
	public function BarangLelang($id)
	{
        $where = ['id_user'=>$this->session->userdata('id_user'),'id_barang'=>$id];
        $cek = $this->model->get_where('history_lelang',$where)->row_array();
        if($cek){
            redirect('Detail/Pelelangan/'.$id);
        }
        if($id==null){
            redirect('Home');
        }else if($this->session->userdata('id_user')==null){
            redirect('Auth/Login');
        }
		$data['title']="Detail | Lelang";
        
        $data['barang']=$this->db->query('SELECT * FROM tb_barang INNER JOIN tb_lelang USING(id_barang) WHERE id_barang="'.$id.'"')->row_array();
		$this->load->view('UserLelang/Template/Header' , $data);
		$this->load->view('UserLelang/Template/MenuDetail' );
		$this->load->view('UserLelang/Detail' );
		$this->load->view('UserLelang/Template/Footer' );

	}

    public function Lelang($id,$jaminan,$id_lelang){
        if($id==null){
            redirect('Home');
        }
        $id_user = $this->session->userdata('id_user');
        $where = ['id_user'=>$id_user];
        $cek = $this->db->get_where('tb_virtual',$where)->row_array();
        if($cek['saldo']>=$jaminan){
            $where_i = [
                'id_lelang'=> $id_lelang,
                'id_barang'=> $id,
                'id_user'=> $id_user,
                'penawaran_harga'=> 0,

            ];
            $this->model->insert('history_lelang',$where_i);
            $this->flash("Anda bisa mengikuti Lelang","success");
            redirect('Detail/BarangLelang/'.$id);
        }else{
            $this->flash("Saldo Tidak Cukup","error");
            redirect('Detail/BarangLelang/'.$id);
        }
    }
// Pelelangan
    public function Pelelangan($id){

        if($id==null){
            redirect('Home');
        }else if($this->session->userdata('id_user')==null){
            redirect('Auth/Login');
        }
        $id_user = $this->session->userdata('id_user');
		$data['title']="Detail | Lelang";
        
        $data['barang']=$this->db->query('SELECT *,tb_lelang.id_user AS id_u_lelang FROM tb_barang INNER JOIN tb_lelang USING(id_barang) INNER JOIN history_lelang c USING (id_barang) WHERE id_barang="'.$id.'" AND c.id_user ='.$id_user)->row_array();
		
        $data['history']=$this->db->query('SELECT * FROM tb_barang INNER JOIN history_lelang b USING (id_barang) INNER JOIN tb_masyarakat c ON b.id_user = c.id_user WHERE id_barang="'.$id.'" ORDER BY penawaran_harga DESC')->result_array();

        $data['tertinggi']=$this->db->query('SELECT * FROM tb_barang INNER JOIN tb_lelang USING(id_barang) WHERE id_barang="'.$id.'"')->row_array();

        $this->load->view('UserLelang/Template/Header' , $data);
		$this->load->view('UserLelang/Template/MenuDetail' );
		$this->load->view('UserLelang/DetailLelang' );
		$this->load->view('UserLelang/Template/Footer' );
    }

    public function Penawaran($id)
    {
        $harga = $this->input->post('txtHarga');
        if($this->input->post('txtPass')==$this->session->userdata('password')){
            if($id==null){
                redirect('Home');
            }
    
            $where = [
                'id_user' => $this->session->userdata('id_user'),
                'id_barang' => $id,
            ];
            $cek = $this->db->get_where('tb_lelang',$where)->row_array();
            if($harga>$cek['harga_akhir']){
                $up = [
                    'penawaran_harga'=>$harga,
                ];
                $update=$this->model->put('history_lelang',$up,$where);

                $up2 = [
                    'id_user'=>$this->session->userdata('id_user'),
                    'harga_akhir'=> $harga
                ];
                $where2 = [
                    'id_barang' => $id,
                ];

                $update2=$this->model->put('tb_lelang',$up2,$where2);
                if($update){
                    $this->flash('Berhasil','success');
                    redirect('Detail/Pelelangan/'.$id);
                }else{
                    $this->flash('Gagal','error');
                    redirect('Detail/Pelelangan/'.$id);
                }
            }else{
                $this->flash('Penawaran Harga Gagal','error');
                redirect('Detail/Pelelangan/'.$id);
            }
           
            } else{
                $this->flash('Password Salah','error');
                redirect('Detail/Pelelangan/'.$id);
            }
            
       
    }
    public function lelangSelesai($id)
    {
        if($id==null){
            redirect('Home');
        }
        
        $this->model->lelangSelesai($id);
        redirect('Detail/Pelelangan/'.$id);
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