<div class="main-panel">
        <div class="content-wrapper">
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
          <div class="col-md-12 stretch-card">
              <div class="card">
                  <div class="card-body">
                      <h1 class="admin-header mb-5 mt-3">Rekening Bank</h1>
                      <div class="table-responsive">
                          <table class="table table-hover" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Bank</th>
                                      <th>Nomor Rekening</th>
                                      <th>Atas Nama</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody id="dataBarang">
                                  <tr>
                                    <td>1</td>
                                    <td><label class="">Bank Negara Indonesia (BNI)</label></td>
                                    <td><label >48129489123045</label></td>
                                    <td><label >setya adji</label></td>
                                    <td>
                                      <label class="badge badge-success">Verifikasi</label>
                                    </td>
                                    <td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit"><i class="mdi mdi-pencil text-light"></i></button></td>
                                  </tr>
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

  <div class="modal fade" id="edit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
      <div class="modal-content">
          <div class="modal-header" style="border-bottom: 0 none;">
              <h5 class="modal-title mt-3" id="exampleModalLabel">Rekening Bank</h5>
              <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <form id="formBarang"  method="POST" enctype="multipart/form-data">
                  
                <div class="form-group">
                  <label for="txtNoKtp">Bank</label>
                  <input type="text" class="form-control" name="txtBank" id="txtNoKtp" placeholder="Bank" autocomplete="off">
              </div>
                 
              <div class="form-group">
                <label for="txtNPWP">Nomor Rekening</label>
                <input type="text" class="form-control" name="txtRekening" id="txtNomor Rekening" placeholder="Nomor Rekening" autocomplete="off">
            </div>
                 
            <div class="form-group">
              <label for="txtNoRekening">Atas Nama</label>
              <input type="text" class="form-control" name="txtNama" id="txtNoRekening" placeholder="Atas Nama" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="txtNoRekening">Password Akun</label>
            <input type="text" class="form-control" name="txtNoRekening" id="pw1" placeholder="Password Akun" autocomplete="off" required>
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
