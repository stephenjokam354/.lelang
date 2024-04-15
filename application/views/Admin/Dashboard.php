<div class="main-panel">
        <div class="content-wrapper">
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body dashboard-tabs p-0">
                      <h3 class="mt-4 ml-4 mb-4">Dashboard</h3>
                      <ul class="nav nav-tabs px-4" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Produk</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="Petugas-tab" data-toggle="tab" href="#Petugas" role="tab" aria-controls="Petugas" aria-selected="false">Petugas</a>
                        </li>
                      </ul>
                      <div class="tab-content py-0 px-0">
                          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                              <div class="d-flex flex-wrap justify-content-xl-between">
                                  
                                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                      <i class="mdi mdi-format-list-bulleted mr-3 icon-lg text-primary"></i>
                                      <div class="d-flex flex-column justify-content-around">
                                          <small class="mb-1 text-muted">Barang</small>
                                          <h5 class="mr-2 mb-0"><?=$barang?></h5>
                                      </div>
                                  </div>
                                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-cart mr-3 icon-lg text-primary"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Barang Lelang</small>
                                        <h5 class="mr-2 mb-0"><?=$barangLelang?></h5>
                                    </div>
                                </div>
                              </div>
                          </div>
                        
                        <div class="tab-pane fade" id="Petugas" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                
                              <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-account mr-3 icon-lg text-primary"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Petugas</small>
                                    <h5 class="mr-2 mb-0"><?=$petugas?></h5>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-account mr-3 icon-lg text-primary"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">User</small>
                                    <h5 class="mr-2 mb-0"><?=$user?></h5>
                                </div>
                            </div>

                            </div>
                        </div>
                          
                      </div>
                  </div>
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