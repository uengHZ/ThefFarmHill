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
}elseif ($_GET['cek_plbg']) {
	$id_gh = $_GET['id_gh'];
	$id_hst= $_GET['id_hst'];
	$periode_id = $_GET['periode_id'];
	$cmb_polibag = $_GET['cmb_polibag'];

	$hstVal = 0;

	if ($id_hst > 0 AND $id_hst <= 5) {
		$hstVal = 5;
	} elseif ($id_hst > 5 AND $id_hst <= 10) {
		$hstVal = 10;
	} elseif ($id_hst > 10 AND $id_hst <= 15) {
		$hstVal = 15;
	} elseif ($id_hst > 15 AND $id_hst <= 20) {
		$hstVal = 20;
	} else {
		$hstVal = 0;
	}
	
	$sql = "select * from std_observasi
		where id_tanaman = (select id_tanaman from list_tanam
						   	where id_gh = $id_gh and periode_id = '$periode_id'
						   )
		and hst = $hstVal
		and jenis_polibag = '$cmb_polibag'";
	// echo $sql;
	$result = pg_query($sql);
	$row = pg_fetch_assoc($result);
    echo json_encode($row);
}
?>