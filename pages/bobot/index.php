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
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">Input Bobot Buah</h4>
        </div>
      </div>
      <div class="alert_bbt"></div>
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
                          <label for="recipient-name" class="col-form-label">BOBOT BUAH:</label>
                          <input type="text" name="id_bbt" id="id_bbt" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="footer" align="center">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                <button type="button" class="bbt_save_add btn btn-primary">INPUT</button>
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
<script src="../../js/bobot.js"></script>

<?php
}else{
    header('location:../../index.php');
}
?>