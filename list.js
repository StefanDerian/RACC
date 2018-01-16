$(document).ready(function(){

	


	$('#client-table').DataTable({

		"processing": true,
		"serverSide": true,
		"ajax":{
			url:"list-backend.php",
			dataSrc: ''
		},

		"columns": [
		{ "data": "urgent" },
		{ "data": "FirstName" },
		{ "data": "LastName" },
		{ "data": "Mobile" },
		{ "data": "DateofBirth" },
		{ "data": "Email" },
		{ "data": "CurrentStatus" },
		{ "data": "lastContacted" },
		{ "data": "course" },
		{ "data": "lastContacted" },
		{ "data": "consultant" }
		],
		"columnDefs": [ {
			"targets": 0,
			"data": "urgent",
			"render": function ( data, type, row, meta ) {
				console.log(row);
				if(data == 1){

					return "<input type='checkbox' class='urgent-switch' data-id ="+row.UserID+"  checked  >";
				}else{

					return "<input type='checkbox' class='urgent-switch' data-id ="+row.UserID+"  >";
				}
			}
		} ],
		"createdRow": function(row, data, dataIndex) {
			$(row).attr('data-id',data.UserID)
			if(data.urgent == 1){
				$(row).addClass('danger');
			}
		},
		"drawCallback": function( settings ) {
			$('.urgent-switch').bootstrapSwitch();

			$('.urgent-switch').on('switchChange.bootstrapSwitch', function(event, state) {


				var id = $(this).data('id');

				var value = 0;
				if(state){
					$(this).closest('tr').addClass('danger');
					value = 1;

				}else{
					$(this).closest('tr').removeClass('danger');
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
		}

	});


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

	

});


