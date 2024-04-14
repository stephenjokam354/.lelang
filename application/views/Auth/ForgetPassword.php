
<body>
  <main>
    <div class="container-fluid bg-dark">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-sm-6 login-section-wrapper" >
            <?=$this->session->flashdata('message')?>
          <div class="card p-5 shadow-lg" style="margin-top:2rem;margin-bottom: 50px;"><div class="" >
            <h1 class="login-title text-center" >Forgot Password</h1>
            <form action="<?=site_url('Auth/ForgetPassword')?>" method="POST">
              <div class="form-group mb-3">
                <label for="email" class="mb-2">Username</label>
                <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" autocomplete="off" value="<?= set_value('txtUsername'); ?>">
                <?= form_error('txtUsername', '<small class="text-danger">', '</small>'); ?>  
            </div>
              <div class="form-group mb-4">
                <label for="Telp" class="mb-2">Telp</label>
                <input type="text" name="txtTelp" id="txtTelp" class="form-control" placeholder="Telp">
                <?= form_error('txtTelp', '<small class="text-danger">', '</small>'); ?> 
            </div>
              
              <input type="submit" id="login" class="btn btn-dark w-100 mt-3" type="button" value="Submit" >
            </form>
            <p class="mt-3"><a href="<?=site_url("Auth/Login")?>" class="text-reset">Login?</a></p>
            </div></div>
          
        </div>
        
      </div>
    </div>
  </main>
  <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>
