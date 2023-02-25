<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
require('../../connTFH/koneksi.php');

$user= $_SESSION['tfh_user'];
$d   = date("Y-m-d H:i:s");
$t   = date("H:i:s");

//************************************** ADD *******************************************
if (isset($_POST['pop_save_add'])) {
    $pop_cmb_gh     = $_POST['pop_cmb_gh'];
    $pop_periode_id = $_POST['pop_periode_id'];
    $pop_id_hst     = $_POST['pop_id_hst'];
    $pop_id_pop     = $_POST['pop_id_pop'];

    $sql = "
        INSERT INTO populasi_record (id_gh, periode_id, hst, created_at,  populasi, userid)
        VALUES ($pop_cmb_gh, '$pop_periode_id', $pop_id_hst, '$d', $pop_id_pop, '$user');
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