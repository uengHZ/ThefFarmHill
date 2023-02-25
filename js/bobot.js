$('#cmb_gh').change(function(){
    $.ajax({
        url: "bbt_get.php",
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

$(document).on('click', '.bbt_save_add', function(){
	var cmb_gh  	= $('#cmb_gh').val();
	var periode_id  = $('#periode_id').val();
	var id_hst 		= $('#id_hst').val();
	var id_bbt		= $('#id_bbt').val();

	$.ajax({
	  	url: 'bbt_config.php',
	  	type: 'POST',
	  	data: {
	    	'bbt_save_add': 1,
	    	'bbt_cmb_gh': cmb_gh,
	    	'bbt_periode_id': periode_id,
	    	'bbt_id_hst': id_hst,
	    	'bbt_id_bbt': id_bbt
	  	},
	  	success: function(response){
	  		if (response == 1) {    
	    		$('.alert_bbt').fadeIn(500);
		    	$('.alert_bbt').html('<p class="alert alert-success">A new data has been added successfully</p>');
	        	$('#formId').trigger("reset");
	        	setTimeout(function () {
		        	$('.alert_bbt').fadeOut(500);
		    	}, 2000);
	    	}else {
    			$('.alert_bbt').fadeIn(500);
	    		$('.alert_bbt').html(response);
	  		}
	  	}
	});
});