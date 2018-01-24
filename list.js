$(document).ready(function(){

	

	$.getDataTable = function (collumnData, admin = true){


		var table;

		$('.search-form').on('input',function(){
			table.draw();
		});
		$('#search-form').on('submit',function(e){
			e.preventDefault();
		});
		$('#search-button').on('click',function(){
			$('#firstname').val('');
			$('#lastname').val('');
			
			$('#birthday').val('');
			
			$('#phone').val('');
			
			$('#vexpiry').val('');
			
			$('#status').val('');

			$('#lastContacted').val('');
			
			$('#consultant').val('');
			table.draw();
		})
		var colDefsArray = [ 
		{
			"targets": 0,
			"data": "urgent",
			"render": function ( data, type, row, meta ) {

				if(data == 1){

					return "<input type='checkbox' class='urgent-switch' data-id ="+row.UserID+"  checked  >";
				}else{

					return "<input type='checkbox' class='urgent-switch' data-id ="+row.UserID+"  >";
				}
			}
		}, 
		{
			"targets": 7,
			"data": "vexpiry",
			"render": function ( data, type, row, meta ) {
				console.log(data);
				if(data){

					return data;
				}else{

					return "<i><font color='grey'>There is still no information </font></i>";
				}
			}
		}, 
		{
			"targets": 9,
			"data": "lastContacted",
			"render": function ( data, type, row, meta ) {
				console.log(data);
				if(data){

					return data;
				}else{

					return "<i><font color='grey'>There is still no any contacts </font></i>";
				}
			}
		},


		];

		if(admin){
			colDefsArray.push(
			{
				"targets": 10,
				"data": "lastContacted",
				"render": function ( data, type, row, meta ) {
					console.log(data);
					if(data){

						return data;
					}else{

						return "<i><font color='grey'>Not assigned</font></i>";
					}
				}
			});
			colDefsArray.push(
			{
				"targets": 11,
				"visible": false
			});
		}
		$.getJSON( collumnData, function( data ) {
			
			table = $('#client-table').DataTable({

				processing: true,
				serverSide: false,
				ajax:{
					url:"list-backend.php",
					type: "post",
					

				},
				dom: 'Bfrtip',
				buttons: [
				'print' ,'excel', 'pdf'
				],
				columns:data,
				columnDefs: colDefsArray,
				createdRow: function(row, data, dataIndex) {
					$(row).attr('data-id',data.UserID)
					if(data.urgent == 1){
						$(row).addClass('danger');
					}
				},
				drawCallback: function( settings ) {
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
			$('#client-table tbody').on('click', 'tr', function () {
				var row = table.row( this ).data();
				// var data = table.row( this ).data('id');
				// alert( 'You clicked on '+data[0]+'\'s row' );
				window.location.href = "editAppt.php?user="+row.UserID;
			});
		}



		);
		$.fn.dataTable.ext.search.push(
			function( settings, data, dataIndex ) {

				

				var firstname = $('#firstname').val();
				var firstnameCol =  data[1];
				var lastname = $('#lastname').val();
				var lastnameCol =  data[2];
				var birthday= $('#birthday').val();
				var birthdayCol =  data[4];
				var phone= $('#phone').val();
				var phoneCol =  data[3];
				var vexpiry= $('#vexpiry').val();
				var vexpiryCol =  data[7];
				var status= $('#status').val();
				var statusCol =  data[6];
				var lastContact= $('#lastContacted').val();
				var lastContactCol =  data[9];

				var consultant= $('#consultant').val();
				var consultantCol =  data[11];
				
				

				

				var d = new Date(lastContactCol);
				var now = new Date();
				var severalMonthsFromNow = new Date(now.setMonth(now.getMonth() + parseInt(lastContact)));
				
				if ( firstnameCol.toLowerCase() != firstname.toLowerCase() && firstname !== "")
				{
					return false;
				}
				if ( lastnameCol.toLowerCase() != lastname.toLowerCase() && lastname !== "")
				{
					return false;
				}
				if ( birthdayCol != birthday && birthday !== "")
				{
					return false;
				}
				if ( phoneCol != phone && phone !== "")
				{
					return false;
				}
				if ( vexpiryCol != vexpiry && vexpiry !== "")
				{
					return false;
				}
				if((d < severalMonthsFromNow || d == "Invalid Date") && lastContact !== ""){
					return false;
				}
				if ( statusCol != status && status !== "")
				{
					return false;
				}
				if ( consultantCol != consultant && consultant !== "")
				{
					return false;
				}
				return true;
			});
		
		
	}




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


