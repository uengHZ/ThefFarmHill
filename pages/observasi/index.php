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

    $q_plbg = "select distinct jenis_polibag from std_observasi
      order by jenis_polibag asc";
    $qryplbg = pg_query($q_plbg);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">Input Observasi</h4>
        </div>
      </div>
      <div class="alert_obs"></div>
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header col-md-12">
              <form id="formId" action="" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">GREENHOUSE:</label>
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
                  </div>
                  <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">PERIODE ID:</label>
                        <input type="text" name="periode_id" id="periode_id" class="form-control" readonly="">
                      </div>  
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">HST:</label>
                        <input type="text" name="id_hst" id="id_hst" class="form-control" readonly="">
                      </div>  
                    </div>
                  </div>  
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">POLIBAG:</label>
                          <select class="form-control" name="cmb_polibag" id="cmb_polibag" required="">
                            <option value="0" selected="selected">--silahkan pilih--</option>
                            <?php
                            while($row=pg_fetch_array($qryplbg)){ ?>
                              <option value="<?php echo $row['jenis_polibag']; ?>"><?php echo $row['jenis_polibag']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">STD. DAUN:</label>
                          <input type="text" name="id_std_daun" id="id_std_daun" class="form-control" value="0" readonly="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">JUMLAH DAUN:</label>
                          <input type="text" name="id_jml_daun" id="id_jml_daun" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">STD. TINGGI:</label>
                          <input type="text" name="id_std_tinggi" id="id_std_tinggi" class="form-control" value="0" readonly="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">TINGGI:</label>
                          <input type="text" name="id_tinggi" id="id_tinggi" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">STD. DIAMETER:</label>
                          <input type="text" name="id_std_diamtr" id="id_std_diamtr" class="form-control" value="0" readonly="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">DIAMETER:</label>
                          <input type="text" name="id_diamtr" id="id_diamtr" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">STD. LEBAR:</label>
                          <input type="text" name="id_std_lbr" id="id_std_lbr" class="form-control" value="0" readonly="">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">LEBAR DAUN:</label>
                          <input type="text" name="id_lbr" id="id_lbr" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">NOTE:</label>
                          <textarea class="form-control" name="id_note" id="id_note" rows="3"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="footer" align="center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="button" class="obs_save_add btn btn-primary">INPUT</button>
              </div>
              </form>
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
<script src="../../js/observasi.js"></script>

<?php
}else{
    header('location:../../index.php');
}
?>