<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
require('../../connTFH/koneksi.php');

$user= $_SESSION['tfh_user'];
$d   = date("Y-m-d H:i:s");
$t   = date("H:i:s");

//************************************** ADD *******************************************
if (isset($_POST['env_save_add'])) {
    $env_cmb_gh = $_POST['env_cmb_gh'];
    $env_periode_id = $_POST['env_periode_id'];
    $env_id_hst = $_POST['env_id_hst'];
    $env_id_temp = $_POST['env_id_temp'];
    $env_id_humidity = $_POST['env_id_humidity'];
    $env_cmb_cuaca = $_POST['env_cmb_cuaca'];

    $sql = "
        INSERT INTO temp_record (id_gh, periode_id, hst, temp, humidity, cuaca, userid, created_at)
        VALUES ($env_cmb_gh, '$env_periode_id', $env_id_hst, $env_id_temp, $env_id_humidity, '$env_cmb_cuaca', '$user', '$d');
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