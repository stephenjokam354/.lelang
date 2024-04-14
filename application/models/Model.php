
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
    
function get($tabel)
{
    return $this->db->get($tabel)->result_array();
}

function get_where($tabel, $where)
{
    return $this->db->get_where($tabel, $where);
}

function insert($tabel, $data)
{
    $this->db->insert($tabel, $data);
}

function put($tabel, $data, $where)
{
    $db = $this->db->where($where);
    $this->db->update($tabel, $data);
    return $db;
}
function persyaratan(){
    return $this->db->query('SELECT * FROM tb_masyarakat m LEFT OUTER JOIN tb_ktp a USING(id_user) LEFT OUTER JOIN tb_npwp b USING(id_user) WHERE status_npwp ="1" OR status_ktp="1"')->num_rows();
}

function delete($table = null, $where = null)
{
    $this->db->delete($table, $where);
}

function joins($table = null,  $join = null, $where = null)
{
    if ($join != null) {
        foreach ($join as $keyj => $valuej) {
            $this->db->join($keyj, $valuej);
        }
    }
    if ($where != null) {
        foreach ($where as $keyw => $dataw) {
            $this->db->where($keyw, $dataw);
        }
    }
    $data = $this->db->get($table);
    return $data;
}

function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
    public function btnJaminan()
    {
        $where = ['id_user'=>$this->session->userdata('id_user')];
        $select = $this->get_where('tb_masyarakat',$where)->row_array();
        if($select['status']==2){
            return "";
        }else{
            return "disabled";
        }
    }
    public function menuLogin(){
        if($this->session->userdata('username')!=""&&$this->session->userdata('id_petugas')!=""){
            return $this->session->userdata('nama_petugas');
        }else if($this->session->userdata('username')!=""&&$this->session->userdata('id_user')!=""){
            return $this->session->userdata('nama_lengkap');
        }else{
            return "Login";
        }
    }
    public function lelangSelesai($id){
        $where = ['id_barang'=>$id];
        $cek = $this->db->get_where('tb_lelang',$where)->row_array();
        if($cek){

            $update = ['status_penawar'=>"menang"];
            $whereupdate = ['id_barang'=>$id,'id_user'=>$cek['id_user']];
            $this->put('history_lelang',$update,$whereupdate);

            $update2 = ['status_penawar'=>"kalah"];
            $where2 = ['id_barang'=>$id,'status_penawar'=>"peserta"];
            $this->put('history_lelang',$update2,$where2);

            $update3 = ['status'=>"ditutup"];
            $this->put('tb_lelang',$update3,$where);
            
        }
    }
    public function petugas(){
        if($this->session->userdata('level')==2){
            
        }else{
            redirect('Hal404');
        }
    }
    public function aksesAdmin(){
        if($this->session->userdata('level')==""){
            redirect('Auth/Login');
        }
        
    }
    public function admin(){
        
        if($this->session->userdata('level')!=1){
            redirect('Hal403');
        }
        
    }
    public function user(){
        if($this->session->userdata('id_user')==""){
            redirect('Auth/Login');
        }else if($this->session->userdata('level')!=""){
            redirect('Hal403');
        }else{

        }
    }

    public function barangCount(){
        return $this->db->get('tb_barang')->num_rows();
    }
    public function barangLCount(){
        return $this->db->query('SELECT * FROM tb_barang INNER JOIN tb_lelang USING(id_barang)')->num_rows();
    }
    public function userCount(){
        return $this->db->get('tb_masyarakat')->num_rows();
    }
    public function userBCount(){
        $where = ['status_penawar'=>"menang"];
        return $this->db->get_where('history_lelang',$where)->num_rows();
    }
    public function petugasCount(){
        $where = ['id_level'=>2];
        return $this->db->get_where('tb_petugas',$where)->num_rows();
    }

    public function nama($id){
        $where = ['id_user'=>$id];
        $data =$this->db->get_where('tb_masyarakat' ,$where)->row_array();
        return $data['nama_lengkap'];
    }

    public function btnresetBarang($id,$status){
       $where="";
       $data="";
        if($status=="dibuka"){
            $where = [
                'id_barang'=>$id
        ];
        $data = $this->db->get_where('history_lelang',$where)->num_rows();   
        }else if($status=="ditutup"){
       $data = $this->db->query('SELECT * FROM history_lelang WHERE id_barang='.$id.' AND penawaran_harga > 0')->num_rows();   
        
        }
          
        return $data;
    }

    public function days3($tgl){
    $tanggal = new DateTime($tgl);
    $sekarang = new DateTime();
    $perbedaan = $tanggal->diff($sekarang);    
    
    return $perbedaan->d;

    }
    public function countdown(){
        $where=['status'=>"dibuka"];
        $barang = $this->db->get_where('tb_lelang',$where)->result_array();
        foreach($barang as $brg):
        ?>
        
        <script>
        var countDownDate = new Date("<?=date('d F Y',strtotime($brg['tgl_lelang']))?> <?=date('H:i',strtotime($brg['time_akhir']))?>").getTime();
// Memperbarui hitungan mundur setiap 1 detik
var x = setInterval(function() {

  // Untuk mendapatkan tanggal dan waktu hari ini
  var now = new Date().getTime();
    
  // Temukan jarak antara sekarang dan tanggal hitung mundur
  var distance = countDownDate - now;
  var date = new Date();
    
  // Perhitungan waktu untuk hari, jam, menit dan detik
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  
  // Jika hitungan mundur selesai, tulis beberapa teks 
  if (distance < 0) {
    
    
        clearInterval(x);
        if("<?=$brg['status']?>"=="dibuka"){ 
            <?php 
                $tgl = date('Y-m-d');
                if($brg['status']=="dibuka"&&$tgl > $brg['tgl_lelang']):?>
           <?=$this->model->lelangSelesai($brg['id_barang'])?>
                    <?php endif;?>
       }
  }
}, 1000);
</script>
        <?php
        endforeach;
    }
}
?>