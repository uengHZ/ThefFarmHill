<?php 
	if(isset($_SESSION['tfh_user'])){
	    include("../../connTFH/koneksi.php");
?>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="../../plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script> -->

<!-- Summernote -->
<!-- <script src="../../plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script> -->
<script src="../../plugins/bootbox/bootbox.all.min.js"></script>

<?php
}else{
    header('location:../../index.php');
}
?>