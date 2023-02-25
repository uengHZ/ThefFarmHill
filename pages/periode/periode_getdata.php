<?php
session_start();
error_reporting(0);
require('../../connTFH/koneksi.php');

//************************************** CEK *******************************************
if (isset($_GET['cek_gh'])) {
    $sql = "
        SELECT J1-j2 as jum from (
        SELECT COUNT(*) j1
        FROM gh_list
        ) AS count1,
        (
        SELECT COUNT(*) j2
        FROM list_tanam
        where selesai_tanam is null
        ) AS count2
    ";
    $result = pg_query($sql);
    $row = pg_fetch_assoc($result);
    // // $row = pg_num_rows($result);
    if($row['jum'] != '0'){
        $sql2 = "
            SELECT J1-j2 as jum from (
            SELECT COUNT(*) j1
            FROM tanaman_list
            ) AS count1,
            (
            SELECT COUNT(*) j2
            FROM list_tanam
            where selesai_tanam is null
            ) AS count2
        ";
        $result2 = pg_query($sql2);
        $row2 = pg_fetch_assoc($result2);
        if($row2['jum'] != '0'){
            echo 1;    
        }else{
            echo '<p class="alert alert-danger">SQL-TANAM Error : '.$result2.' SQL('.$sql2.')</p>';    
        }
    }else{
        echo '<p class="alert alert-danger">SQL-GH Error : '.$result.' SQL('.$sql.')</p>';
    }
    pg_close();

}elseif ($_GET['dt_upd']) {
    $id = $_GET['per_id'];
    $sql = "select * from LIST_TANAM where id_gh = $id and selesai_tanam is null";
    $result = pg_query($sql);
    $row = pg_fetch_assoc($result);
    echo json_encode($row);
}
?>