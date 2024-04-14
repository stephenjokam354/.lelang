<div class="main-panel">
        <div class="content-wrapper">
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
          <div class="col-md-12 stretch-card">
              <div class="card">
                  <div class="card-body">
                      <h1 class="admin-header mb-5 mt-3">History Lelang</h1>
                      <a href="<?=site_url('PrintData')?>" target="_blank" class="btn btn-danger "><i class="mdi mdi-printer"></i> <font size="+1">Print</font></a>
                      <div class="table-responsive">
                          <table class="table table-hover" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>User</th>
                                      <th>Nama Barang</th>
                                      <th>Penawaran Tertinggi</th>
                                      <th>Jaminan</th>
                                      <th>Status Lelang</th>
                                      <th>Pembayaran Penawar</th>
                                      <th>Cek Barang</th>
                                  </tr>
                              </thead>
                              <tbody id="dataBarang">
                              <?php $no=1;foreach($barang as $brg):?>
                                <tr>
                                  <td><?=$no?></td>
                                  <td><?=$this->model->nama($brg['id_user'])?></td>
                                  <td><?=$brg['nama_barang']?></td>
                                  <td>Rp.<?=$this->model->rupiah($brg['harga_akhir'])?></td>
                                  <td><label class="badge badge-success">Rp.<?=$this->model->rupiah($brg['jaminan'])?></label></td>
                                  <td>
                                    <?php if($brg['status']=="dibuka"):?>
                                      <label class="badge badge-success">Dibuka</label>
                                    <?php endif;?>
                                    <?php if($brg['status']=="ditutup"):?>
                                      <label class="badge badge-secondary">Ditutup</label>
                                    <?php endif;?>
                                  </td>
                                  <td>
                                    <?php if($brg['status_penawar']=="menang" && $this->model->days3($brg['tgl_lelang']) <= 3):?>
                                      <label class="badge badge-danger">Belum</label>  
                                    <?php endif;?>
                                    <?php if($brg['status_penawar']=="lunas"):?>
                                      <label class="badge badge-success">Lunas</label>  
                                    <?php endif;?>
                                    <?php if($brg['status_penawar']=="menang" && $this->model->days3($brg['tgl_lelang']) > 3):?>
                                  <label class="badge badge-secondary">Hangus</label>
                                  <?php endif;?>
                                  </td>
                                  <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#cek<?=$no?>">Cek Barang</button></td>
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
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
 <?php $no=1;foreach($barang as $brg):?>
 
<div class="modal fade" id="cek<?=$no?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
      <div class="modal-content">
          <div class="modal-header" style="border-bottom: 0 none;">
              <h5 class="modal-title mt-3" id="exampleModalLabel"><?=$brg['nama_barang']?></h5>
              <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <form id="formBarang"  method="POST" enctype="multipart/form-data">
                  
               
            <div class="form-group">

              <img src="<?=base_url('assets/images/barang/'.$brg['gambar'])?>" alt="" style="max-width: 100%;">  
            </div>
                  
          </div>
          <div class="modal-footer" style="border-top: 0 none;">

            <?php if($this->model->btnresetBarang($brg['id_barang'],$brg['status'])==0):?>
              <a href="<?=site_url('Admin/Master/History/resetLelang/'.$brg['id_barang'])?>" class="btn btn-danger">Reset Barang</a>
            <?php endif;?>
              <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
            
             </div>
          </form>
      </div>
  </div>
</div>
 <?php $no++;endforeach;?>