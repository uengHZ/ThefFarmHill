<?php
  if(isset($_SESSION['tfh_user'])){
    include("../../connTFH/koneksi.php");
?>
<!-- Start - Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../dashboard" class="brand-link">
    <img src="../../image/the_farm_hill.png" class="brand-image img-circle elevation-1"
         style="opacity: .5">
    <span class="brand-text font-weight-light">The Farmhill</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2" id="my_nav">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <ul class="nav nav-treeview">
            <li class="nav-item" id="li_dashboard">
              <a href="../dashboard" class="nav-link">
                <i class="fa fa-home nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item" id="li_period">
              <a href="../periode" class="nav-link">
                <i class="fa fa-file nav-icon"></i>
                <p>Input Periode Tanam</p>
              </a>
            </li>
            <li class="nav-item" id="li_environment">
              <a href="../environment" class="nav-link">
                <i class="fa fa-file nav-icon"></i>
                <p>Input Environment</p>
              </a>
            </li>
            <li class="nav-item" id="li_irigasi">
              <a href="../irigasi" class="nav-link">
                <i class="fa fa-file nav-icon"></i>
                <p>Input Irigasi</p>
              </a>
            </li>
            <li class="nav-item" id="li_observasi">
              <a href="../observasi" class="nav-link">
                <i class="fa fa-file nav-icon"></i>
                <p>Input Observasi</p>
              </a>
            </li>
            <li class="nav-item" id="li_populasi">
              <a href="../populasi" class="nav-link">
                <i class="fa fa-file nav-icon"></i>
                <p>Input Populasi buah</p>
              </a>
            </li>
            <li class="nav-item" id="li_bobot">
              <a href="../bobot" class="nav-link">
                <i class="fa fa-file nav-icon"></i>
                <p>Input Bobot Buah</p>
              </a>
            </li>
            <li class="nav-item" id="li_logout">
              <a href="../../logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>Log Out</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- End - Main Sidebar Container -->
<?php
}else{
    header('location:../../index.php');
}
?>