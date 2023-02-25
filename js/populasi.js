$('#cmb_gh').change(function(){
    $.ajax({
        url: "pop_get.php",
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

// cmb_gh
// periode_id
// id_hst
// id_pop
// pop_save_add

$(document).on('click', '.pop_save_add', function(){
	var cmb_gh  	= $('#cmb_gh').val();
	var periode_id  = $('#periode_id').val();
	var id_hst 		= $('#id_hst').val();
	var id_pop		= $('#id_pop').val();

	$.ajax({
	  	url: 'pop_config.php',
	  	type: 'POST',
	  	data: {
	    	'pop_save_add': 1,
	    	'pop_cmb_gh': cmb_gh,
	    	'pop_periode_id': periode_id,
	    	'pop_id_hst': id_hst,
	    	'pop_id_pop': id_pop
	  	},
	  	success: function(response){
	  		if (response == 1) {    
	    		$('.alert_pop').fadeIn(500);
		    	$('.alert_pop').html('<p class="alert alert-success">A new data has been added successfully</p>');
	        	$('#formId').trigger("reset");
	        	setTimeout(function () {
		        	$('.alert_pop').fadeOut(500);
		    	}, 2000);
	    	}else {
    			$('.alert_pop').fadeIn(500);
	    		$('.alert_pop').html(response);
	  		}
	  	}
	});
});