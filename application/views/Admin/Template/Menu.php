<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
            <h2 class="mt-3 mb-3"><font color="blue">.</font>Lelang</h2>
         
         
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
       
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?=$this->session->userdata('nama_petugas')?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="<?=site_url('Home')?>">
                <i class="mdi mdi-home text-primary"></i>
                Home
              </a>
              <a class="dropdown-item" href="<?=site_url('Admin/Dashboard/logout')?>">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('Admin/Dashboard')?>">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#barang" aria-expanded="false" aria-controls="barang">
              <i class="mdi mdi-collage menu-icon"></i>
              <span class="menu-title">Barang</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="barang">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=site_url('Admin/Master/Barang')?>"> Barang</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=site_url('Admin/Master/BarangLelang')?>"> History</a></li>
              </ul>
            </div>
          </li>
          <?php if($this->session->userdata('level')==1):?>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('Admin/Master/Petugas')?>" >
              <i class="mdi mdi-account-plus menu-icon"></i>
              <span class="menu-title">Petugas</span>
            </a>
          </li>
          <?php endif;?>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#User" aria-expanded="false" aria-controls="User">
              <i class="mdi mdi-account menu-icon"></i>
              <?php $proses = $this->model->persyaratan();?>
              
              <span class="menu-title">
              <?php if($proses>0):?>
              <span class="badge rounded-pill bg-danger text-light"><?=$proses?></span> 
              <?php endif;?>
              User </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="User">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=site_url('Admin/Master/Persyaratan/User')?>"> User</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=site_url('Admin/Master/Persyaratan/proses')?>">Validasi 
                <?php if($proses>0):?>
              <span class="badge rounded-pill bg-danger text-light"><?=$proses?></span> 
              <?php endif;?></a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('Admin/Master/History')?>">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">History Lelang</span>
            </a>
          </li>
          
         
          
        </ul>
      </nav>
  