$(document).ready(function(){

	

	



	$.getDataTable = function (collumnData, admin = true){

		const urgentIndex = 0;
		const firstNameIndex = 1;
		const lastNameIndex = 2;
		const mobileIndex = 3;
		const dobIndex = 4;
		const emailIndex = 5;
		const currentStatusIndex = 6;
		const vexpiryIndex = 7;
		const courseIndex = 8;
		const lastContactIndex = 9;
		const nationalityIndex = 10;
		const graduationIndex = 11;
		const visaIndex = 12;
		const servicesIndex = 13;
		const consultantIndex = 14;
		const consultantIdIndex = 15;
		var dueDateIndex;

		if(admin){
			dueDateIndex = 16;
		}else{
			dueDateIndex = 14;
		}


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
			
			$('#vexpiry-upper-range').val('');

			$('#vexpiry-bottom-range').val('');
			
			$('#status').val('');

			$('#consultant').val('');

			$('#last-contact-upper-range').val('');

			$('#last-contact-bottom-range').val('');

			$('#graduation-upper-range').val('');

			$('#graduation-bottom-range').val('');

			$('#course').val('');

			$('#nationality').val('');
			
			$('#services').val('');

			$('#svisa-type').val('');
			table.draw();
		})
		var colDefsArray = [ 
		{
			"targets": urgentIndex,
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
			"targets": vexpiryIndex,
			"data": "vexpiry",
			"render": function ( data, type, row, meta ) {
				if(data){
					return data;
				}else{

					return "<i><font color='grey'>There is still no information </font></i>";
				}
			}
		}, 
		{
			"targets": lastContactIndex,
			"data": "lastContacted",
			"render": function ( data, type, row, meta ) {
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
				"targets": lastContactIndex,
				"data": "lastContacted",
				"render": function ( data, type, row, meta ) {
					
					if(data){

						return data;
					}else{

						return "<i><font color='grey'>Not assigned</font></i>";
					}
				}
			});
			colDefsArray.push(
			{
				"targets": consultantIdIndex,
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
				dom: 'Brtip',
				
				buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
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
				var firstnameCol =  data[firstNameIndex];

				var lastname = $('#lastname').val();
				var lastnameCol =  data[lastNameIndex];

				var birthday= $('#birthday').val();
				var birthdayCol =  data[dobIndex];

				var nationality= $('#nationality').val();
				var nationalityCol =  data[nationalityIndex];

				var visaType= $('#visa-type').val();
				var visaTypeCol =  data[visaIndex];

				var services= $('#services').val();
				var servicesCol =  data[servicesIndex];

				var course= $('#course').val();
				var courseCol =  data[courseIndex];

				var phone= $('#phone').val();
				var phoneCol =  data[mobileIndex];

				var vexpiryUpperRange= new Date($('#vexpiry-upper-range').val());
				var vexpiryBottomRange= new Date($('#vexpiry-bottom-range').val());
				var vexpiryCol =  new Date(data[vexpiryIndex]);

				var graduationUpperRange= new Date($('#graduation-upper-range').val());
				var graduationBottomRange= new Date($('#graduation-bottom-range').val());
				var graduationCol =  new Date(data[graduationIndex]);
				
				var status= $('#status').val();
				var statusCol =  data[currentStatusIndex];

				var lastContactUpperRange= new Date($('#last-contact-upper-range').val());
				var lastContactBottomRange= new Date($('#last-contact-bottom-range').val());
				var lastContactCol =  new Date(data[lastContactIndex]);

				var consultant= $('#consultant').val();
				var consultantCol; 
				
				if(admin){
					consultantCol	=  data[consultantIdIndex];
				}
				

				
				if ( firstnameCol.toLowerCase() != firstname.toLowerCase() && firstname !== "")
				{
					return false;
				}
				if ( lastnameCol.toLowerCase() != lastname.toLowerCase() && lastname !== "")
				{
					return false;
				}
				if ( nationalityCol.toLowerCase() != nationality.toLowerCase() && nationality !== "")
				{
					return false;
				}

				if ( servicesCol.toLowerCase() != services.toLowerCase() && services !== "")
				{
					return false;
				}

				if ( visaTypeCol.toLowerCase() != visaType.toLowerCase() && visaType !== "")
				{
					return false;
				}


				if ( courseCol.toLowerCase() != course.toLowerCase() && course !== "")
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
				if ( (vexpiryCol < vexpiryBottomRange || vexpiryCol > vexpiryUpperRange) && vexpiryUpperRange !== "Invalid Date" && vexpiryBottomRange !== "Invalid Date")
				{
					return false;
				}

				if ( (graduationCol < graduationBottomRange || graduationCol > graduationUpperRange) && graduationUpperRange !== "Invalid Date" && graduationBottomRange !== "Invalid Date")
				{
					return false;
				}

				if ( (lastContactCol < lastContactBottomRange || lastContactCol > lastContactUpperRange) && lastContactUpperRange !== "Invalid Date" && lastContactBottomRange !== "Invalid Date")
				{
					return false;
				}
				
				if ( statusCol != status && status !== "")
				{
					return false;
				}
				if(admin){
					if ( consultantCol != consultant && consultant !== "")
					{
						
						return false;
					}
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


