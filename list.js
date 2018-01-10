$(document).ready(function(){


	$("#gen-report").click(function(){
		console.log('ok');
		var divToPrint=document.getElementById("clients-list");

		var newWin=window.open('','Print-Window');

		newWin.document.open();

		newWin.document.write('<html><head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />'
			+''
			+'</head><body onload="window.print()"><h1>REPORT</h1>'+divToPrint.outerHTML+'</body></html>');

		newWin.document.close();

		// setTimeout(function(){newWin.close();},10);
	});

	$('.urgent-switch').bootstrapSwitch();

	$('.urgent-switch').on('switchChange.bootstrapSwitch', function(event, state) {

		
		var id = $(this).data('id');

		var value = 0;
		if(state){
			$(this).closest('.listrow').addClass('danger');
			value = 1;

		}else{
			$(this).closest('.listrow').removeClass('danger');
			value = 0;
		}
		$.post("list-urgent.php", 
		{
			id:id,
			value: value,

		}, 
		function(data, status){
			
		});




	});

});


