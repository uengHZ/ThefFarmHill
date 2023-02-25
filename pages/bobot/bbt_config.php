<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
require('../../connTFH/koneksi.php');

$user= $_SESSION['tfh_user'];
$d   = date("Y-m-d H:i:s");
$t   = date("H:i:s");

//************************************** ADD *******************************************
if (isset($_POST['bbt_save_add'])) {
    $bbt_cmb_gh     = $_POST['bbt_cmb_gh'];
    $bbt_periode_id = $_POST['bbt_periode_id'];
    $bbt_id_hst     = $_POST['bbt_id_hst'];
    $bbt_id_bbt     = $_POST['bbt_id_bbt'];

    $sql = "
        INSERT INTO bobot_record (id_gh, periode_id, hst, created_at,  bobot, userid)
        VALUES ($bbt_cmb_gh, '$bbt_periode_id', $bbt_id_hst, '$d', $bbt_id_bbt, '$user');
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