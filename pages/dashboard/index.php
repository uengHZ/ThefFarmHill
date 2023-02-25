<?php 
  session_start();
  if(isset($_SESSION['tfh_user'])){
    include("../../connTFH/koneksi.php");
    include ('../layout/header.php');
    include ('../layout/sidebar.php');

    // cek gh
    $q_gh = "SELECT id_gh, nama_gh FROM gh_list 
      where id_gh in (select id_gh from list_tanam where selesai_tanam is null)
      order by id_gh asc";
    $qryg  = pg_query($q_gh);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="alert_das"></div>
      
      <!-- View Info -->
      <div class="row">
        <div class="col-6 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header col-md-12">
              <h3 class="card-title">Pilih Green House dan Periode ID</h3>
                <div class="card-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form" style="height: 450px;"><hr>
                    <div class="form-group">
                      <label for="cmb_gh">GREEN HOUSE:</label>
                      <select class="form-control" name="cmb_gh" id="cmb_gh" required="">
                        <option value="0" selected="selected">--silahkan pilih--</option>
                        <?php
                        while($row=pg_fetch_array($qryg)){ ?>
                          <option value="<?php echo $row['id_gh']; ?>"><?php echo $row['nama_gh']; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>START PERIODE:</label>
                      <div class="input-group date" name="dpA" id="dpA">
                          <input type="text" name="dateA" id="dateA" class="form-control" required="" /><span class="add-on"><i class="icon-th"></i></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>END PERIODE:</label>
                      <div class="input-group date" name="dpZ" id="dpZ">
                          <input type="text" name="dateZ" id="dateZ" class="form-control" required="" /><span class="add-on"><i class="icon-th"></i></span>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                      <button type="button" class="btnSearch btn btn-primary">SEARCH PERIODE ID</button>
                    </div>
                    <hr>
                 </form>
                    <div class="form-group">
                      <label for="cmb_gh">PERIODE ID:</label>
                      <select class="form-control" name="cmb_periode" id="cmb_periode" required="">
                        <option value="0" selected="selected">--silahkan pilih--</option>
                      </select>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header col-md-12">
              <h3 class="card-title">Informasi Green House</h3>
              <div class="card-body">
                <div class="form" style="height: 450px;"><hr>
                  <div class="form-group">
                    <label class="infoGh form-control"></label>
                  </div>
                  <div class="form-group">
                    <label class="infoPeriode form-control"></label>
                  </div>
                  <div class="form-group">
                    <label class="infoMulai form-control"></label>
                  </div>
                  <div class="form-group">
                    <label class="infoSelesai form-control"></label>
                  </div>
                  <div class="form-group">
                    <label class="infoJenis form-control"></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Grafik TEMPERATUR&HUMADITY  -->
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header col-md-12">
              <div class="card-body">
                <div class="chart">
                  <canvas id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- gRAFIK IRIGASI -->
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header col-md-12">
              <div class="card-body">
                <div class="chart">
                  <canvas id="line-chart-irg" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- gRAFIK OBSERVASI -->
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header col-md-12">
              <div class="card-body">
                <div class="chart">
                  <canvas id="line-chart-obs" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- gRAFIK POPULASI -->
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header col-md-12">
              <div class="card-body">
                <div class="chart">
                  <canvas id="line-chart-pop" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- gRAFIK BOBOT -->
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header col-md-12">
              <div class="card-body">
                <div class="chart">
                  <canvas id="line-chart-bbt" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

</div>  
<?php 
  include ('../layout/footer.php'); 
  include ('../layout/script.php');
?>
<script src="../../plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="../../js/dashboard.js"></script>

<?php
}else{
  header('location:../../index.php');
}
?>