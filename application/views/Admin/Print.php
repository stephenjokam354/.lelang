<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/vendors/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/admin/vendors/base/vendor.bundle.base.css')?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/css/style.css')?>">
  <!-- endinject -->
  <script src="<?= base_url('assets/package/dist/sweetalert2.all.js')?>"></script>
 
</head>
<div class="text-center align-items-center">
        <div class="mt-5 mb-5">
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
          <div class="col-md-12 stretch-card">
              <div class="card">
                  <div class="card-body">
                      <h1 class="admin-header mb-5 mt-3">History Lelang</h1>
                              <div class="table-responsive">
                          <table class="table table-hover" width="100%" id="table-datatables">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>User</th>
                                      <th>Nama Barang</th>
                                      <th>Penawaran Tertinggi</th>
                                      <th>Jaminan</th>
                                      <th>Status Lelang</th>
                                      <th>Pembayaran Penawar</th>
                                     
                                  </tr>
                              </thead>
                              <tbody id="dataBarang">
                              <?php $no=1;foreach($barang as $brg):?>
                                <tr>
                                  <td><?=$no?></td>
                                  <td><?=$this->model->nama($brg['id_user'])?></td>
                                  <td><?=$brg['nama_barang']?></td>
                                  <td>Rp.<?=$this->model->rupiah($brg['harga_akhir'])?></td>
                                  <td><label >Rp.<?=$this->model->rupiah($brg['jaminan'])?></label></td>
                                  <td>
                                    <?php if($brg['status']=="dibuka"):?>
                                      <label>Dibuka</label>
                                    <?php endif;?>
                                    <?php if($brg['status']=="ditutup"):?>
                                      <label >Ditutup</label>
                                    <?php endif;?>
                                  </td>
                                  <td>
                                    <?php if($brg['status_penawar']=="menang"):?>
                                      <label >Belum</label>  
                                    <?php endif;?>
                                    <?php if($brg['status_penawar']=="lunas"):?>
                                      <label >Lunas</label>  
                                    <?php endif;?>
                                  </td>
                                 </tr>
                                <?php $no++;endforeach;?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->

  <script type="text/javascript"> 
  window.print();
   
   </script>