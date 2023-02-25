<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
require('../../connTFH/koneksi.php');

$user= $_SESSION['tfh_user'];
$d   = date("Y-m-d H:i:s");
$t   = date("H:i:s");

//************************************** ADD *******************************************
if (isset($_POST['irg_save_add'])) {
    $irg_cmb_gh     = $_POST['irg_cmb_gh'];
    $irg_periode_id = $_POST['irg_periode_id'];
    $irg_id_hst     = $_POST['irg_id_hst'];
    $irg_id_suhu    = $_POST['irg_id_suhu'];
    $irg_id_ec      = $_POST['irg_id_ec'];
    $irg_id_ph      = $_POST['irg_id_ph'];
    $irg_id_vol     = $_POST['irg_id_vol'];
    $irg_id_fre     = $_POST['irg_id_fre'];
    $irg_id_hum     = $_POST['irg_id_hum'];

    $sql = "
        INSERT INTO irigasi_record (id_gh, periode_id, hst, created_at, suhu, ec, ph, volume, frekuensi, humidity_media, userid)
        VALUES ($irg_cmb_gh, '$irg_periode_id', $irg_id_hst, '$d', $irg_id_suhu, $irg_id_ec, $irg_id_ph, $irg_id_vol, $irg_id_fre, $irg_id_hum, '$user');
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