$(document).ready(function(){
	var table = $('#agent-list').DataTable({
		processing: true,
		serverSide: false,
		ajax:{
			url:"agentList-backend.php",
			dataSrc: ''
		},
		columns:[
		{ "data": "DisplayName", "orderable": true },
		{ "data": "UserName", "orderable": true },
		],
		createdRow: function(row, data, dataIndex) {
			$(row).attr('data-id',data.id)
		}
	});


	$('#agent-list tbody').on('click', 'tr', function () {
		var row = table.row( this ).data();
		// var data = table.row( this ).data('id');
		// alert( 'You clicked on '+data[0]+'\'s row' );
		window.location.href = "createAccount.php?id="+row.id;
	});





});