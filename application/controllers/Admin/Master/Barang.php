<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->model('model');
        date_default_timezone_set("Asia/Jakarta");
        $this->model->aksesAdmin();
        $this->model->countdown();
	}
	
	public function index()
	{
        $this->load->model('model');
		$data['title']="Barang | Lelang";

        $data['barang']= $this->db->query('SELECT * FROM tb_barang LEFT OUTER JOIN tb_lelang USING(id_barang) ORDER BY id_barang DESC ')->result_array();

		$this->load->view('Admin/Template/Header' , $data);
		$this->load->view('Admin/Template/Menu' );
		$this->load->view('Admin/Barang' );
		$this->load->view('Admin/Template/Footer' );

	}
    
    public function insert()
    {
		
        $nama = $this->input->post('txtNamaBarang');
        $harga = $this->input->post('txtHarga');
        $deskripsi = $this->input->post('txtDeskripsi');
        
        $where = [
            'nama_barang' => $nama,
            'harga_awal' => $harga,
            'tgl' => date('Y-m-d'),
            'deskripsi' => $deskripsi,
            
        ];
		
		
			$insert = $this->db->insert('tb_barang',$where);
            $this->id = $this->db->insert_id();
            $image = $this->_uploadImage();
            $wherega =['gambar'=>$image];
            $whereid = ['id_barang'=>$this->id];
			if($insert){
				echo $this->flash('Berhasil Menambahkan','success');
                $this->model->put('tb_barang',$wherega,$whereid);
			}
			else{
				echo $this->flash('Gagal Menambahkan','error');
			
			}
            redirect('Admin/Master/Barang');
		}
        public function update(){
            $id = $this->input->post('txtId');
            $this->id = $this->input->post('txtId');
            if($id==""){
                redirect('Admin/Master/Barang');
            }
    
            $nama = $this->input->post('txtNamaBarang');
            $harga = $this->input->post('txtHarga');
           
            $deskripsi = $this->input->post('txtDeskripsi');
    
           

            $whereid = [
                'id_barang' => $id,
            ];
           
            if (!empty($_FILES["txtGambar"]["name"])) {
                $image = $this->_uploadImage();
            } else {
                $image = $this->input->post("txtGambar");
            }
            if($this->input->post('txtGambar')==""){
            $where = [
                'nama_barang' => $nama,
                'harga_awal' => $harga,
                'tgl' => date('Y-m-d'),
                'deskripsi' => $deskripsi,
            ];
            }else{
                $where = [
                    'nama_barang' => $nama,
                    'harga_awal' => $harga,
                    'tgl' => date('Y-m-d'),
                    'deskripsi' => $deskripsi,
                    'gambar' => $image
                ];
            }

            
            $update = $this->model->put('tb_barang',$where,$whereid);
                if($update){
                    echo $this->flash('Berhasil Update','success');
                
                }
                else{
                    echo $this->flash('Gagal Update','error');
                
                }
            
                redirect('Admin/Master/Barang');
        }
        public function delete(){
            $id = $this->input->post('txtId');
            $image = $this->input->post('txtImage');
            if($id==""){
                redirect('Admin/Master/Barang');
            }
            $where = [
                'id_barang' => $id
            ];
            $delete = $this->db->delete('tb_barang', $where);
            if($delete){
                echo $this->flash('Berhasil Menghapus','success');
                unlink("assets/images/barang/".$image);
            
            }
            else{
                echo $this->flash('Gagal Menghapus','error');
            
            }
            redirect('Admin/Master/Barang');
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
		// Images
        private function _uploadImage()
{
    $config['upload_path']          = './assets/images/barang';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->id;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('txtGambar')) {
        return $this->upload->data("file_name");
    }else{
        $this->flash("Gambar harus IMG/PNG","error");
        redirect('Admin/Master/Barang');
        return 'default.jpg';
    }
  
    
}

   
		
}


