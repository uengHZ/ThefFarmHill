<?php 
	if(isset($_SESSION['tfh_user'])){
	    include("../../connTFH/koneksi.php");
?>
  <footer class="main-footer">
    <strong>Copyright &copy; <a href="https://purnamasolution.com">purnamasolution.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.proj-3.23
    </div>
  </footer>

</div>
<!-- ./wrapper -->
</body>
</html>
<?php
}else{
    header('location:../../index.php');
}
?>