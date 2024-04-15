<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <?php if ($barang['status'] == "ditutup" && $barang['id_u_lelang'] == $this->session->userdata('id_user') && $barang['status_penawar'] == "menang" && $this->model->days3($barang['tgl_lelang']) <= 3) : ?>
        <div class="alert-success p-3">Anda Memenangkan Pelelangan ini. Segera melakukan pelunasan biaya dalam waktu kurang dari 3 hari. Jika lebih dari itu, maka anda uang jaminan anda tidak akan dikembalikan</div>
      <?php endif; ?>
      <?php if ($barang['status'] == "ditutup" && $barang['id_u_lelang'] == $this->session->userdata('id_user') && $barang['status_penawar'] == "menang" && $this->model->days3($barang['tgl_lelang']) > 3) : ?>
        <div class="alert-secondary p-3">Lelang hangus , Jaminan anda tidak bisa kembali . Dikarenakan anda belum melunasi biaya</div>
      <?php endif; ?>
      <?php if ($barang['status'] == "ditutup" && $barang['id_u_lelang'] != $this->session->userdata('id_user') && $barang['status_penawar'] == "kalah") : ?>
        <div class="alert-danger p-3">Maaf Anda Kalah Lelang . Jaminan anda akan dikembalikan</div>
      <?php endif; ?>
      <?php if ($barang['status'] == "ditutup" && $barang['id_u_lelang'] == $this->session->userdata('id_user') && $barang['status_penawar'] == "lunas") : ?>
        <div class="alert-success p-3">Anda Memenangkan Pelelangan ini. Pembayaran Sukses</div>
      <?php endif; ?>
    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-7 entries">

          <article class="entry">

            <div class="entry-img">
              <img src="<?= base_url('assets/images/barang/' . $barang['gambar']) ?>" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="blog-single.html">Detail :</a>
            </h2>



            <div class="entry-content">
              <p>
                <?= $barang['deskripsi'] ?>
              </p>

            </div>

          </article><!-- End blog entry -->





        </div><!-- End blog entries list -->

        <div class="col-lg-5">

          <div class="sidebar">

            <h2 class="mb-2"><?= $barang['nama_barang'] ?></h2>
            <h6 class="mb-3">Harga Awal : Rp.<?= $this->model->rupiah($barang['harga_awal']) ?></h6>
            <h3 class="sidebar-title">Nilai Tertinggi :</h3>
            <h2 class="mb-3 text-primary fw-bold">Rp.<?= $this->model->rupiah($barang['harga_akhir']) ?></h2>
            <label id="demo" class="text-danger fw-bold mb-3"></label>
            <label id="time" class="text-success fw-bold mb-3"></label>
            <h6><?= date('d F Y', strtotime($barang['tgl_lelang'])) ?> jam <?= date('H:i', strtotime($barang['time_awal'])) ?> s/d <?= date('d F Y', strtotime($barang['tgl_lelang'])) ?> jam <?= date('H:i', strtotime($barang['time_akhir'])) ?></h6>
            <hr>
            <div class="sidebar-item categories container-fluid p-0">
              <div>
                <div class="mt-3 text-center">
                  <button class="btn btn-success w-25" id="btnPlus" onclick="btnPlus();">+</button> <button class="btn btn-danger w-25" id="btnMin" onclick="btnMin();">-</button>

                </div>
                <form action="<?= site_url('Detail/Penawaran/' . $barang['id_barang']) ?>" method="POST">
                  <?= $this->session->flashdata('message') ?>
                  <?php if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                  } ?>
                  <div class="form-group ">
                    <label for="password" class="mt-3 mb-2">Penawaran Harga</label>
                    <input type="number" name="txtHarga" class="form-control" min="<?= $barang['harga_awal'] ?>" id="penawaran" value="<?= $barang['harga_akhir'] ?>">

                    <input type="password" name="txtPass" class="form-control mt-3" placeholder="Password Akun">
                  </div>
                  <div class="mb-5 mt-3 text-center">
                    <button type="submit" class="btn btn-primary w-50" id="btnModal" disabled>Penawaran</button>
                  </div>
                </form>

              </div>
              <div class="row">



                <div class="container-fluid p-0 mt-3">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h2 class="bg-primary p-3 text-light">Rp.<?= $this->model->rupiah($barang['harga_akhir']) ?> <?php if ($tertinggi['id_user'] == $this->session->userdata('id_user')) { ?>(anda)<?php } ?></h2>
                      <hr>
                    </div>
                    <div class="col-md-12 text-center">
                      <button class="btn btn-lg btn-dark w-50 text-light" data-bs-toggle="modal" data-bs-target="#myModal">History Lelang</button>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End sidebar categories-->





          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->
<script>
  function btnPlus() {

    var input = document.getElementById('penawaran').value;
    var v = 100000;
    var tambah = eval(parseInt(input) + v);
    document.getElementById('penawaran').value = tambah;
  }

  function btnMin() {

    var input = document.getElementById('penawaran').value;
    var kurang = eval(parseInt(input) - 100000);
    document.getElementById('penawaran').value = kurang;

  }

  // Mengatur waktu akhir perhitungan mundur
  var countDownDate = new Date("<?= date('d F Y', strtotime($barang['tgl_lelang'])) ?> <?= date('H:i', strtotime($barang['time_awal'])) ?>").getTime();
  var countDownDate2 = new Date("<?= date('d F Y', strtotime($barang['tgl_lelang'])) ?> <?= date('H:i', strtotime($barang['time_akhir'])) ?>").getTime();

  // Memperbarui hitungan mundur setiap 1 detik
  var x = setInterval(function() {

    // Untuk mendapatkan tanggal dan waktu hari ini
    var now = new Date().getTime();

    // Temukan jarak antara sekarang dan tanggal hitung mundur
    var distance = countDownDate - now;
    var distance2 = countDownDate2 - now;

    // Perhitungan waktu untuk hari, jam, menit dan detik
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
    var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
    var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);

    // Keluarkan hasil dalam elemen dengan id = "demo"
    document.getElementById("demo").innerHTML = " Dimulai dalam : " + days + "h " + hours + "j " +
      minutes + "m " + seconds + "s ";

    // Jika hitungan mundur selesai, tulis beberapa teks 
    if (distance < 0) {

      document.getElementById("demo").innerHTML = "";
      document.getElementById("btnModal").disabled = false;

      document.getElementById("time").innerHTML = "Selesai Lelang : " + days2 + "h " + hours2 + "j " +
        minutes2 + "m " + seconds2 + "s ";
      if (distance2 < 0) {
        clearInterval(x);
        document.getElementById("time").innerHTML = "Lelang Selesai";
        document.getElementById("btnModal").disabled = true;
        if ("<?= $barang['status'] ?>" == "dibuka") {
          window.location = '<?= site_url('Detail/lelangSelesai/' . $barang['id_barang']) ?>';
        }
      }
    }
  }, 1000);
</script>




<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Pengikut Lelang </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <?php $no = 1;
            foreach ($history as $hs) : ?>
              <div class="col-md-6">
                <?php if ($this->session->userdata('id_user') == $hs['id_user']) { ?>
                  <p class="bg-warning"><?= $no ?> . Anda</p>
                <?php } else { ?>
                  <p><?= $no ?> . <?= $hs['nama_lengkap'] ?></p>
                <?php } ?>
              </div>
              <div class="col-md-6 text-end">
                <p>Rp.<?= $this->model->rupiah($hs['penawaran_harga']) ?></p>
              </div>
            <?php $no++;
            endforeach; ?>

          </div>
        </div>



      </div>
      <div class="modal-footer">
        <div class="text-center">
          Pengikut : <?= $no - 1 ?> Peserta
        </div>
      </div>
    </div>
  </div>
</div>