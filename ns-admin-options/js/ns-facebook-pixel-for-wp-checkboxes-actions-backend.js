jQuery( document ).ready(function($) {
	$('input.ns-fbp4wp-check-activation').on('change', function() {
		$('input.ns-fbp4wp-check-activation').not(this).prop('checked', false);  
	});
});