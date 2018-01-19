$(document).ready(function(){




	var dictionary = {
		firstname : {
			en:"firstname",
			cn:"您的名字"
		},
		personalInformation : {
			en:"Personal Information",
			cn:"个人信息"
		},




	};

	$('#chinese-button').click(function(){
		loadLanguage('cn');
	});
	$('#english-button').click(function(){
		loadLanguage('en');
	});


	function loadLanguage(lang = 'en'){
		$('.translate').each(function(){
			var translateKey = $(this).data("translate");
			
			$(this).text(dictionary[translateKey][lang]);
		})

	}








});