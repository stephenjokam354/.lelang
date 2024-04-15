<body>
  <main>
    <div class="container-fluid bg-dark">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-sm-6  login-section-wrapper" style="margin-top: -42px;">

          <div class="card p-5 shadow-lg" style="margin-bottom: -40px;">
            <div class="">
              <?= $this->session->flashdata('message'); ?>
              <?php if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
              } ?>
              <h1 class="login-title text-center">Register</h1>
              <form action="<?= site_url("Auth/Register") ?>" method="POST">
                <div class="form-group mb-4">
                  <label for="NamaLengkap" class="mb-2">Nama Lengkap</label>
                  <input type="text" name="txtNama" id="txtNama" class="form-control" placeholder="Nama" autocomplete="off" value="<?= set_value('txtNama') ?>">
                  <?= form_error('txtNama', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group mb-4">
                  <label for="Username" class="mb-2">Username</label>
                  <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" autocomplete="off" value="<?= set_value('txtUsername') ?>">
                  <?= form_error('txtUsername', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="mb-2">Password</label>
                  <input type="password" name="txtPassword" id="password" class="form-control" placeholder="enter your password">
                  <?= form_error('txtPassword', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="mb-2">Type-Password</label>
                  <input type="password" name="txtTypePass" id="TxtTypePass" class="form-control" placeholder="Type your password">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="mb-2">Telp</label>
                  <input type="text" name="txtTelp" id="TxtTelp" class="form-control" placeholder="Telp" value="<?= set_value('txtTelp') ?>">
                  <?= form_error('txtTelp', '<small class="text-danger">', '</small>'); ?>
                </div>
                <input type="submit" name="login" id="login" class="btn btn-block w-100 login-btn" type="button" value="Register" style="background-color: black;color:white ">
              </form>

              <p class="mt-3">Do have an account?<a href="<?= site_url("Auth/Login") ?>" class="text-reset">Login here</a></p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </main>
</body>

</html>