<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?=$title?></title>
 <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
  <script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
    <script src="<?=base_url('assets/package/dist/sweetalert2.all.js')?>"></script>

</head>
<body>
  <main>
    <div class="container-fluid mt-5 ">
      <div class="row justify-content-center align-items-center">
        <div class="col-sm-4 text-center">
            <h3>Virtual Account</h3>
          <div class="card p-5 shadow-lg text-start" style="margin-top:2rem;margin-bottom: 50px;"><div class="" >
            <h1 class="login-title text-center" >Login</h1>
            <?=$this->session->flashdata('message')?>
            <form action="<?=site_url('LoginVirtual/PinMasuk')?>" method="POST">
             
              <div class="form-group mb-4">
                <label for="password" class="mb-2">Pin</label>
                <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Password">
                <?= form_error('txtPassword', '<small class="text-danger">', '</small>'); ?> 
            </div>
              
              <input type="submit" id="login" class="btn btn-dark w-100 mt-3" type="button" value="Submit" >
            </form>

           
          </div></div>
          
        </div>
        
      </div>
    </div>
  </main>
  <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>
