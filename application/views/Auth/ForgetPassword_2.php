
<body>
  <main>
    <div class="container-fluid bg-dark">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-sm-6 login-section-wrapper" >
            <?=$this->session->flashdata('message')?>
          <div class="card p-5 shadow-lg" style="margin-top:2rem;margin-bottom: 106px;"><div class="" >
            <h1 class="login-title text-center" >Forgot Password</h1>
            <form action="<?=site_url('Auth/ForgetPassword_2')?>" method="POST">
              <div class="form-group mb-3">
                <label for="email" class="mb-2">Ganti Password</label>
                <input type="text" name="txtPass1" id="txtPass1" class="form-control" placeholder="Username" autocomplete="off" >
                <?= form_error('txtPass1', '<small class="text-danger">', '</small>'); ?>  
            </div>
              <div class="form-group mb-4">
                <label for="password" class="mb-2">Type-Password</label>
                <input type="password" name="txtPass2" id="txtPass2" class="form-control" placeholder="Type-Password">
                <?= form_error('txtPass2', '<small class="text-danger">', '</small>'); ?> 
            </div>
              
              <input type="submit" id="login" class="btn btn-dark w-100 mt-3" type="button" value="Ganti Password" >
            </form>
            </div></div>
          
        </div>
        
      </div>
    </div>
  </main>
  <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>
