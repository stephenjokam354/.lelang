 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html"><font color="blue">.</font> Lelang</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="<?=site_url('Home')?>">Home</a></li>
          <li><a class="nav-link scrollto" href="<?=site_url('Home')?>#about">About</a></li>
          <li><a href="" class="active">Lelang</a></li>
          <li><a href="<?=site_url('Home/location')?>"><i class="bi bi-person " style="font-size: 20px;" ></i><?=$this->model->menuLogin();?></a></li>
           </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->