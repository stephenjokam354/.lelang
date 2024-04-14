<?=$this->session->flashdata('message');?>
<div class="main-panel">
        <div class="content-wrapper">
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
            <h4 class="mb-3">NPWP</h4>
              <?php if($barang){
                foreach($barang as $brg):
                if($brg['status_npwp']==1){?>
              <label class="badge badge-danger">Belum Terverifikasi</label>
              <?php }else if($brg['status_npwp']==2){?>
                <label class="badge badge-danger">Tidak Valid</label>
              <?php }else if($brg['status_npwp']==3){?>
                <label class="badge badge-success">Valid</label>
              <?php }
              endforeach;
            }else{?>
                <label class="badge badge-danger">Belum Upload</label>
              <?php }?>
              <hr>
                <?php if($barang){
                  foreach($barang as $brg):
                  ?>
                 <img src="<?=base_url('assets/images/npwp/'.$brg['npwp'])?>" style="max-width: 400px;">
                <?php endforeach;}else{?>
                  <img src="<?=base_url('assets/images/default.jpg')?>" style="max-width: 400px;">
                <?php }?>
                <br><br>
                <button type="submit" class="btn btn-primary mr-2" data-toggle="modal" data-target="#edit">Edit</button>
                <button class="btn btn-light">Cancel</button>
              
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
              <h5 class="modal-title mt-3" id="exampleModalLabel">Data Diri</h5>
              <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <form id="formBarang" action="<?=site_url('User/Master/Persyaratan/Npwp/insert')?>"  method="POST" enctype="multipart/form-data">
                  
                <div class="form-group">
                  <label for="txtNoKtp">Upload NPWP</label>
                  <input type="file" class="form-control" name="txtGambar">
              </div>
              <div class="form-group">
                <label for="txtNoKtp">Password Akun</label>
                <input type="password" class="form-control" id="pw1" name="txtPassword" placeholder="Password" required>
                <label id="demo" class="text-danger"></label>
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

<script type="text/javascript">
            window.onload = function () {
                document.getElementById("pw1").onchange = validatePassword;
            }
            function validatePassword(){
                var pass1=document.getElementById("pw1").value;
                if(pass1!="<?=$this->session->userdata('password')?>"){
                document.getElementById("pw1").value = "";
                document.getElementById("demo").innerHTML = "Password Salah";
                }else
                document.getElementById("demo").innerHTML = "";
            
            }
            </script>