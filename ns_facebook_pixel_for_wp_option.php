<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ns_fbpxwp_activate_set_options()
{
    add_option('ns_code_js_to_add_fb_pixel', '');
    add_option('ns_code_js_logged_to_add_fb_pixel', '');
    add_option('ns_code_js_role_to_add_fb_pixel', '');
	
	// Advanced matching
	add_option('ns_code_js_id_code', '');
	add_option('ns_code_js_email', '');
	add_option('ns_code_js_name', '');
	add_option('ns_code_js_last_name', '');
	add_option('ns_code_js_country', '');
	add_option('ns_code_js_cap', '');
	add_option('ns_code_js_phone', '');
	add_option('ns_code_js_state', '');
	add_option('ns_code_js_city', '');
	
	// Delayed Pixel Fires
	add_option('ns_code_js_delayed_active', '');
	add_option('ns_code_js_delayed_secs', '');
	
	// Scroll percentage trigger
	add_option('ns_code_js_scroll_active', '');
	add_option('ns_code_js_scroll_percentage', '');
}

register_activation_hook( __FILE__, 'ns_fbpxwp_activate_set_options');



function ns_fbpxwp_register_options_group()
{
    register_setting('ns_fbpxwp_options_group', 'ns_code_js_to_add_fb_pixel');
    register_setting('ns_fbpxwp_options_group', 'ns_code_js_logged_to_add_fb_pixel');    
    register_setting('ns_fbpxwp_options_group', 'ns_code_js_role_to_add_fb_pixel');
	
	// Advanced matching
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_id_code');   
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_email');
    register_setting('ns_fbpxwp_options_group', 'ns_code_js_name');    
    register_setting('ns_fbpxwp_options_group', 'ns_code_js_last_name');
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_country');
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_cap');
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_phone');
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_state');
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_city');
	
	// Delayed Pixel Fires
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_delayed_active');
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_delayed_secs');
	
	// Scroll percentage trigger
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_scroll_active');
	register_setting('ns_fbpxwp_options_group', 'ns_code_js_scroll_percentage');

}
 
add_action ('admin_init', 'ns_fbpxwp_register_options_group');

?>