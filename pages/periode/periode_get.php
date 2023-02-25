<?php 
session_start();
?>
<div class="card-body table-responsive p-0">
<table class="table table-head-fixed">
  <thead>
    <tr>
      <th>No.</th>
      <th>Green House</th>
      <th>Periode ID</th>
      <th>Tanaman</th>
      <th>Masa Tanam</th>
      <th>Mulai Tanam</th>
      <th>Selesai Tanam</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
	<?php  
    	require('../../connTFH/koneksi.php');
    	$sql = "SELECT * FROM LIST_TANAM ORDER BY mulai_tanam DESC";

    	$result = pg_query($sql);
	    if (!$result) {
	        echo '<p class="alert alert-danger">SQL Error : '.$sql.'</p>';
	        exit;
	    }else{
	    	$no = 1;
		    while ($row = pg_fetch_assoc($result)){
		    	echo '
		    	<tr>
			        <td>'.$no++.'</td>
			        <td>'.$row["id_gh"].'</td>
			        <td>'.$row["periode_id"].'</td>
			        <td>'.$row["id_tanaman"].'</td>
			        <td>'.$row["masa_tanam"].'</td>
			        <td>'.$row["mulai_tanam"].'</td>
			        <td>'.$row["selesai_tanam"].'</td>
			        <td>';
			    if(is_null($row["selesai_tanam"]) || $row["selesai_tanam"] == '') {
			    	echo '
			        	<button type="button" class="per_end btn btn-primary btn-sm" data-id="'.$row["id_gh"].'">
		                  <i class="fas fa-calendar"></i>
		                </button>
			        	<button type="button" class="per_upd btn btn-warning btn-sm" data-id="'.$row["id_gh"].'">
		                  <i class="fas fa-edit"></i>
		                </button>
		                <button type="button" class="per_del btn btn-danger btn-sm" id="del_'.$row["id_gh"].'" data-id="'.$row["id_gh"].'">
		                  <i class="fas fa-trash"></i>
		                </button>';
		        }

		        echo '
			        </td>
				</tr>';
		    }
		}
    ?>
  </tbody>
</table>
</div>