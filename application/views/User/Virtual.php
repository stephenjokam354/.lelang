<div class="main-panel">
        <div class="content-wrapper">
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-3">Virtual Account (VA)</h4>
              <hr>
              <form class="forms-sample" action="#">
                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">VA</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Nama Lengkap" value="<?=$va['va']?>">
                  
                  </div>
                </div>
               
                
                </form>
            </div>
          </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card ">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-3">Saldo</h4>
              <hr>
              <h1>Rp.<?=$this->model->rupiah($va['saldo'])?></h1>
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
