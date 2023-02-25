<?php 
session_start();
require('../../connTFH/koneksi.php');


//************************************** ADD *******************************************
if (isset($_POST['per_save_add'])) {
    $per_st = $_POST['per_st'];
    $per_gh = $_POST['per_gh'];
    $per_ta = $_POST['per_ta'];
    $per_mt = $_POST['per_mt'];
    $per_id = $_POST['per_id'];
    $per_dt = $_POST['per_dt'];

    if($per_st == 'ADD'){
        $sql = "insert into list_tanam (id_gh, periode_id, id_tanaman, masa_tanam, mulai_tanam) 
            values($per_gh,$per_id,$per_ta,$per_mt,'$per_dt')";
        $result = pg_query($sql);
        if (!$result) {
            echo '<p class="alert alert-danger">SQL Error : '.$sql.'</p>';
            exit;
        }else{
            echo 1;
        }    
    }elseif ($per_st == 'EDIT') {
        $sql = "update list_tanam set
                    masa_tanam = $per_mt,
                    mulai_tanam = '$per_dt',
                    periode_id = '$per_id'
                where id_gh = $per_gh
                and selesai_tanam is null";
        $result = pg_query($sql);
        if (!$result) {
            echo '<p class="alert alert-danger">SQL Error : '.$sql.'</p>';
            exit;
        }else{
            echo 1;
        }
    }
    
    pg_close();
}
//************************************** END ADD ***************************************



//************************************** ADD *******************************************
elseif (isset($_POST['per_saveSelesaiTanam'])) {
    $idSelesaiTanam = $_POST['idSelesaiTanam'];
    $dateSelesai = $_POST['dateSelesai'];
    $noteSelesai = $_POST['noteSelesai'];

    $sql = "update list_tanam set
                selesai_tanam = '$dateSelesai',
                note = '$noteSelesai'
            where id_gh = $idSelesaiTanam
            and selesai_tanam is null";
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



//************************************** DEL *******************************************
elseif (isset($_POST['per_del'])) {
    $id = $_POST['per_idg'];

    $sql = "delete from list_tanam where id_gh = '$id' and selesai_tanam is null";
    $result = pg_query($sql);
    
    if (!$result) {
        echo '<p class="alert alert-danger">SQL Error : '.$sql.'</p>';
        exit;
    }else{
        echo 1;
    }
    pg_close();    
}
//************************************** END DEL ***************************************

else{
    header("location: index.php");
    exit();
}

?>