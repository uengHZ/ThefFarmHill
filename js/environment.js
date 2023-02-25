$(function() {
	showGraphStart();
});

$('#cmb_gh').change(function(){
    $.ajax({
        url: "env_get.php",
        type: "GET",
        data: { 
        	'cek_gh': 1,
        	'id_gh': $("#cmb_gh").val() 
        },
        success: function(data){
        	var dt_gh = JSON.parse(data);
			$('#periode_id').val(dt_gh.periode_id);
			$('#id_hst').val(dt_gh.day_tanam);

			showGraph();
        }
    });
});

function showGraph(){
	$.ajax({
    	url: "env_get.php",
    	type: "GET",
    	data: { 
    		'showChart': 1,
    		'id_gh': $("#cmb_gh").val(),
    		'period': $("#periode_id").val()
    	},
    	success: function(res){
	    	var dateIn = [];
	        var t  = [];
	        var h  = [];

	        for (var i in res) {
	            dateIn.push(res[i].inputdate);
	            t.push(res[i].temp);
	            h.push(res[i].humidity);
	        }

	    	new Chart(document.getElementById("line-chart"), {
			  type: 'line',
			  data: {
			    labels  : dateIn,
			    datasets: [
			    	{ 
				        data: t,
				        label: "Temperatur",
				        borderColor: "blue",
				        fill: false
			      	}, 
			      	{ 
				        data: h,
				        label: "Humidity",
				        borderColor: "red",
				        fill: false
			      	}
			    ]
			  },
			  options: {
			    title: {
			      display: true,
			      text: 'Data Temperatur & Humidity'
			    }
			  }
			});
    	}
	}); 
}

function showGraphStart(){
	new Chart(document.getElementById("line-chart"), {
	  type: 'line',
	  data: {
	    datasets: [
	    	{ 		        
	    		label: "Temperatur",
		        borderColor: "blue",
		        fill: false
	      	}, 
	      	{   
	      		label: "Humidity",
		        borderColor: "red",
		        fill: false
	      	}
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Data Temperatur & Humidity'
	    }
	  }
	});
}

$(document).on('click', '.env_save_add', function(){
	var cmb_gh = $('#cmb_gh').val();
	var periode_id = $('#periode_id').val();
	var id_hst = $('#id_hst').val();
	var id_temp = $('#id_temp').val();
	var id_humidity = $('#id_humidity').val();
	var cmb_cuaca = $('#cmb_cuaca').val();

	$.ajax({
	  	url: 'env_config.php',
	  	type: 'POST',
	  	data: {
	    	'env_save_add': 1,
	    	'env_cmb_gh': cmb_gh,
	    	'env_periode_id': periode_id,
	    	'env_id_hst': id_hst,
	    	'env_id_temp': id_temp,
	    	'env_id_humidity': id_humidity,
	    	'env_cmb_cuaca': cmb_cuaca,

	  	},
	  	success: function(response){
	    	// $('#dev_name').val('');
	    	// $('#dev_dep').val('');

	    	if (response == 1) {    
	    		$('.alert_env').fadeIn(500);
		    	$('.alert_env').html('<p class="alert alert-success">A new data has been added successfully</p>');
	        	$('#formId').trigger("reset");
	        	setTimeout(function () {
		        	$('.alert_env').fadeOut(500);
		    	}, 2000);
	    	}else {
    			$('.alert_env').fadeIn(500);
	    		$('.alert_env').html(response);

	    		// setTimeout(function () {
		     //    	$('.alert_peg').fadeOut(500);
		    	// }, 2000);
	    	}
	  	}
	});
});



