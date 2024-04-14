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
<?=$this->session->flashdata('message')?>
<div class="container-sm">
    <div class="row">
        <div class="col-sm-12 mt-3 text-end">
            <a href="<?=site_url('VA/logout')?>" class="btn btn-dark text-light">Logout</a>
        </div>
        <div class="col-sm-12">
            <div class="card p-5 text-center mt-3 mb-3 bg-dark text-light">
                    <h3>Rp.<?=$this->model->rupiah($this->session->userdata('saldo'))?></h3>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card p-5 mt-2 text-center">
            <h3>Top Up Saldo VA</h3>
            <form action="<?=site_url('VA')?>" method="POST">
        <div class="row mt-3 mb-3 justify-content-center">
   <div class="col-sm-4">
      <input type="text" name="txtVA" class="form-control" id="inputPassword3" placeholder="No Virtual" autocomplete="off">
      <?=form_error('txtVA', '<small class="text-danger">', '</small>')?>
    </div>
  </div>
  
  <div class="row mb-3 justify-content-center">
   <div class="col-sm-4">
      <input type="number" name="txtSaldo" class="form-control" max="<?=$this->session->userdata('saldo')?>" id="inputPassword3" placeholder="Saldo" autocomplete="off" >
      <?=form_error('txtSaldo', '<small class="text-danger">', '</small>')?>
    </div>
  </div>
  <div class="row mb-3 justify-content-center">
   <div class="col-sm-4">
      <input type="text" class="form-control" id="inputPassword3" placeholder="No Rekening" value="<?=$this->session->userdata('rekening')?>" readonly>
    </div>
  </div>
  <div class="row mb-3 justify-content-center">
   <div class="col-sm-4">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Nama" value="<?=$this->session->userdata('nama')?>" readonly>
    </div>
  </div>
    <div class="text-center mt-3">
    <button type="submit" class="btn btn-dark w-25">Transfer</button>
    </div>
  </form>
            </div>
        </div>
    </div>
</div>
  
<script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>
