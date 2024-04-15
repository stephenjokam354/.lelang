<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="hero-container">
    <h3>Welcome to <strong>Lelang</strong></h3>
    <h1>Lelang Secara Online</h1>
    <h2>Beberapa jenis barang yang dilelang cukup beragam mulai dari aset properti sampai elektronik

    </h2>
    <a href="#about" class="btn-get-started scrollto">Mulai</a>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="section-title">
        <h2>About</h2>
        <h3>Learn More <span>About Us</span></h3>

      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p>
            Persyaratan yang harus dipenuhi untuk mengikuti kegiatan lelang:
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> No Ktp</li>
            <li><i class="ri-check-double-line"></i> NPWP</li>
          </ul>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Berdasarkan ketentuan yang berlaku, peserta lelang yang memiliki penawaran tertinggi dengan melampaui nilai limit akan disahkan Pejabat Lelang sebagai pembeli. Namun jika terdapat penawaran tertinggi yang sama pengesahan ditentukan berdasarkan kecepatan penawaran yaitu yang diterimal pejabat lelang terlebih dahulu.


          </p>
          <a href="#" class="btn-learn-more">Learn More</a>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->





  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container">

      <div class="text-center">
        <h3>Segera Ikut!</h3>
        <p>Menangkan berbagai barang dengan penawaran tertinggi.</p>
        <a class="cta-btn" href="#">Ikut Lelang</a>
      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="BarangLelang" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Lelang</h2>
        <h3>Cek <span>Lelang</span></h3>
        <p>Tanggal mulai dan akhir lelang , jangan sampai kelewatan!</p>
      </div>



      <div class="row portfolio-container">
        <?php $no = 1;
        foreach ($barang as $brg) : ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="<?= base_url('assets/images/barang/' . $brg['gambar']) ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4> <?= $no++ ?>. <?= $brg['nama_barang'] ?></h4>
              <p>Nilai Limit : Rp.<?= $this->model->rupiah($brg['harga_awal']) ?></p>
              <a href="<?= site_url('Detail/BarangLelang/' . $brg['id_barang']); ?>" class="details-link" title="More Details">Cek</a>
              <?php if ($brg['status'] == "ditutup") : ?>
                <label class="bg-danger text-light p-1">Lelang Tutup</label>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>


      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Pricing Section ======= -->




</main><!-- End #main -->