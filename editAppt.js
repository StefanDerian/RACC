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
		surname : {
			en:"Surname",
			cn:"您的姓氏"
		},
		nationality:{
			en:"Nationality",
			cn:"您的国籍"
		},
		dob:{
			en:"Date of Birth",
			cn:"出生日期"
		},
		mobile:{
			en:"Mobile",
			cn:"联系电话"
		},
		email:{
			en:"Email",
			cn:"邮箱地址"
		},
		caddress:{
			en:"Current Address",
			cn:"现居地地址"
		},
		haddress:{
			en:"Home Country Address",
			cn:"出生地地址"
		},
		CurrentHeading:{
			en:"Current Study",
			cn:""
		},
		university:{
			en:"University",
			cn:"您目前就读的大学"
		},
		ccam:{
			en:"Course and Major",
			cn:"曾就读的专业"
		},
		ccomp:{
			en:"Course and Major",
			cn:"预计毕业时间"
		},
		PrevHeading:{
			en:"Previous Study",
			cn:""
		},
		puni:{
			en: "University",
			cn: "曾就读的大学/高中"
		},
		pcam:{
			en: "Course and Major",
			cn: "曾就读的专业"
		},
		pcomp:{
			en: "Completion date",
			cn: "毕业时间"
		},
		service:{
			en: "Service needed:",
			cn: "您需要哪方面的服务？"
		},
		know:{
			en: "Where did you hear about us:",
			cn: "您是通过哪种方式得知的RACC?"
		},
		visa:{
			en: "Current Visa:",
			cn: "当前持有签证种类"
		},
		vexpiry:{
			en: "Visa Expiry Date:",
			cn: "签证过期时间"
		},
		passport:{
			en: "Passport No.:",
			cn: "护照号"
		},
		pexpiry:{
			en: "Visa Expiry Date:",
			cn: "护照过期时间"
		},
		wechat:{
			en: "Wechat:",
			cn: "微信"
		},
		consultant:{
			en: "Consultant:",
			cn: "您心仪的顾问"
		}







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
			
			if(lang == 'en'){
				$('#submit-button').val('Submit');
				$('#cancel-button').val('Cancel');
			}
			if(lang == 'cn'){
				$('#submit-button').val('提交');
				$('#cancel-button').val('取消');
			}
			$(this).text(dictionary[translateKey][lang]);
		})

	}








});