//submit notes
$(document).ready(function(){
	
	// var quill = new Quill('#editor', {
	// 	theme: 'snow'
	// });








	var noteForm = $('#note');

	// noteForm.submit(function(event){

	// 		//console.log('form submitted');

	// 		$.ajax({
	// 			type: noteForm.attr('method'),
	// 			url: noteForm.attr('action'),
	// 			data: noteForm.serialize(),
	// 			success: function (data) {

	// 			}
	// 		});
	// 		event.preventDefault();
	// 	});
	





	function createNote(id){
		$('#note').submit(function(event){

			//console.log('form submitted');

			



			event.preventDefault();

		});
	}
	function updateNote(id){
		$('#note').submit(function(event){

			console.log('form submitted');





			

		});
	}function deleteNote(id){
		$('#note').submit(function(event){

			





			event.preventDefault();

		});
	}

	$('#noteModal').on('shown.bs.modal', function (event) {

		console.log('ok');

  var button = $(event.relatedTarget) ;// Button that triggered the modal
  var content = button.data('content'); // Extract info from data-* attributes
  var id = button.data('id'); // Extract info from data-* attributes
  var user = button.data('user'); // Extract info from data-* attributes
  var writer = button.data('writer'); // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);

  modal.find('.modal-body textarea').val(content);
  modal.find('.modal-body .user').val(user);
  modal.find('.modal-body .noteId').val(id);
  modal.find('.modal-body .writer').val(writer);
});
});
