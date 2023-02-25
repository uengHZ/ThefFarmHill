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
}elseif ($_GET['showChart']) {
	header('Content-Type: application/json');
    $id = $_GET['id_gh'];
    $period = $_GET['period'];

    $dt = array();

    $sql = "select created_at, created_at::TIMESTAMP::DATE inputDate, temp, humidity 
		from temp_record 
		where id_gh=1
		and periode_id='20230213'
		order by created_at";
	$result = pg_query($sql);
    while ($row = pg_fetch_assoc($result)) {
    	$dt[] = $row;
    };
    echo json_encode($dt);
}
?>