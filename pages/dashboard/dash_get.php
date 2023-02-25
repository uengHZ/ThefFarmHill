<?php
session_start();
error_reporting(0);
require('../../connTFH/koneksi.php');

//************************************** CEK *******************************************
if ($_GET['cek_periode']) {
    $id = $_GET['gh'];
    $dateA = $_GET['dateA'];
    $dateZ = $_GET['dateZ'];

    $newDate1 = date("Y-m-d", strtotime($dateA));
    $newDate2 = date("Y-m-d", strtotime($dateZ));

    $sql = "select periode_id from list_tanam
        where mulai_tanam between '$newDate1' and '$newDate2'
        and selesai_tanam is null
        and id_gh = $id ";
    $result = pg_query($sql); ?> 
    <option value="0" selected="selected">--silahkan pilih--</option> <?php
    while ($row = pg_fetch_assoc($result)) { ?>
        <option value="<?php echo $row['periode_id'] ?>"><?php echo $row['periode_id'] ?></option><?php
    }
}elseif ($_GET['cekall']) {
    $id = $_GET['id_periode'];

    $sql = "select c.nama_gh, a.periode_id, a.mulai_tanam, a.selesai_tanam, b.nama_tanaman 
        from list_tanam a
        inner join tanaman_list b on a.id_tanaman = b.id_tanaman
        inner join gh_list c on a.id_gh = c.id_gh
        where a.periode_id = '$id' ";
    $result = pg_query($sql);
    $row = pg_fetch_assoc($result);
    echo json_encode($row);
}
?>