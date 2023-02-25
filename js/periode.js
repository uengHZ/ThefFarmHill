$(document).ready(function(){
  $.ajax({
      url: "periode_get.php",
      type: 'POST',
      data: {
      'dev_up': 1,
    }
    }).done(function(data) {
    $('#data').html(data);
  });
});

$('#cmb_tanaman').change(function() {
	$('#masa_tanam').val($('#cmb_tanaman option:selected').data('id'));
});

$('#dp').datepicker({
	format: 'yyyy-mm-dd',
	autoclose: true
}).on('changeDate', function (ev) {
    $('#date_tanam').change();
});
// $('#date_tanam').val('0000-00-00');
$('#date_tanam').change(function () {
	var strFix = $('#date_tanam').val().replaceAll("-","");
    $('#periode_id').val(strFix);
});

//show form add
$(document).on('click', '.per_add', function(){
	// cek GH
	$.ajax({
      url: 'periode_getdata.php',
      type: 'GET',
      data: {
        'cek_gh': 1
      },
      success: function(response){
      	if (response == 1) {
	        $('#ModalInput').modal('show');
			$('.modal-title').html('INPUT PERIODE TANAM');
			$('#cmb_gh').attr('disabled', false);
			$('#cmb_tanaman').attr('disabled', false);

			// $('#ModalInput').on('show.bs.modal', function () {
			//     $(this).find('form').trigger('reset');
			// })
			$('#id_sts').val('ADD');
	    }else{
	    	bootbox.alert('Green house or tanaman already exists');
	    	$('.alert_peg').fadeIn(500);
		    $('.alert_peg').html('<p class="alert alert-warning">green house or tanaman already exists</p>');

		    setTimeout(function () {
	        	$('.alert_peg').fadeOut(500);
	    	}, 2000);
	    }
      }
    });

	// if OK == open modal
});

// Save Add Periode
$(document).on('click', '.per_save_add', function(){
	var per_st = $('#id_sts').val();
	var per_gh = $('#cmb_gh').val();
	var per_ta = $('#cmb_tanaman').val();
	var per_mt = $('#masa_tanam').val();
	var per_id = $('#periode_id').val();
	var per_dt = $('#date_tanam').val();

	$.ajax({
	  	url: 'periode_config.php',
	  	type: 'POST',
	  	data: {
	    	'per_save_add': 1,
	    	'per_st': per_st,
	    	'per_gh': per_gh,
	    	'per_ta': per_ta,
	    	'per_mt': per_mt,
	    	'per_id': per_id,
	    	'per_dt': per_dt
	  	},
	  	success: function(response){
	    	// $('#dev_name').val('');
	    	// $('#dev_dep').val('');

	    	if (response == 1) {
	    		if(per_st == 'ADD'){	    
		    		$('.alert_peg').fadeIn(500);
			    	$('.alert_peg').html('<p class="alert alert-success">A new data has been added successfully</p>');
		        	$('#ModalInput').modal('hide');
		        	
		        	setTimeout(function () {
			        	$('.alert_peg').fadeOut(500);
			    	}, 2000);
			    }else if(per_st == 'EDIT'){
			    	$('.alert_peg').fadeIn(500);
			    	$('.alert_peg').html('<p class="alert alert-success">Data has been update successfully</p>');
		        	$('#ModalInput').modal('hide');
		        	
		        	setTimeout(function () {
			        	$('.alert_peg').fadeOut(500);
			    	}, 2000);
			    }
	    	}else {
    			$('.alert_peg').fadeIn(500);
	    		$('.alert_peg').html(response);

	    		// setTimeout(function () {
		     //    	$('.alert_peg').fadeOut(500);
		    	// }, 2000);
	    	}

	    	$.ajax({
	      		url: "periode_get.php",
	      		type: 'POST',
	      		data: {
	          		'dev_up': 1,
	      		}
	    	}).done(function(data) {
				$('#data').html(data);
	   		});
	  	}
	});
});

// Input selesai tanam
$(document).on('click', '.per_end', function(){
	var id = $(this).data('id');
	$('#ModalSelesaiTanam').modal('show');
	$('#ModalSelesaiTanam').on('show.bs.modal', function () {
	    $(this).find('form').trigger('reset');
	})

	$('#idSelesaiTanam').val(id);

	$('#dpSelesaiTanam').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true
	})
});

// save selesai tanam 
$(document).on('click', '.per_saveSelesaiTanam', function(){
	var idSelesaiTanam = $('#idSelesaiTanam').val();
	var dateSelesai = $('#dateSelesaiTanam').val();
	var noteSelesai = $('#noteSelesaiTanam').val();

	$.ajax({
	  	url: 'periode_config.php',
	  	type: 'POST',
	  	data: {
	    	'per_saveSelesaiTanam': 1,
	    	'idSelesaiTanam': idSelesaiTanam,
	    	'dateSelesai': dateSelesai,
	    	'noteSelesai': noteSelesai,
	  	},
	  	success: function(response){
	    	if (response == 1) {
	    		$('.alert_peg').fadeIn(500);
		    	$('.alert_peg').html('<p class="alert alert-success">Update selesai tanam successful</p>');
	        	
	        	$('#ModalSelesaiTanam').modal('hide');
	        	// $('#ModalSelesaiTanam').remove();

	        	setTimeout(function () {
		        	$('.alert_peg').fadeOut(500);
		    	}, 2000);

		    	$.ajax({
		      		url: "periode_get.php",
		      		type: 'POST',
		      		data: {
		          		'dev_up': 1,
		      		}
		    	}).done(function(data) {
					$('#data').html(data);
		   		});
	    	}else {
    			$('.alert_peg').fadeIn(500);
	    		$('.alert_peg').html(response);

	    		// setTimeout(function () {
		     //    	$('.alert_peg').fadeOut(500);
		    	// }, 2000);
	    	}
	    }
	});
});


// Update Periode
$(document).on('click', '.per_upd', function(){
	var id = $(this).data('id');
	// bootbox.alert('alert '+id);

	$.ajax({
       url: 'periode_getdata.php',
       type: 'GET',
       data: {
          'dt_upd': 1,
          'per_id': id
       },
       success: function(response){
       		var userData=JSON.parse(response);
       		$('#ModalInput').modal('show');
			$('.modal-title').html('UPDATE PERIODE TANAM');
			$('#cmb_gh').attr('disabled', true);
			$('#cmb_tanaman').attr('disabled', true);

			$('#id_sts').val('EDIT');
			$('#cmb_gh').val(userData.id_gh);
			$('#cmb_tanaman').val(userData.id_tanaman);
			$('#masa_tanam').val(userData.masa_tanam);
			$('#periode_id').val(userData.periode_id);
			$('#date_tanam').val(userData.mulai_tanam);
       }
    });
});

// Del Periode
$(document).on('click', '.per_del', function(){
	var el = this;
	var deleteid = $(this).data('id');

	bootbox.confirm({
	    message: 'Do you really want to delete this Period?',
	    buttons: {
	        confirm: {
	            label: 'Yes',
	            className: 'btn-success'
	        },
	        cancel: {
	            label: 'No',
	            className: 'btn-danger'
	        }
	    },
	    callback: function (result) {
	        // console.log('This was logged in the callback: ' + result);
	        if(result){
			     // AJAX Request
			     $.ajax({
			       url: 'periode_config.php',
			       type: 'POST',
			       data: { 
			          'per_del': 1,
			          'per_idg': deleteid,
			       },
			       success: function(response){
			       	if (response == 1) {
			    		$('.alert_peg').fadeIn(500);
				    	$('.alert_peg').html('<p class="alert alert-success">remove data successful</p>');

			        	setTimeout(function () {
				        	$('.alert_peg').fadeOut(500);
				    	}, 2000);

				    	$.ajax({
				      		url: "periode_get.php",
				      		type: 'POST',
				      		data: {
				          		'dev_up': 1,
				      		}
				    	}).done(function(data) {
							$('#data').html(data);
				   		});
			    	}else {
		    			$('.alert_peg').fadeIn(500);
			    		$('.alert_peg').html(response);
			    	}
			       }
			    });
			}
	    }
	});
});