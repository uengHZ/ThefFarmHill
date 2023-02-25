$('#cmb_gh').change(function(){
    $.ajax({
        url: "irg_get.php",
        type: "GET",
        data: { 
        	'cek_gh': 1,
        	'id_gh': $("#cmb_gh").val() 
        },
        success: function(data){
        	var dt_gh = JSON.parse(data);
			$('#periode_id').val(dt_gh.periode_id);
			$('#id_hst').val(dt_gh.day_tanam);
		}
	})
});

// id_suhu
// id_ec
// id_ph
// id_vol
// id_fre
// id_hum

$(document).on('click', '.irg_save_add', function(){
	var cmb_gh  	= $('#cmb_gh').val();
	var periode_id  = $('#periode_id').val();
	var id_hst 		= $('#id_hst').val();
	var id_suhu		= $('#id_suhu').val();
	var id_ec		= $('#id_ec').val();
	var id_ph		= $('#id_ph').val();
	var id_vol		= $('#id_vol').val();
	var id_fre		= $('#id_fre').val();
	var id_hum		= $('#id_hum').val();

	$.ajax({
	  	url: 'irg_config.php',
	  	type: 'POST',
	  	data: {
	    	'irg_save_add': 1,
	    	'irg_cmb_gh': cmb_gh,
	    	'irg_periode_id': periode_id,
	    	'irg_id_hst': id_hst,
	    	'irg_id_suhu': id_suhu,
			'irg_id_ec': id_ec,
			'irg_id_ph': id_ph,
			'irg_id_vol': id_vol,
			'irg_id_fre': id_fre,
			'irg_id_hum': id_hum
	  	},
	  	success: function(response){
	  		if (response == 1) {    
	    		$('.alert_irg').fadeIn(500);
		    	$('.alert_irg').html('<p class="alert alert-success">A new data has been added successfully</p>');
	        	$('#formId').trigger("reset");
	        	setTimeout(function () {
		        	$('.alert_irg').fadeOut(500);
		    	}, 2000);
	    	}else {
    			$('.alert_irg').fadeIn(500);
	    		$('.alert_irg').html(response);
	  		}
	  	}
	});
});