<?=$this->session->flashdata('message')?>
<div class="main-panel">
        <div class="content-wrapper">
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-3">Dashboard</h4>
              <hr>
             
                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Nama Lengkap" value="<?=$identitas['nama_lengkap']?>" disabled>
                  
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Username" value="<?=$identitas['username']?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputMobile" class="col-sm-3 col-form-label">Telp</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number" value="<?=$identitas['telp']?>" disabled>
                    
                  </div>
                </div>
                <?php if($identitas['status']=="1"):?>
                <button class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button> <label class="text-danger" style="font-size:12px;">Data profil anda tidak bisa diedit, bila sudah bisa mengikuti lelang</label>
                  <?php endif;?>
              
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-3">Persyaratan 
              <?php if($identitas){
                
                if($identitas['status']==1){?>
              <label class="badge badge-danger">Belum Bisa Ikut</label>
              <?php }else if($identitas['status']==2){?>
                <label class="badge badge-success">Ikut Lelang</label>
              <?php }
              
            }?>
                

              </h4>
              <hr>
              <form class="forms-sample">
                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">KTP</label>
                  <div class="col-sm-9">

                    <?php if($ktp){
                
                if($ktp['status_ktp']==1){?>
              <label class="badge badge-danger">Belum Terverifikasi</label>
              <?php }else if($ktp['status_ktp']==2){?>
                <label class="badge badge-danger">Tidak Valid</label>
              <?php }else if($ktp['status_ktp']==3){?>
                <label class="badge badge-success">Valid</label>
              <?php }
              
            }else{?>
                <label class="badge badge-danger">Belum Upload</label>
              <?php }?>
              
              </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">NPWP</label>
                  <div class="col-sm-9">

                  <?php if($npwp){
               
                if($npwp['status_npwp']==1){?>
              <label class="badge badge-danger">Belum Terverifikasi</label>
              <?php }else if($npwp['status_npwp']==2){?>
                <label class="badge badge-danger">Tidak Valid</label>
              <?php }else if($npwp['status_npwp']==3){?>
                <label class="badge badge-success">Valid</label>
              <?php }
              
            }else{?>
                <label class="badge badge-danger">Belum Upload</label>
              <?php }?>
              
               </div>
                </div>
                
                
                
              </form>
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

  <div class="modal fade" id="edit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0 none;">
                <h5 class="modal-title mt-3" id="exampleModalLabel">Edit Profil</h5>
                <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="formBarang"  method="POST" enctype="multipart/form-data" action="<?=site_url('User/Dashboard/edit')?>">
                    
                    <div class="form-group">
                    <label for="txtNama">Nama Lengkap</label>
                  <input type="text" class="form-control" name="txtNama" id="txtNama" placeholder="Nama Lengkap" autocomplete="off" value="<?=$identitas['nama_lengkap']?>" required>
              </div>
                 
              <div class="form-group">
                <label for="txtUsername">Username</label>
                <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="Username" autocomplete="off" value="<?=$identitas['username']?>" readonly>
            </div>
            <div class="form-group">
                <label for="txtTelp">Telp</label>
                <input type="text" class="form-control" name="txtTelp" id="txtTelp" placeholder="Telp" autocomplete="off" value="<?=$identitas['telp']?>" required>
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
