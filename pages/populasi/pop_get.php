<?php
session_start();
error_reporting(0);
require('../../connTFH/koneksi.php');

//************************************** CEK *******************************************
if ($_GET['cek_gh']) {
    $id = $_GET['id_gh'];
    $sql = "select id_gh, periode_id, mulai_tanam, extract(day from age(mulai_tanam)) day_tanam
			from LIST_TANAM 
			where id_gh = $id 
			and selesai_tanam is null";
    $result = pg_query($sql);
    $row = pg_fetch_assoc($result);
    echo json_encode($row);
}
?>