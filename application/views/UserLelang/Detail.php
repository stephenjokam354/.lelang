<?=$this->session->flashdata('message')?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 entries">

            <article class="entry">

              <div class="entry-img">
                <img src="<?=base_url('assets/images/barang/'.$barang['gambar'])?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">Detail :</a>
              </h2>

            

              <div class="entry-content">
                <p>
                  <?=$barang['deskripsi']?>
                  </p>
                
              </div>

            </article><!-- End blog entry -->



            

          </div><!-- End blog entries list -->

          <div class="col-lg-5">

    <div class="sidebar">

      <h2 class="mb-4"><?=$barang['nama_barang']?></h2>
      <h3 class="sidebar-title">Nilai Limit :</h3>
      <h2 class="mb-5 text-primary fw-bold">Rp.<?=$this->model->rupiah($barang['harga_awal'])?></h2>
      
      <hr>
      <div class="sidebar-item categories container-fluid p-0">
        
        <div class="row">
          <div class="col-md-6">
            <p>Cara Penawaran </p>
          </div>
          <div class="col-md-6"><span>(Open Bidding)</span></div>
          <div class="col-md-6">
            <p>Jaminan </p>
          </div>
          <div class="col-md-6"><span>Rp.<?=$this->model->rupiah($barang['jaminan'])?></span></div>
          <div class="col-md-6">
            <p>Batas Akhir Jaminan</p>
          </div>
          <div class="col-md-6"><span><?=date('d F Y' , strtotime($barang['tgl_jaminan']))?></span></div>
          <div class="col-md-6">
            <p>Pelaksanaan Lelang </p>
          </div>
          <div class="col-md-6"><span><?=date('d F Y' , strtotime($barang['tgl_lelang']))?> jam <?=date('H:i' , strtotime($barang['time_awal']))?> s/d <?=date('d F Y' , strtotime($barang['tgl_lelang']))?> jam <?=date('H:i' , strtotime($barang['time_akhir']))?></span></div>
        </div>
      </div><!-- End sidebar categories-->
      <div class="mt-5 text-center">
        <?php $disable=$this->model->btnJaminan();?>
        <button id="btnModal" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary w-50" <?=$disable?>>Ikut Lelang</button>
        <p class="mt-2 fw-bold text-danger" id="demo" ></p>
      </div>
      
      

      

    </div><!-- End sidebar -->

  </div><!-- End blog sidebar -->
             
              

              

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->


  <div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Persetujuan Mengikuti Lelang :  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <p>Jaminan ikut lelang </p>
            </div>
            <div class="col-md-6 text-end">
              <h4>Rp.<?=$this->model->rupiah($barang['jaminan'])?></h4>
            </div>
            <div class="col-md-6">
              <p>Batas Akhir Jaminan</p>
            </div>
            <div class="col-md-6 text-end">
              <h5><?=date('d F Y',strtotime($barang['tgl_jaminan']))?></h5>
            </div>
            <div class="col-md-12 mt-3"><p><input type="checkbox" id="myCheck" onclick="myFunction()" > Saya setuju mengikuti lelang ini, dengan memenuhi persyaratan </p></div>
          </div>
        </div>
        
       
        
      </div>
      <div class="modal-footer">
        <div class="text-center">
        <form action="<?=site_url('Detail/Lelang/'.$barang['id_barang'].'/'.$barang['jaminan'].'/'.$barang['id_lelang'])?>">
          <button type="submit" href="blog copy.html" class="btn btn-primary w-100" id="button" disabled>Ikut Lelang</button>
          
          </form>
        </div>
       </div>
    </div>
  </div>
</div>
<script>
  function myFunction(){
      var checkbox = document.getElementById("myCheck");
      const button = document.getElementById('button');
       if(checkbox.checked==true)
            button.disabled = false;
       else
            button.disabled = true;
       

  }

// Mengatur waktu akhir perhitungan mundur
var countDownDate = new Date("<?=date('d F Y',strtotime($barang['tgl_jaminan']))?>").getTime();

// Memperbarui hitungan mundur setiap 1 detik
var x = setInterval(function() {

  // Untuk mendapatkan tanggal dan waktu hari ini
  var now = new Date().getTime();
    
  // Temukan jarak antara sekarang dan tanggal hitung mundur
  var distance = countDownDate - now;
    
  // Perhitungan waktu untuk hari, jam, menit dan detik
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Keluarkan hasil dalam elemen dengan id = "demo"
  document.getElementById("demo").innerHTML = days + "h " + hours + "j "
  + minutes + "m " + seconds + "s ";
    
  // Jika hitungan mundur selesai, tulis beberapa teks 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Jaminan Telah Ditutup";
    document.getElementById("btnModal").disabled = true;
  }
}, 1000);

</script>