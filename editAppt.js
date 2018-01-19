$(document).ready(function(){




	var dictionary = {
	FirstName : {
		en:"firstname",
		cn:"firstname in CN"
	},
	personalInformation : {
		en:"Personal Information",
		cn:"Personal Information in CN"
	},




	};

	$('#chinese-button').click(function(){
		loadLanguage('cn');
	});


	function loadLanguage(lang = 'en'){
		$('.translate').each(function(){
			var translateKey = $(this).data("translate");
			console.log(translateKey);
			console.log(dictionary[translateKey][lang]);
		})

	}








});