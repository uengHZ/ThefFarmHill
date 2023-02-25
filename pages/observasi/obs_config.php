<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
require('../../connTFH/koneksi.php');

$user= $_SESSION['tfh_user'];
$d   = date("Y-m-d H:i:s");
$t   = date("H:i:s");

//************************************** ADD *******************************************
if (isset($_POST['obs_save_add'])) {
    $obs_cmb_gh         = $_POST['obs_cmb_gh'];
    $obs_periode_id     = $_POST['obs_periode_id'];
    $obs_id_hst         = $_POST['obs_id_hst'];
    $obs_cmb_polibag    = $_POST['obs_cmb_polibag'];
    $obs_id_std_daun    = $_POST['obs_id_std_daun'];
    $obs_id_jml_daun    = $_POST['obs_id_jml_daun'];
    $obs_id_std_tinggi  = $_POST['obs_id_std_tinggi'];
    $obs_id_tinggi      = $_POST['obs_id_tinggi'];
    $obs_id_std_diamtr  = $_POST['obs_id_std_diamtr'];
    $obs_id_diamtr      = $_POST['obs_id_diamtr'];
    $obs_id_std_lbr     = $_POST['obs_id_std_lbr'];
    $obs_id_lbr         = $_POST['obs_id_lbr'];
    $obs_id_note        = $_POST['obs_id_note'];

    $sql = "
        INSERT INTO observasi_record (id_gh, periode_id, hst, created_at, jenis_polibag, std_daun, jumlah_daun, std_tinggi, tinggi, std_diameter, diameter, std_lebar, lebar_daun, note, userid)
        VALUES ($obs_cmb_gh, '$obs_periode_id', $obs_id_hst, '$d', '$obs_cmb_polibag', $obs_id_std_daun, $obs_id_jml_daun, $obs_id_std_tinggi, $obs_id_tinggi, $obs_id_std_diamtr, $obs_id_diamtr, $obs_id_std_lbr, $obs_id_lbr, '$obs_id_note', '$user');
    ";
    $result = pg_query($sql);
    if (!$result) {
        echo '<p class="alert alert-danger">SQL Error : '.$sql.'</p>';
        exit;
    }else{
        echo 1;
    } 
    
    pg_close();
}
//************************************** END ADD ***************************************

else{
    header("location: index.php");
    exit();
}

?>