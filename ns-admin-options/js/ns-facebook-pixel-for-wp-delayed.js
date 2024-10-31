jQuery( document ).ready(function($) {

	// Delay pixel fire by choosen seconds
	var isLogPermitted = $("#ns-fbp4wp-is-log-permitted-option-setting").val();
	var seconds = $("#ns-fbp4wp-delay-option-setting").val();  
	if(seconds) { console.log(seconds);
		if(isLogPermitted == '1') {
			
			setTimeout(function() {
			  fbq('track', 'Lead');
			}, seconds * 1000);
		}
	}
});