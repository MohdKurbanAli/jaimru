$(document).ready(function(){
	$("#refreshCaptchaCode").click(function(){
		var img = $('#captchaCode').attr('src');	
		img = img.substring(0,img.lastIndexOf("?"));
		img = img+"?rand="+Math.random()*1000;
		$('#captchaCode').attr('src', img);
	});
});