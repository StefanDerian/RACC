$(document).ready(function(){



	$('#change').on('change',function(e){
		console.log($(this).val());
		if($(this).is(':checked')){

			
			$('#pass').prop('disabled', false);
			$('#repass').prop('disabled', false);;

		}else{
			$('#pass').val('');
			$('#repass').val('');
			$('#pass').prop('disabled', true);
			$('#repass').prop('disabled', true);

		}
	});




});