<?=$this->session->flashdata('message')?>
<div class="main-panel">
        <div class="content-wrapper">
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
          <div class="col-md-12 stretch-card">
              <div class="card">
                  <div class="card-body">
                      <h1 class="admin-header mb-5 mt-3">Petugas</h1>
                      <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah" style="font-size: 16px;"><i class="mdi mdi-plus"></i> Tambah Petugas</button>
                      <div class="table-responsive">
                          <table class="table table-hover" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama Petugas</th>
                                      <th>Username</th> 
                                      <th>Password</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody id="dataBarang">
                                    <?php
                                    $no=1;
                                    foreach($petugas as $ptg):
                                    ?>
                                    <tr>
                                    <td><?=$no?></td>
                                    <td><?=$ptg['nama_petugas']?></td>
                                    <td><?=$ptg['username']?></td>
                                    <td><label><?=$ptg['password']?></label></td>
                                    <td><button class="btn btn-warning btn-sm text-light" data-toggle="modal" data-target="#edit<?=$no?>"><i class="mdi mdi-pencil"></i></button>
                                      <button class="btn btn-danger btn-sm text-light" data-toggle="modal" data-target="#delete<?=$no?>"><i class="mdi mdi-trash-can" ></i></button>
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
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <div class="modal fade" id="tambah" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
      <div class="modal-content">
          <div class="modal-header" style="border-bottom: 0 none;">
              <h5 class="modal-title mt-3" id="exampleModalLabel">Tambah Petugas</h5>
              <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <form id="formBarang" action="<?=site_url('Admin/Master/Petugas/insert')?>" method="POST" enctype="multipart/form-data">
                  
                <div class="form-group">
                  <label for="txtNamaBarang">Nama Petugas</label>
                  <input type="text" class="form-control" name="txtNama" id="txtNamaBarang" placeholder="Petugas" autocomplete="off" required>
              </div>
                 
              <div class="form-group">
                <label for="txtHarga">Username</label>
                <input type="text" class="form-control" name="txtUsername"  placeholder="Username" autocomplete="off" required>
            </div>
                 
            <div class="form-group">
              <label for="txtJaminan">Password</label>
              <input type="text" class="form-control" name="txtPassword"  placeholder="Password" autocomplete="off" required>
          </div>
                  
          </div>
          <div class="modal-footer" style="border-top: 0 none;">
              <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
              
              
              <button type="submit" class="btn btn-primary" id="simpanBarang">Simpan</button>
          </div>
          </form>
      </div>
  </div>
</div>
<?php 
$no=1;
foreach($petugas as $ptg):?>
<!-- Modal Edit -->
 <div class="modal fade" id="edit<?=$no?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
      <div class="modal-content">
          <div class="modal-header" style="border-bottom: 0 none;">
              <h5 class="modal-title mt-3" id="exampleModalLabel">Edit Petugas</h5>
              <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <form id="formBarang" action="<?=site_url('Admin/Master/Petugas/update')?>" method="POST" enctype="multipart/form-data">
                  
                <div class="form-group">
                  <label for="txtNamaBarang">Nama Petugas</label>
                  <input type="text" class="form-control" name="txtNama" id="txtNamaBarang" placeholder="Petugas" autocomplete="off" value="<?=$ptg['nama_petugas']?>" required>
              </div>
                 
              <div class="form-group">
                <label for="txtHarga">Username</label>
                <input type="text" class="form-control" name="txtUsername"  placeholder="Username" autocomplete="off" value="<?=$ptg['username']?>" required>
            </div>
                 
            <div class="form-group">
              <label for="txtJaminan">Password</label>
              <input type="text" class="form-control" name="txtPassword"  placeholder="Password" autocomplete="off" value="<?=$ptg['password']?>" required>
          </div>

          <div class="form-group">
                
                <input type="text" class="form-control" name="txtId"  placeholder="Username" autocomplete="off" value="<?=$ptg['id_petugas']?>" hidden>
            </div>
                  
          </div>
          <div class="modal-footer" style="border-top: 0 none;">
              <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
              
              
              <button type="submit" class="btn btn-primary" id="simpanBarang">Simpan</button>
          </div>
          </form>
      </div>
  </div>
</div>
<!-- END MODAL EDIT -->

<!-- Modal Tambah -->
<div class="modal fade" id="delete<?=$no?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
      <div class="modal-content">
          <div class="modal-header" style="border-bottom: 0 none;">
              <h5 class="modal-title mt-3" id="exampleModalLabel">Hapus Data Ini</h5>
              <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <form id="formBarang" action="<?=site_url('Admin/Master/Petugas/delete')?>" method="POST" enctype="multipart/form-data">
                  
                <div class="form-group">
                  <label for="txtNamaBarang">Nama Petugas</label>
                  <input type="text" class="form-control" name="txtNama" id="txtNamaBarang" placeholder="Petugas" autocomplete="off" value="<?=$ptg['nama_petugas']?>" disabled>
              </div>
                 
              <div class="form-group">
                
                <input type="text" class="form-control" name="txtId"  placeholder="Username" autocomplete="off" value="<?=$ptg['id_petugas']?>" hidden>
            </div>
                 
            
                  
          </div>
          <div class="modal-footer" style="border-top: 0 none;">
              <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
              
              
              <button type="submit" class="btn btn-danger" id="simpanBarang">Delete</button>
          </div>
          </form>
      </div>
  </div>
</div>
<?php $no++;endforeach;?>