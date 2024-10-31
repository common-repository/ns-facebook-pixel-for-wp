<?php
/*
Plugin Name: Advanced Social Pixel
Plugin URI: https://wordpress.org/plugins/ns-facebook-pixel-for-wp/
Description: This plugin add facebook pixel script into header
Version: 2.1.1
Author: NsThemes
Author URI: http://www.nsthemes.com
Text Domain: ns-facebook-pixel-for-wp
Domain Path: /i18n
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/** 
 * @author        PluginEye
 * @copyright     Copyright (c) 2019, PluginEye.
 * @version         1.0.0
 * @license       https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * PLUGINEYE SDK
*/

require_once('plugineye/plugineye-class.php');
$plugineye = array(
    'main_directory_name'       => 'ns-facebook-pixel-for-wp',
    'main_file_name'            => 'ns-facebook-pixel-for-wp.php',
    'redirect_after_confirm'    => 'admin.php?page=ns-facebook-pixel-for-wp%2Fns-admin-options%2Fns_admin_option_dashboard.php',
    'plugin_id'                 => '217',
    'plugin_token'              => 'NWNmZTY3MWRhZmZjYTk4MzU4OWY2OGE2MTAxMmIyZmRhMzY1MGY0ZGUyODdiMTk0YmE1YmZhNjRhMDAyOGRjOTdhMTJiZGFkZmVlMDM=',
    'plugin_dir_url'            => plugin_dir_url(__FILE__),
    'plugin_dir_path'           => plugin_dir_path(__FILE__)
);

$plugineyeobj217 = new pluginEye($plugineye);
$plugineyeobj217->pluginEyeStart();      
        

/* *** plugin i18n *** */
function ns_facebook_pixel_for_wp_load_plugin_textdomain() {
    load_plugin_textdomain( 'ns-facebook-pixel-for-wp', FALSE, basename( dirname( __FILE__ ) ) . '/i18n/' );
}
add_action( 'plugins_loaded', 'ns_facebook_pixel_for_wp_load_plugin_textdomain' );


/* *** plugin review trigger *** */
require_once( plugin_dir_path( __FILE__ ) .'/class/class-plugin-theme-review-request.php');



/* *** plugin options *** */
require_once( plugin_dir_path( __FILE__ ) .'/ns_facebook_pixel_for_wp_option.php');

/* *** plugin settings page *** */
require_once( plugin_dir_path( __FILE__ ) .'/ns-admin-options/ns-admin-options-setup.php');

/* *** write facebook code *** */
function fbp4wp_write_fb_pixel(){
	$fbp4wp_script_to_print = get_option('ns_code_js_to_add_fb_pixel', '');
	$ns_fb4wp_custom_logged = get_option('ns_code_js_logged_to_add_fb_pixel', '1' );
	$ns_fbpxwp_saved_role = get_option('ns_code_js_role_to_add_fb_pixel', '');
	
	$ns_fbpxwp_id_code = get_option('ns_code_js_id_code', '');
	$ns_fbpxwp_email = get_option('ns_code_js_email', '');
	$ns_fbpxwp_name = get_option('ns_code_js_name', '');
	$ns_fbpxwp_last_name = get_option('ns_code_js_last_name', '');
	$ns_fbpxwp_billing_country = get_option('ns_code_js_country', '');
	$ns_fbpxwp_cap = get_option('ns_code_js_cap', '');
	$ns_fbpxwp_phone = get_option('ns_code_js_phone', '');
	$ns_fbpxwp_billing_state = get_option('ns_code_js_state', '');
	$ns_fbpxwp_billing_city = get_option('ns_code_js_city', '');
	
	
	$curr_usr = wp_get_current_user();
	
	$ns_advanced_matching = array();
	
	$setted_up = false;
	
	if($ns_fbpxwp_id_code) {		
		if( $ns_fbpxwp_email == 'on') {
			$ns_advanced_matching['em'] = strtolower($curr_usr -> user_email);
			$setted_up = true;
		}
		
		if( $ns_fbpxwp_name == 'on') {
			$ns_advanced_matching['fn'] = strtolower($curr_usr -> first_name);
			$setted_up = true;
		}
		
		if( $ns_fbpxwp_last_name == 'on') {
			$ns_advanced_matching['ln'] = strtolower($curr_usr -> last_name);
			$setted_up = true;
		}
		
		if( $ns_fbpxwp_billing_country == 'on') {
			$ns_advanced_matching['country'] = $curr_usr -> billing_country;
			$setted_up = true;
		}
		
		if( $ns_fbpxwp_cap == 'on') {
			$ns_advanced_matching['zp'] = $curr_usr -> billing_postcode;
			$setted_up = true;
		}
		
		if( $ns_fbpxwp_phone == 'on') {
			$ns_advanced_matching['ph'] = $curr_usr -> billing_phone;
			$setted_up = true;
		}
		
		if( $ns_fbpxwp_billing_state == 'on') {
			$ns_advanced_matching['st'] = strtolower($curr_usr -> billing_state);
			$setted_up = true;
		}
		
		if( $ns_fbpxwp_billing_city == 'on') {
			$ns_advanced_matching['ct'] = strtolower($curr_usr -> billing_city);
			$setted_up = true;
		}
		
	}

	if ($ns_fb4wp_custom_logged == 1) {

			if( is_user_logged_in() ) {
		    	$ns_fb4wp_user = wp_get_current_user();
		    	$ns_fb4wp_role = ( array ) $ns_fb4wp_user->roles;
		    	if ($ns_fb4wp_role[0] != $ns_fbpxwp_saved_role) {
					
					// At least one checkbox is active
					if($setted_up){
						$encodedArr = json_encode($ns_advanced_matching);
						$fbp4wp_script_to_print = str_replace ( '\''.$ns_fbpxwp_id_code.'\'', '\''.$ns_fbpxwp_id_code.'\','.$encodedArr, $fbp4wp_script_to_print );
					}
		    		echo $fbp4wp_script_to_print;
					
		    	}
				
			} else {
				echo $fbp4wp_script_to_print;
			}
			
	} else {
		if (!is_user_logged_in()) {
			echo $fbp4wp_script_to_print;
		}
	}


}
add_action('wp_head', 'fbp4wp_write_fb_pixel');

// Add hidden input to get the option delay setted on backend
function fbp4wp_write_fb_hidden_inputs_for_settings(){
	// Delayed pixel
	$ns_fbpxwp_delayed_active = get_option('ns_code_js_delayed_active', '');
	if($ns_fbpxwp_delayed_active == 'on') {
		$is_log_permitted = get_option('ns_code_js_logged_to_add_fb_pixel', '1' );
		$pixel_option_delay = get_option('ns_code_js_delayed_secs', '0');
		echo '<input id="ns-fbp4wp-is-log-permitted-option-setting" type="hidden" value="'.$is_log_permitted.'">';
		echo '<input id="ns-fbp4wp-delay-option-setting" type="hidden" value="'.$pixel_option_delay.'">';
	}
	
	$ns_fbpxwp_scroll_active = get_option('ns_code_js_scroll_active', '');
	if($ns_fbpxwp_scroll_active == 'on') {
		$is_log_permitted = get_option('ns_code_js_logged_to_add_fb_pixel', '1' );
		$pixel_option_percentage = get_option('ns_code_js_scroll_percentage', '75');
		echo '<input id="ns-fbp4wp-is-log-permitted-option-setting" type="hidden" value="'.$is_log_permitted.'">';
		echo '<input id="ns-fbp4wp-scroll-percentage-option-setting" type="hidden" value="'.$pixel_option_percentage.'">';
	}
	// Page percentage trigger
}

add_action('wp_footer', 'fbp4wp_write_fb_hidden_inputs_for_settings');

/* *** add link premium *** */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'fbp4wp_add_action_links' );

function fbp4wp_add_action_links ( $links ) {	
 $mylinks = array(
 "<a id=\"fbp4wplinkpremiumlinkpremium\" href=\"http://www.nsthemes.com/product/facebook-conversion-pixel/?ref-ns=2&campaign=linkpremium\" target=\"_blank\">".__( 'Premium Version', 'ns-facebook-pixel-for-wp' )."</a>",
 );
return array_merge( $links, $mylinks );
}