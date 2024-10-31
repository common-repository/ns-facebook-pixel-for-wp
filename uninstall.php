<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
$fbp4wp_option_to_delete_1 = 'ns_code_js_to_add_fb_pixel';
$fbp4wp_option_to_delete_2 = 'ns_code_js_logged_to_add_fb_pixel';
$fbp4wp_option_to_delete_3 = 'ns_code_js_role_to_add_fb_pixel';

 
delete_option($fbp4wp_option_to_delete_1);
delete_option($fbp4wp_option_to_delete_2);
delete_option($fbp4wp_option_to_delete_3);
?>