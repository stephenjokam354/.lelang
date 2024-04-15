<<<<<<< HEAD
<?=$this->session->flashdata('message')?>
<div class="main-panel">
        <div class="content-wrapper">
=======
<?= $this->session->flashdata('message') ?>
<?php if (isset($_SESSION['message'])) {
    unset($_SESSION['message']);
} ?>
<div class="main-panel">
    <div class="content-wrapper">
>>>>>>> f6a82e1 (percobaan)
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="admin-header mb-5 mt-3">Barang</h1>
                        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah" style="font-size: 16px;"><i class="mdi mdi-plus"></i> Tambah Barang</button>
                        <div class="table-responsive">
                            <table class="table table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Awal</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Tgl</th>
                                        <th>Action</th>
<<<<<<< HEAD
                                        
                                    </tr>
                                </thead>
                                <tbody id="dataBarang">
                                <?php $no=1;foreach($barang as $brg): $disable="";?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$brg['nama_barang']?></td>
                                        <td><?=$this->model->rupiah($brg['harga_awal'])?></td>
                                        <td><?=substr($brg['deskripsi'],0,20) ?></td>
                                        <th><img src="<?=base_url('assets/images/barang/'.$brg['gambar'])?>" style="max-width:100px;"></th>
                                        <td><?=date('d F Y',strtotime($brg['tgl']))?></td>
                                        <td>
                                        <?php if($brg['status']=="dibuka"||$brg['status']=="ditutup"){$disable="disabled";}?>
                                        <?php if($this->session->userdata('level')==2):?>
                                        <button class="btn btn-facebook btn-sm" data-toggle="modal" data-target="#editLelang<?=$no?>" <?=$disable?>><i class="mdi mdi-calendar-text" ></i></button>
                                        <?php endif;?>
                                        <button class="btn btn-warning btn-sm text-light" data-toggle="modal" data-target="#edit<?=$no?>" <?=$disable?>><i class="mdi mdi-pencil"></i></button>
                                        <button class="btn btn-danger btn-sm text-light" data-toggle="modal" data-target="#delete<?=$no?>" <?=$disable?>><i class="mdi mdi-trash-can" ></i></button>
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
=======

                                    </tr>
                                </thead>
                                <tbody id="dataBarang">
                                    <?php $no = 1;
                                    foreach ($barang as $brg) : $disable = ""; ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $brg['nama_barang'] ?></td>
                                            <td><?= $this->model->rupiah($brg['harga_awal']) ?></td>
                                            <td><?= substr($brg['deskripsi'], 0, 20) ?></td>
                                            <th><img src="<?= base_url('assets/images/barang/' . $brg['gambar']) ?>" style="max-width:100px;"></th>
                                            <td><?= date('d F Y', strtotime($brg['tgl'])) ?></td>
                                            <td>
                                                <?php if ($brg['status'] == "dibuka" || $brg['status'] == "ditutup") {
                                                    $disable = "disabled";
                                                } ?>
                                                <?php if ($this->session->userdata('level') == 2) : ?>
                                                    <button class="btn btn-facebook btn-sm" data-toggle="modal" data-target="#editLelang<?= $no ?>" <?= $disable ?>><i class="mdi mdi-calendar-text"></i></button>
                                                <?php endif; ?>
                                                <button class="btn btn-warning btn-sm text-light" data-toggle="modal" data-target="#edit<?= $no ?>" <?= $disable ?>><i class="mdi mdi-pencil"></i></button>
                                                <button class="btn btn-danger btn-sm text-light" data-toggle="modal" data-target="#delete<?= $no ?>" <?= $disable ?>><i class="mdi mdi-trash-can"></i></button>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
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
>>>>>>> f6a82e1 (percobaan)
    <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0 none;">
                <h5 class="modal-title mt-3" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
<<<<<<< HEAD
                <form id="formBarang"  method="POST" enctype="multipart/form-data" action="<?=site_url('Admin/Master/Barang/insert')?>">
                    
                    <div class="form-group">
                    <label for="txtNamaBarang">Nama Barang</label>
                  <input type="text" class="form-control" name="txtNamaBarang" id="txtNamaBarang" placeholder="Nama Barang" autocomplete="off" required>
              </div>
                 
              <div class="form-group">
                <label for="txtHarga">Harga Awal</label>
                <input type="number" class="form-control" name="txtHarga" id="txtHarga" placeholder="Harga" autocomplete="off" min="1" required>
            </div>
                 
            
          <div class="form-group">
            <label for="txtDeskrisi">Deskripsi</label>
            <textarea type="text" class="form-control" name="txtDeskripsi" id="txtDeskrisi" placeholder="Deskripsi" autocomplete="off" required></textarea>
        </div>
        <div class="form-group">
          <label for="txtDeskrisi">Gambar</label>
          <input type="file" class="form-control" name="txtGambar" id="txtDeskrisi" placeholder="File" autocomplete="off" >
          
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

<?php $no=1;foreach($barang as $brg):?>
    <!-- Modal Edit -->
<div class="modal fade" id="edit<?=$no?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0 none;">
                <h5 class="modal-title mt-3" id="exampleModalLabel">Edit Barang</h5>
                <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="formBarang"  method="POST" enctype="multipart/form-data" action="<?=site_url('Admin/Master/Barang/update')?>">
                
                    
                  <input type="text" class="form-control" name="txtId" id="txtNamaBarang" value="<?=$brg['id_barang']?>" hidden>
            
                    <div class="form-group">
                    <label for="txtNamaBarang">Nama Barang</label>
                  <input type="text" class="form-control" name="txtNamaBarang" id="txtNamaBarang" placeholder="Nama Barang" autocomplete="off" value="<?=$brg['nama_barang']?>" required>
              </div>
                 
              <div class="form-group">
                <label for="txtHarga">Harga Awal</label>
                <input type="number" class="form-control" name="txtHarga" id="txtHarga" placeholder="Harga" autocomplete="off" min="1" value="<?=$brg['harga_awal']?>" required>
            </div>
            
          <div class="form-group">
            <label for="txtDeskrisi">Deskripsi</label>
            <textarea type="text" class="form-control" name="txtDeskripsi" id="txtDeskrisi" placeholder="Deskripsi" autocomplete="off" required><?=$brg['deskripsi']?></textarea>
        </div>
        
        <div class="form-group">
          <label for="txtDeskrisi">Gambar</label>
          <input type="file" class="form-control" name="txtGambar" id="txtDeskrisi" placeholder="File" autocomplete="off" >
  
      </div>
                  
          </div>
          <div class="modal-footer" style="border-top: 0 none;">
              <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
              
              
              <button type="submit" class="btn btn-warning text-light" id="simpanBarang">Edit</button>
          </div>
          </form>
      </div>
  </div>
</div>
<!-- END Modal Edit -->

<!-- Modal Hapus -->
<div class="modal fade" id="delete<?=$no?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0 none;">
                <h5 class="modal-title mt-3" id="exampleModalLabel">Delete Barang</h5>
                <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="formBarang"  method="POST" enctype="multipart/form-data" action="<?=site_url('Admin/Master/Barang/delete')?>">
                
                    
                  <input type="text" class="form-control" name="txtId" id="txtNamaBarang" value="<?=$brg['id_barang']?>" hidden>
                  <input type="text" class="form-control" name="txtImage" id="txtNamaBarang" value="<?=$brg['gambar']?>" hidden>
                    <div class="form-group">
                    <label for="txtNamaBarang">Nama Barang</label>
                  <input type="text" class="form-control" name="txtNamaBarang" id="txtNamaBarang" placeholder="Nama Barang" autocomplete="off" value="<?=$brg['nama_barang']?>" disabled>
              </div>
                  
          </div>
          <div class="modal-footer" style="border-top: 0 none;">
              <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
              
              
              <button type="submit" class="btn btn-danger text-light" id="simpanBarang">Delete</button>
          </div>
          </form>
      </div>
  </div>
</div>
<!-- End Modal Hapus -->

<!-- Modal Lelang -->
<div class="modal fade" id="editLelang<?=$no?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
      <div class="modal-content">
          <div class="modal-header" style="border-bottom: 0 none;">
              <h5 class="modal-title mt-3" id="exampleModalLabel">Lelang</h5>
              <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body p-4">
              <form id="formBarang"  method="POST" enctype="multipart/form-data" action="<?=site_url('Admin/Master/BarangLelang/insert')?>">
              <input type="text" class="form-control" name="txtId" id="txtNamaBarang" value="<?=$brg['id_barang']?>" hidden>
               
                <div class="form-group">
                  <label for="txtNamaBarang">Nama Barang</label>
                  <input type="text" class="form-control" name="txtNamaBarang" id="txtNamaBarang" placeholder="Nama Barang" autocomplete="off" value="<?=$brg['nama_barang']?>" disabled>
              </div>
                 
              <div class="form-group">
                <label for="txtHarga">Tanggal Lelang</label>
                <input type="date" class="form-control" name="tgl" id="txtHarga" placeholder="Harga" autocomplete="off" value="<?=$brg['tgl_lelang']?>" required>
            </div>
                 
            <div class="form-group">
              <label for="txtTimeAwal">Time Awal</label>
              <input type="time" class="form-control" name="txtTimeAwal" id="txtTimeAwal"  autocomplete="off" value="<?=$brg['time_awal']?>" required >
          </div>
          <div class="form-group">
            <label for="txtTimeAkhir">Time Akhir</label>
            <input type="time" class="form-control" name="txtTimeAkhir" id="txtTimeAkhir"  autocomplete="off" value="<?=$brg['time_akhir']?>" required>
        </div>
        <div class="form-group">
              <label for="txtJaminan">Jaminan</label>
              <input type="number" class="form-control" name="txtJaminan" id="txtJaminan" placeholder="Jaminan" autocomplete="off" min="1" value="<?=$brg['jaminan']?>" required>
          </div>
          <div class="form-group">
            <label for="tglJaminan">Tanggal Jaminan</label>
            <input type="date" class="form-control" name="tglJaminan" id="tglJaminan" placeholder="Tanggal" autocomplete="off" value="<?=$brg['tgl_jaminan']?>" required>
        </div>
          </div>
          <div class="modal-footer" style="border-top: 0 none;">
              <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>
              
              
              <button type="submit" class="btn btn-facebook" id="simpanBarang">Lelang</button>
          </div>
          </form>
      </div>
  </div>
</div>
<!-- END Modal Lelang -->
<?php $no++;endforeach;?>
=======
                <form id="formBarang" method="POST" enctype="multipart/form-data" action="<?= site_url('Admin/Master/Barang/insert') ?>">

                    <div class="form-group">
                        <label for="txtNamaBarang">Nama Barang</label>
                        <input type="text" class="form-control" name="txtNamaBarang" id="txtNamaBarang" placeholder="Nama Barang" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="txtHarga">Harga Awal</label>
                        <input type="number" class="form-control" name="txtHarga" id="txtHarga" placeholder="Harga" autocomplete="off" min="1" required>
                    </div>


                    <div class="form-group">
                        <label for="txtDeskrisi">Deskripsi</label>
                        <textarea type="text" class="form-control" name="txtDeskripsi" id="txtDeskrisi" placeholder="Deskripsi" autocomplete="off" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txtDeskrisi">Gambar</label>
                        <input type="file" class="form-control" name="txtGambar" id="txtDeskrisi" placeholder="File" autocomplete="off">

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

<?php $no = 1;
foreach ($barang as $brg) : ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="edit<?= $no ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h5 class="modal-title mt-3" id="exampleModalLabel">Edit Barang</h5>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form id="formBarang" method="POST" enctype="multipart/form-data" action="<?= site_url('Admin/Master/Barang/update') ?>">


                        <input type="text" class="form-control" name="txtId" id="txtNamaBarang" value="<?= $brg['id_barang'] ?>" hidden>

                        <div class="form-group">
                            <label for="txtNamaBarang">Nama Barang</label>
                            <input type="text" class="form-control" name="txtNamaBarang" id="txtNamaBarang" placeholder="Nama Barang" autocomplete="off" value="<?= $brg['nama_barang'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="txtHarga">Harga Awal</label>
                            <input type="number" class="form-control" name="txtHarga" id="txtHarga" placeholder="Harga" autocomplete="off" min="1" value="<?= $brg['harga_awal'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="txtDeskrisi">Deskripsi</label>
                            <textarea type="text" class="form-control" name="txtDeskripsi" id="txtDeskrisi" placeholder="Deskripsi" autocomplete="off" required><?= $brg['deskripsi'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="txtDeskrisi">Gambar</label>
                            <input type="file" class="form-control" name="txtGambar" id="txtDeskrisi" placeholder="File" autocomplete="off">

                        </div>

                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>


                    <button type="submit" class="btn btn-warning text-light" id="simpanBarang">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Modal Edit -->

    <!-- Modal Hapus -->
    <div class="modal fade" id="delete<?= $no ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h5 class="modal-title mt-3" id="exampleModalLabel">Delete Barang</h5>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form id="formBarang" method="POST" enctype="multipart/form-data" action="<?= site_url('Admin/Master/Barang/delete') ?>">


                        <input type="text" class="form-control" name="txtId" id="txtNamaBarang" value="<?= $brg['id_barang'] ?>" hidden>
                        <input type="text" class="form-control" name="txtImage" id="txtNamaBarang" value="<?= $brg['gambar'] ?>" hidden>
                        <div class="form-group">
                            <label for="txtNamaBarang">Nama Barang</label>
                            <input type="text" class="form-control" name="txtNamaBarang" id="txtNamaBarang" placeholder="Nama Barang" autocomplete="off" value="<?= $brg['nama_barang'] ?>" disabled>
                        </div>

                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>


                    <button type="submit" class="btn btn-danger text-light" id="simpanBarang">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus -->

    <!-- Modal Lelang -->
    <div class="modal fade" id="editLelang<?= $no ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h5 class="modal-title mt-3" id="exampleModalLabel">Lelang</h5>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form id="formBarang" method="POST" enctype="multipart/form-data" action="<?= site_url('Admin/Master/BarangLelang/insert') ?>">
                        <input type="text" class="form-control" name="txtId" id="txtNamaBarang" value="<?= $brg['id_barang'] ?>" hidden>

                        <div class="form-group">
                            <label for="txtNamaBarang">Nama Barang</label>
                            <input type="text" class="form-control" name="txtNamaBarang" id="txtNamaBarang" placeholder="Nama Barang" autocomplete="off" value="<?= $brg['nama_barang'] ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="txtHarga">Tanggal Lelang</label>
                            <input type="date" class="form-control" name="tgl" id="txtHarga" placeholder="Harga" autocomplete="off" value="<?= $brg['tgl_lelang'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="txtTimeAwal">Time Awal</label>
                            <input type="time" class="form-control" name="txtTimeAwal" id="txtTimeAwal" autocomplete="off" value="<?= $brg['time_awal'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtTimeAkhir">Time Akhir</label>
                            <input type="time" class="form-control" name="txtTimeAkhir" id="txtTimeAkhir" autocomplete="off" value="<?= $brg['time_akhir'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txtJaminan">Jaminan</label>
                            <input type="number" class="form-control" name="txtJaminan" id="txtJaminan" placeholder="Jaminan" autocomplete="off" min="1" value="<?= $brg['jaminan'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tglJaminan">Tanggal Jaminan</label>
                            <input type="date" class="form-control" name="tglJaminan" id="tglJaminan" placeholder="Tanggal" autocomplete="off" value="<?= $brg['tgl_jaminan'] ?>" required>
                        </div>
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Batal</button>


                    <button type="submit" class="btn btn-facebook" id="simpanBarang">Lelang</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Modal Lelang -->
<?php $no++;
endforeach; ?>
>>>>>>> f6a82e1 (percobaan)
