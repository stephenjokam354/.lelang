<body>
  <main>
    <div class="container-fluid bg-dark">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-sm-6 login-section-wrapper">
          <?= $this->session->flashdata('message') ?>
          <?php if (isset($_SESSION['message'])) {
            unset($_SESSION['message']);
          } ?>
          <div class="card p-5 shadow-lg" style="margin-top:2rem;margin-bottom: 10px;">
            <div class="">
              <h1 class="login-title text-center">Login</h1>
              <form action="<?= site_url('Auth/Login') ?>" method="POST">
                <div class="form-group mb-3">
                  <label for="email" class="mb-2">Username</label>
                  <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" autocomplete="off" value="<?= set_value('txtUsername'); ?>">
                  <?= form_error('txtUsername', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="mb-2">Password</label>
                  <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Password">
                  <?= form_error('txtPassword', '<small class="text-danger">', '</small>'); ?>
                </div>

                <input type="submit" id="login" class="btn btn-dark w-100 mt-3" type="button" value="Login">
              </form>
              <p class="mt-3"><a href="<?= site_url("Auth/ForgetPassword") ?>" class="text-reset">Forget Password?</a></p>
              <p class="mt-3">Don't have an account?<a href="<?= site_url("Auth/Register") ?>" class="text-reset">Register here</a></p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </main>
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>