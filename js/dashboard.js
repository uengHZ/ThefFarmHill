$(function() {
	showGraphStart();

	$('#dpA').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true
	});

	$('#dpZ').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true
	});

	$("#cmb_periode").attr('disabled', true);
});

$(document).on('click', '.btnSearch', function(){
	var gh = $('#cmb_gh').val();
	var dateA = $('#dateA').val();
	var dateZ = $('#dateZ').val();

	dteSplit1 = dateA.split("-");
	newDate1 = dteSplit1[0]+dteSplit1[1]+dteSplit1[2];

	dteSplit2 = dateZ.split("-");
	newDate2 = dteSplit2[0]+dteSplit2[1]+dteSplit2[2];

	$.ajax({
        url: "dash_get.php",
        type: "GET",
        data: { 
        	'cek_periode': 1,
        	'gh': gh,
			'dateA': newDate1,
			'dateZ': newDate2
        },
        success: function(data){
			$("#cmb_periode").attr('disabled', false);
			$('#cmb_periode').html(data);
		}
	})
});

$('#cmb_periode').change(function(){
    $.ajax({
        url: "dash_get.php",
        type: "GET",
        data: { 
        	'cekall': 1,
        	'id_periode': $("#cmb_periode").val() 
        },
        success: function(data){
        	var dt = JSON.parse(data);
			$('.infoGh').text('GRENHOUSE: '+dt.nama_gh);
			$('.infoPeriode').text('PERIODE ID: '+dt.periode_id);
			$('.infoMulai').text('MULAI TANAM: '+dt.mulai_tanam);
			$('.infoSelesai').text('SELESAI TANAM: '+dt.selesai_tanam);
			$('.infoJenis').text('JENIS TANAMAN: '+dt.nama_tanaman);
			showGraph();
        }
    });
});

function showGraph() {
  	new Chart(document.getElementById("line-chart"), {
	  type: 'line',
	  data: {
	    labels  : ['01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023',
	      		   '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023'
	      		  ],
	    datasets: [{ 
	        data: [28, 48, 40, 19, 86, 27, 90, 80, 77, 87],
	        label: "Temperatur",
	        borderColor: "blue",
	        fill: false
	      }, { 
	        data: [65, 59, 80, 81, 56, 55, 40, 55, 66,59],
	        label: "Humidity",
	        borderColor: "red",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Grafik Temperature & Humidity Ruang'
	    }
	  }
	});

	new Chart(document.getElementById("line-chart-irg"), {
	  type: 'line',
	  data: {
	    labels  : ['01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023',
	      		   '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023'
	      		  ],
	    datasets: [{ 
	        data: [28, 48, 40, 19, 86, 27, 90, 80, 77, 87],
	        label: "Temperature",
	        borderColor: "blue",
	        fill: false
	      }, { 
	        data: [67, 56, 87, 83, 59, 58, 44, 53, 67,52],
	        label: "EC",
	        borderColor: "black",
	        fill: false
	      },
	      { 
	        data: [58, 68, 48, 49, 81, 47, 80, 84, 73, 80],
	        label: "PH",
	        borderColor: "orange",
	        fill: false
	      }, 
	      { 
	        data: [65, 59, 80, 81, 56, 55, 40, 55, 66,59],
	        label: "Humidity",
	        borderColor: "red",
	        fill: false
	      },
	      { 
	        data: [68, 79, 60, 51, 59, 85, 70, 95, 76,79],
	        label: "Volume",
	        borderColor: "brown",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Data Irigasi'
	    }
	  }
	});

	new Chart(document.getElementById("line-chart-obs"), {
	  type: 'line',
	  data: {
	    labels  : ['01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023',
	      		   '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023'
	      		  ],
	    datasets: [{ 
	        data: [28, 48, 40, 19, 86, 27, 90, 80, 77, 87],
	        label: "Jumlah Daun",
	        borderColor: "blue",
	        fill: false
	      }, { 
	        data: [67, 56, 87, 83, 59, 58, 44, 53, 67,52],
	        label: "Daimeter",
	        borderColor: "black",
	        fill: false
	      },
	      { 
	        data: [58, 68, 48, 49, 81, 47, 80, 84, 73, 80],
	        label: "Lebar Daun",
	        borderColor: "orange",
	        fill: false
	      }, { 
	        data: [65, 59, 80, 81, 56, 55, 40, 55, 66,59],
	        label: "Tinggi",
	        borderColor: "red",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Grafik Observasi'
	    }
	  }
	});

	new Chart(document.getElementById("line-chart-pop"), {
	  type: 'line',
	  data: {
	    labels  : ['01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023',
	      		   '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023'
	      		  ],
	    datasets: [{ 
	        data: [65, 59, 80, 81, 56, 55, 40, 55, 66,59],
	        label: "Populasi",
	        borderColor: "blue",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Grafik Populasi'
	    }
	  }
	});

	new Chart(document.getElementById("line-chart-bbt"), {
	  type: 'line',
	  data: {
	    labels  : ['01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023',
	      		   '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023', '01-Jan-2023'
	      		  ],
	    datasets: [{ 
	        data: [28, 48, 40, 19, 86, 27, 90, 80, 77, 87],
	        label: "Bobot",
	        borderColor: "blue",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Grafik Bobot'
	    }
	  }
	});
}

function showGraphStart() {
  	new Chart(document.getElementById("line-chart"), {
	  type: 'line',
	  data: {
	    datasets: [{ 
	        label: "Temperatur",
	        borderColor: "blue",
	        fill: false
	      }, { 
	        label: "Humidity",
	        borderColor: "red",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Grafik Temperature & Humidity Ruang'
	    }
	  }
	});

	new Chart(document.getElementById("line-chart-irg"), {
	  type: 'line',
	  data: {
	    datasets: [{ 
	        label: "Temperature",
	        borderColor: "blue",
	        fill: false
	      }, { 
	        label: "EC",
	        borderColor: "black",
	        fill: false
	      },
	      { 
	        label: "PH",
	        borderColor: "orange",
	        fill: false
	      }, 
	      { 
	        label: "Humidity",
	        borderColor: "red",
	        fill: false
	      },
	      { 
	        label: "Volume",
	        borderColor: "brown",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Data Irigasi'
	    }
	  }
	});

	new Chart(document.getElementById("line-chart-obs"), {
	  type: 'line',
	  data: {
	    datasets: [{ 
	        label: "Jumlah Daun",
	        borderColor: "blue",
	        fill: false
	      }, { 
	        label: "Daimeter",
	        borderColor: "black",
	        fill: false
	      },
	      { 
	        label: "Lebar Daun",
	        borderColor: "orange",
	        fill: false
	      }, { 
	        label: "Tinggi",
	        borderColor: "red",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Grafik Observasi'
	    }
	  }
	});

	new Chart(document.getElementById("line-chart-pop"), {
	  type: 'line',
	  data: {
	    datasets: [{ 
	        label: "Populasi",
	        borderColor: "blue",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Grafik Populasi'
	    }
	  }
	});

	new Chart(document.getElementById("line-chart-bbt"), {
	  type: 'line',
	  data: {
	    datasets: [{ 
	        label: "Bobot",
	        borderColor: "blue",
	        fill: false
	      }
	    ]
	  },
	  options: {
	    title: {
	      display: true,
	      text: 'Grafik Bobot'
	    }
	  }
	});
}