<<<<<<< HEAD
<?=$this->session->flashdata('message')?>
<div class="main-panel">
        <div class="content-wrapper">
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
          <div class="col-md-12 stretch-card">
              <div class="card">
                  <div class="card-body">
                      <h1 class="admin-header mb-5 mt-3">History Barang</h1>
                      <div class="table-responsive">
                          <table class="table table-hover" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama Barang</th>
                                      <th>Harga Awal</th>
                                      <th>Jaminan</th>
                                      <th>Gambar</th>
                                      <th>Tanggal Mulai</th>
                                      <th>Waktu awal-Akhir</th>
                                      <th>Petugas</th>
                                      <th>Status Lelang</th>
                                      
                                  </tr>
                              </thead>
                              <tbody id="dataBarang">
                              <?php $no=1;foreach($barang as $brg):?>
                                  <tr>
                                    <td><?=$no?></td>
                                    <td><?=$brg['nama_barang']?></td>
                                    <td><?=$this->model->rupiah($brg['harga_awal'])?></td>
                                    <td><label><?=$this->model->rupiah($brg['jaminan'])?></label></td>
                                    <th><img src="<?=base_url('assets/images/barang/'.$brg['gambar'])?>" style="max-width:100px;"></th>
                                    <td><?=date('d F Y',strtotime($brg['tgl_lelang'])) ?></td>
                                    <td><?=date('H:i',strtotime($brg['time_awal'])) ?> - <?=date('H:i',strtotime($brg['time_akhir'])) ?></td>
                                    <td><?=$brg['nama_petugas']?></td>
                                    <td>
                                      <?php if($brg['status']=="dibuka"){?>
                                      <label class="badge badge-success">Dibuka</label>  
                                      <?php }else{?>
                                        <label class="badge badge-secondary">Ditutup</label>
                                      <?php }?>
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
=======
<div class="main-panel">
  <div class="content-wrapper">
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 class="admin-header mb-5 mt-3">History Barang</h1>
            <div class="table-responsive">
              <table class="table table-hover" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga Awal</th>
                    <th>Jaminan</th>
                    <th>Gambar</th>
                    <th>Tanggal Mulai</th>
                    <th>Waktu awal-Akhir</th>
                    <th>Petugas</th>
                    <th>Status Lelang</th>

                  </tr>
                </thead>
                <tbody id="dataBarang">
                  <?php $no = 1;
                  foreach ($barang as $brg) : ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $brg['nama_barang'] ?></td>
                      <td><?= $this->model->rupiah($brg['harga_awal']) ?></td>
                      <td><label><?= $this->model->rupiah($brg['jaminan']) ?></label></td>
                      <th><img src="<?= base_url('assets/images/barang/' . $brg['gambar']) ?>" style="max-width:100px;"></th>
                      <td><?= date('d F Y', strtotime($brg['tgl_lelang'])) ?></td>
                      <td><?= date('H:i', strtotime($brg['time_awal'])) ?> - <?= date('H:i', strtotime($brg['time_akhir'])) ?></td>
                      <td><?= $brg['nama_petugas'] ?></td>
                      <td>
                        <?php if ($brg['status'] == "dibuka") { ?>
                          <label class="badge badge-success">Dibuka</label>
                        <?php } else { ?>
                          <label class="badge badge-secondary">Ditutup</label>
                        <?php } ?>
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
>>>>>>> f6a82e1 (percobaan)
