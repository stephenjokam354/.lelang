<?= $this->session->flashdata('message') ?>
<?php if (isset($_SESSION['message'])) {
  unset($_SESSION['message']);
} ?>
<div class="main-panel">
  <div class="content-wrapper">
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 class="admin-header mb-5 mt-3">History Lelang</h1>
            <div class="table-responsive">
              <table class="table table-hover" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Penawaran</th>
                    <th>Jaminan</th>
                    <th>Status Peserta</th>
                    <th>Jam Lelang</th>
                    <th>Cek Barang</th>
                  </tr>
                </thead>
                <tbody id="dataBarang">
                  <?php $no = 1;
                  foreach ($barang as $brg) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $brg['nama_barang'] ?></td>
                      <td><?= $this->model->rupiah($brg['penawaran_harga']) ?></td>
                      <td><label class="badge badge-success"><?= $this->model->rupiah($brg['jaminan']) ?></label></td>
                      <td>
                        <?php if ($brg['status_penawar'] == "peserta") : ?>
                          <label class="badge badge-warning">Peserta</label>
                        <?php endif; ?>
                        <?php if ($brg['status_penawar'] == "menang" && $this->model->days3($brg['tgl_lelang']) <= 3) : ?>
                          <label class="badge badge-success">Menang</label>
                          <a href="<?= site_url('User/Master/History/bayar/' . $brg['id_barang'] . '/' . $brg['harga_akhir'] . '/' . $brg['jaminan']) ?>" class="btn btn-primary btn-sm">Bayar Lelang</a>
                        <?php endif; ?>
                        <?php if ($brg['status_penawar'] == "menang" && $this->model->days3($brg['tgl_lelang']) > 3) : ?>
                          <label class="badge badge-secondary">Hangus</label>
                        <?php endif; ?>
                        <?php if ($brg['status_penawar'] == "kalah") : ?>
                          <label class="badge badge-danger">Kalah</label>
                        <?php endif; ?>
                        <?php if ($brg['status_penawar'] == "lunas") : ?>
                          <label class="badge badge-success">Menang (Lunas)</label>
                        <?php endif; ?>
                      </td>
                      <td><?= date('d F Y', strtotime($brg['tgl_lelang'])); ?> , <?= date('H:i', strtotime($brg['time_awal'])); ?> - <?= date('H:i', strtotime($brg['time_akhir'])); ?></td>
                      <td><a href="<?= site_url('Detail/Pelelangan/' . $brg['id_barang']) ?>" class="btn btn-info">Cek Barang</a></td>
                    </tr>
                  <?php endforeach; ?>
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