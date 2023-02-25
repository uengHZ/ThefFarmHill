$('#cmb_gh').change(function(){
    $.ajax({
        url: "obs_get.php",
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

$('#cmb_polibag').change(function(){
	$.ajax({
        url: "obs_get.php",
        type: "GET",
        data: { 
        	'cek_plbg': 1,
        	'id_gh': $('#cmb_gh' ).val(),
        	'id_hst': $('#id_hst').val(),
        	'periode_id': $('#periode_id').val(),
        	'cmb_polibag': $('#cmb_polibag').val()
        },
        success: function(data){
        	var dtStd = JSON.parse(data);
        	// console.log(dtStd);
        	$('#id_std_daun').val(dtStd.jumlah_daun);
			$('#id_std_tinggi').val(dtStd.tinggi);
			$('#id_std_diamtr').val(dtStd.diameter);
			$('#id_std_lbr').val(dtStd.lebar_daun);
		}
	})
});

// cmb_polibag
// id_std_daun
// id_jml_daun
// id_std_tinggi
// id_tinggi
// id_std_diamtr
// id_diamrt
// id_std_lbr
// id_lbr
// id_note


$(document).on('click', '.obs_save_add', function(){
	var cmb_gh  		= $('#cmb_gh').val();
	var periode_id  	= $('#periode_id').val();
	var id_hst 			= $('#id_hst').val();
	var cmb_polibag		= $('#cmb_polibag').val();
	var id_std_daun		= $('#id_std_daun').val();
	var id_jml_daun		= $('#id_jml_daun').val();
	var id_std_tinggi	= $('#id_std_tinggi').val();
	var id_tinggi 		= $('#id_tinggi').val();
	var id_std_diamtr 	= $('#id_std_diamtr').val();
	var id_diamtr 		= $('#id_diamtr').val();
	var id_std_lbr 		= $('#id_std_lbr').val();
	var id_lbr 			= $('#id_lbr').val();
	var id_note 		= $('#id_note').val();

	$.ajax({
	  	url: 'obs_config.php',
	  	type: 'POST',
	  	data: {
	    	'obs_save_add': 1,
	    	'obs_cmb_gh': cmb_gh,
	    	'obs_periode_id': periode_id,
	    	'obs_id_hst': id_hst,
	    	'obs_cmb_polibag': cmb_polibag,
			'obs_id_std_daun': id_std_daun,
			'obs_id_jml_daun': id_jml_daun,
			'obs_id_std_tinggi': id_std_tinggi,
			'obs_id_tinggi': id_tinggi,
			'obs_id_std_diamtr': id_std_diamtr,
			'obs_id_diamtr': id_diamtr,
			'obs_id_std_lbr': id_std_lbr,
			'obs_id_lbr': id_lbr,
			'obs_id_note': id_note
	  	},
	  	success: function(response){
	  		if (response == 1) {    
	    		$('.alert_obs').fadeIn(500);
		    	$('.alert_obs').html('<p class="alert alert-success">A new data has been added successfully</p>');
	        	$('#formId').trigger("reset");
	        	setTimeout(function () {
		        	$('.alert_obs').fadeOut(500);
		    	}, 2000);
	    	}else {
    			$('.alert_obs').fadeIn(500);
	    		$('.alert_obs').html(response);
	  		}
	  	}
	});
});