<?php 
  session_start();
  error_reporting(0);

  if(isset($_SESSION['tfh_user'])){
    include("../../connTFH/koneksi.php");
    include ('../layout/header.php');
    include ('../layout/sidebar.php'); 

    // cek gh
    $q_gh = "SELECT id_gh, nama_gh FROM gh_list 
      --where id_gh not in (select id_gh from list_tanam where selesai_tanam is null)
      order by id_gh asc";
    $qryg  = pg_query($q_gh);

    // cek tanaman
    $q_tn = "SELECT id_tanaman, nama_tanaman, masa FROM TANAMAN_LIST 
      --where id_tanaman not in (select id_tanaman from list_tanam where selesai_tanam is null)
      order by id_tanaman asc";
    $qryt  = pg_query($q_tn);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">Input Periode Tanam</h4>
        </div>
      </div>
      
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header col-md-12">
              <div class="col-md-6 mt-2" style="display:inline-block">
                <button type="button" class="per_add btn btn-default">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <div class="card-tools col-md-4 mt-2">
                <form action="#" method="GET">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-12">
                        <input class="form-control form-control-sm" type="text" name="search" placeholder="search...">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="alert_peg"></div>
              <div id="data"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Input -->
      <div class="modal hide fade" id="ModalInput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group" hidden="true">
                <label for="recipient-name" class="col-form-label">STATUS</label>
                <input type="text" name="id_sts" id="id_sts" class="form-control" readonly="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">GREEN HOUSE:</label>
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
                <label for="message-text" class="col-form-label">TANAMAN:</label>
                <select class="form-control" name="cmb_tanaman" id="cmb_tanaman" required="">
                  <option value="0" selected="selected">--silahkan pilih--</option>
                  <?php
                  while($row1=pg_fetch_array($qryt)){ ?>
                    <option value="<?php echo $row1['id_tanaman']; ?>" data-id="<?php echo $row1['masa']; ?>"><?php echo $row1['nama_tanaman']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">MASA TANAM:</label>
                <input type="text" name="masa_tanam" id="masa_tanam" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">PERIODE ID:</label>
                <input type="text" name="periode_id" id="periode_id" class="form-control" readonly="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">MULAI TANAM:</label>
                <div class="input-group date" name="dp" id="dp">
                    <input type="text" name="date_tanam" id="date_tanam" class="form-control" required="" /><span class="add-on"><i class="icon-th"></i></span>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
              <button type="button" class="per_save_add btn btn-primary">INPUT</button>
              <!-- <input class="btn btn-primary" type="submit" value="INPUT" name='submit'/> -->
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End Modal Input-->


       <!-- Modal Input -->
      <div class="modal hide fade" id="ModalSelesaiTanam" tabindex="-1" role="dialog" aria-labelledby="ModalLabelSelesaiTanam" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabelSelesaiTanam">INPUT SELESAI TANAM</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">ID</label>
                <input type="text" name="idSelesaiTanam" id="idSelesaiTanam" class="form-control" readonly="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">SELESAI TANAM:</label>
                <div class="input-group date" name="dpSelesaiTanam" id="dpSelesaiTanam">
                    <input type="text" name="dateSelesaiTanam" id="dateSelesaiTanam" class="form-control" required="" /><span class="add-on"><i class="icon-th"></i></span>
                </div>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">KETERANGAN:</label>
                <!-- <input type="text" name="note_tanam" id="note_tanam" class="form-control" required=""> -->
                <textarea class="form-control" name="noteSelesaiTanam" id="noteSelesaiTanam" rows="3"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
              <button type="button" class="per_saveSelesaiTanam btn btn-primary">SELESAI</button>
              <!-- <input class="btn btn-primary" type="submit" value="INPUT" name='submit'/> -->
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End Modal selesai tanam-->

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
</div>

<?php 
  include ('../layout/footer.php'); 
  include ('../layout/script.php');
?>

<script src="../../plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="../../js/periode.js"></script>

<?php
}else{
  header('location:../../index.php');
}
?>