<div class="main-panel">
        <div class="content-wrapper">
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
          <div class="col-md-12 stretch-card">
              <div class="card">
                  <div class="card-body">
                      <h1 class="admin-header mb-5 mt-3">Master User</h1>
                      <div class="table-responsive">
                          <table class="table table-hover" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Username</th>
                                      <th>Nama</th>
                                      <th>Ktp</th>
                                      <th>NPWP</th>
                                      <th>Action</th>
                                      
                                  </tr>
                              </thead>
                              <tbody id="dataBarang">
                              <?php $no=1; foreach($proses as $prs):?>
                                  <tr>
                                    <td><?=$no++?></td>
                                    <td><?= $prs['username']?></td>
                                    <td><?= $prs['nama_lengkap']?></td>
                                    <th><?php if($prs['status_ktp']==2 || $prs['status_ktp']==3){?>

                                    <label class=""><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#cek<?=$no?>">Cek</button></label><?php }?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="cek<?=$no?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
                                    <div class="modal-content">
                                        <div class="modal-header" style="border-bottom: 0 none;">
                                            <h3 class="modal-title mt-3" id="exampleModalLabel">KTP</h3>
                                            <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <form id="formBarang" action="<?=site_url('Admin/Master/Persyaratan/Ktp/insert')?>" method="POST" enctype="multipart/form-data">
                                                
                                            
                                            <div class="form-group">
                                            <input type="text" name="id_user" value="<?=$prs['id_user']?>" hidden>
                                            <img src="<?=base_url('assets/images/ktp/'.$prs['ktp'])?>" alt="" style="max-width: 450px;">  
                                            </div>
                                                
                                        </div>
                                        <div class="modal-footer" style="border-top: 0 none;">
                                            <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                                            
                                            
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                    <!-- End Modal -->
                                    </th>
                                    <th><?php if($prs['status_npwp']==2 || $prs['status_npwp']==3 ){?>
                                    
                                    <label class=""><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#ceknpwp<?=$no?>">Cek</button></label>
                                    <!-- Modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="ceknpwp<?=$no?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
                                    <div class="modal-content">
                                        <div class="modal-header" style="border-bottom: 0 none;">
                                            <h3 class="modal-title mt-3" id="exampleModalLabel">NPWP</h3>
                                            <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <form id="formBarang" action="<?=site_url('Admin/Master/Persyaratan/Npwp/insert')?>"  method="POST" enctype="multipart/form-data">
                                                
                                            
                                            <div class="form-group">
                                            <input type="text" name="id_user" value="<?=$prs['id_user']?>" hidden>
                                            <img src="<?=base_url('assets/images/npwp/'.$prs['npwp'])?>" alt="" style="max-width: 450px;">  
                                            </div>
                                                
                                        </div>
                                        <div class="modal-footer" style="border-top: 0 none;">
                                            <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
                                            
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                    <!-- End Modal -->
                                    <!-- End Modal -->
                                    <?php }?></th>
                                    
                                    <td>
                                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#edit"><i class="mdi mdi-trash-can text-light"></i></button>
                                    </td>
                                  </tr>
                            <?php endforeach;?>
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

<div class="modal fade" id="cek" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
      <div class="modal-content">
          <div class="modal-header" style="border-bottom: 0 none;">
              <h5 class="modal-title mt-3" id="exampleModalLabel">Persyaratan User (Stephen)</h5>
              <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <form id="formBarang"  method="POST" enctype="multipart/form-data">
                  
               
            <div class="form-group">
              <label for="txtNoRekening">KTP</label>
              <img src="images/ktp.jpg" alt="" style="max-width: 470px;">  
            </div>
                  
          </div>
          <div class="modal-footer" style="border-top: 0 none;">
              <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
              
              <button type="submit" class="btn btn-danger" id="simpanBarang">Tidak Valid</button>
              <button type="submit" class="btn btn-success" id="simpanBarang">Valid</button>
          </div>
          </form>
      </div>
  </div>
</div>