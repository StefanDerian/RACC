$(document).ready(function(){


	$('#educationModal').on('show.bs.modal',function(event){
		var button = $(event.relatedTarget) ;
		var id = button.data('id');
		var comment = button.data('comment');
		var course = button.data('course');
		var university = button.data('uni');
		var intake = button.data('intake');
		var status = button.data('status');

		console.log(intake);

		var now = new Date(intake);

		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);

		var today = now.getFullYear()+"-"+(month)+"-"+(day) ;


		$('#idModal').val(id);
		$('#commentModal').val(comment);
		$('#courseModal').val(course);
		$('#uniModal').val(university);
		$('#intakeModal').val(today);
		$('#statusModal').val(status);
		








	});








})