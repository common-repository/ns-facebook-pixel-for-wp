<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* *** review request in footer *** */
add_filter('admin_footer_text', function() {
    return 'If you like <strong>Advanced Social Pixel</strong> please leave us a <a href="https://wordpress.org/support/plugin/ns-facebook-pixel-for-wp/reviews?rate=5#new-post" target="_blank" class="wc-rating-link" data-rated="Thanks :)">★★★★★</a> rating. A huge thanks in advance!';
}, 9999);	
?>

<?php $fbp4wp_script_text = get_option('ns_code_js_to_add_fb_pixel', ''); ?>
<div class="genRowNssdc nsproversionfbpx4wp">
	<div class="ns-backend-container">
		<h3><?php echo $ns_full_name; ?> <?php _e( 'Settings', 'ns-facebook-pixel-for-wp' ); ?></h3>
		 <p class="description">
			<?php _e( 'Generate your Facebook Pixel base code', 'ns-facebook-pixel-for-wp' ); ?>
			 - <a target="_blank" href="https://www.facebook.com/business/help/952192354843755?helpref=faq_content"><?php _e( 'Facebook Pixel Implementation Guide', 'ns-facebook-pixel-for-wp' ); ?></a><br>
			<?php _e( 'Copy and paste your Facebook Pixel base code here:', 'ns-facebook-pixel-for-wp' ); ?>
		 </p>
		 <textarea rows="10" cols="100" id="ns_code_js_to_add_fb_pixel" class="ns-backend-input" name="ns_code_js_to_add_fb_pixel"><?php echo esc_textarea($fbp4wp_script_text); ?></textarea>	
		 <p class="description"><?php _e( 'You can check that your pixel work properly using', 'ns-facebook-pixel-for-wp' ); ?> <a target="_blank" href="https://developers.facebook.com/docs/facebook-pixel/pixel-helper"><?php _e( 'Facebook Pixel Helper', 'ns-facebook-pixel-for-wp' ); ?></a></p>
	</div>
	
	<div class="ns-backend-container">
		<h3><?php _e( 'Show or Hide Pixel for logged user', 'ns-facebook-pixel-for-wp' ); ?></h3>
		<p class="description">
			<?php _e( 'You can choose if activate or not Facebook Pixel when a user is logged in', 'ns-facebook-pixel-for-wp' ); ?>
		</p>

		<?php
			$ns_fbpxwp_saved_logged = get_option('ns_code_js_logged_to_add_fb_pixel', '1');
			if ($ns_fbpxwp_saved_logged == 1) {
				$ns_fbpxwp_show = ' checked="checked"';
				$ns_fbpxwp_hide = '';
				$ns_role_disabled = '';
			}else{
				$ns_fbpxwp_show = '';
				$ns_fbpxwp_hide = ' checked="checked"';
				$ns_role_disabled = 'disabled';		
			}
		?>

		<input class="ns-backend-input" type="radio" name="ns_code_js_logged_to_add_fb_pixel" value="1"<?php echo $ns_fbpxwp_show; ?>> Show (default)
		<br>
		<input class="ns-backend-input" type="radio" name="ns_code_js_logged_to_add_fb_pixel" value="0"<?php echo $ns_fbpxwp_hide; ?>> Hide
	</div>

	<div class="ns-backend-container">
		<h3><?php _e( 'Exclude Pixel for a specified user Role', 'ns-facebook-pixel-for-wp' ); ?></h3>
		<p class="description">
			<?php _e( 'Choose a specific user Role to exclude from pixel', 'ns-facebook-pixel-for-wp' ); ?>
		</p>

		<?php
			$ns_fbpxwp_saved_role = get_option('ns_code_js_role_to_add_fb_pixel', '');
		?>

		<select class="ns-backend-input" name="ns_code_js_role_to_add_fb_pixel"<?php echo $ns_role_disabled; ?>>
			<option><?php _e( '...choose', 'ns-facebook-pixel-for-wp' ); ?></option>
		   <?php wp_dropdown_roles( $ns_fbpxwp_saved_role ); ?>
		</select>
	</div>
	
	<div class="ns-backend-container">
		<h3><?php _e( 'Advanced matching', 'ns-facebook-pixel-for-wp' ); ?></h3>
		<p class="description">
			<?php _e( 'If your website visitors have disabled cookies, you can use the advanced pixel matching feature to include visitor data when the pixel is loaded.', 'ns-facebook-pixel-for-wp' ); ?>
		</p>

		<?php
			// Advanced matching
			$ns_fbpxwp_email = get_option('ns_code_js_email', '');
			$ns_fbpxwp_name = get_option('ns_code_js_name', '');
			$ns_fbpxwp_last_name = get_option('ns_code_js_last_name', '');
			$ns_fbpxwp_billing_country = get_option('ns_code_js_country', '');
			$ns_fbpxwp_cap = get_option('ns_code_js_cap', '');
			$ns_fbpxwp_phone = get_option('ns_code_js_phone', '');
			$ns_fbpxwp_billing_state = get_option('ns_code_js_state', '');
			$ns_fbpxwp_billing_city = get_option('ns_code_js_city', '');
			
			$ns_fbpxwp_id_code = get_option('ns_code_js_id_code', '');
		?>

		<input class="ns-backend-input" type="text" name="ns_code_js_id_code" value=" <?php echo $ns_fbpxwp_id_code; ?>"> ID Code <br>
		<p class="description">
			<?php _e( 'To use this feature you need to insert the Pixel ID Code in this input. You can easily get the <b>ID Code</b> from the pixel script you pasted in the <b>above textarea</b>. <br>Search for this line "<b>fbq(\'init\', \'XXXXXXXXXXXXX\');</b>" where \'XXXXXXXXXXXXX\' rapresents your ID Code.', 'ns-facebook-pixel-for-wp' ); ?>
		</p>

		<input class="ns-backend-input" type="checkbox" name="ns_code_js_email" <?php if($ns_fbpxwp_email == 'on') { echo 'checked'; } ?>> Email<br>
		<input class="ns-backend-input" type="checkbox" name="ns_code_js_name" <?php if($ns_fbpxwp_name == 'on') { echo 'checked'; } ?>> Name<br>
		<input class="ns-backend-input" type="checkbox" name="ns_code_js_last_name" <?php if($ns_fbpxwp_last_name == 'on') { echo 'checked'; } ?>> Last name<br>
		<input class="ns-backend-input" type="checkbox" name="ns_code_js_country" <?php if($ns_fbpxwp_billing_country == 'on') { echo 'checked'; } ?>> Billing Country<br>
		<input class="ns-backend-input" type="checkbox" name="ns_code_js_cap" <?php if($ns_fbpxwp_cap == 'on') { echo 'checked'; } ?>> Billing CAP<br>
		<input class="ns-backend-input" type="checkbox" name="ns_code_js_phone" <?php if($ns_fbpxwp_phone == 'on') { echo 'checked'; } ?>> Billing Phone<br>
		<input class="ns-backend-input" type="checkbox" name="ns_code_js_state" <?php if($ns_fbpxwp_billing_state == 'on') { echo 'checked'; } ?>> Billing State<br>
		<input class="ns-backend-input" type="checkbox" name="ns_code_js_city" <?php if($ns_fbpxwp_billing_city == 'on') { echo 'checked'; } ?>> Billing City<br>
	</div>
		
<?php
	// Delayed pixel
	$ns_fbpxwp_delayed_active = get_option('ns_code_js_delayed_active', '');
	$ns_fbpxwp_delayed_secs= get_option('ns_code_js_delayed_secs', '');
?>
	<div class="ns-backend-container">
		<h3><?php _e( 'Delayed Pixel Fires', 'ns-facebook-pixel-for-wp' ); ?></h3>
		<input class="ns-backend-input ns-fbp4wp-check-activation" type="checkbox" name="ns_code_js_delayed_active" <?php if($ns_fbpxwp_delayed_active == 'on') { echo 'checked'; } ?>> <?php _e( 'Activate Delay Pixel (optional)', 'ns-facebook-pixel-for-wp' ); ?><br>
		<p class="description">
			<?php _e( 'You can use this functionality to track users who interact with your website a few seconds before firing a pixel event<br>
				It could be used to track “engaged” visits to a page, where people are not bouncing too fast and are actually reading the content.', 'ns-facebook-pixel-for-wp' ); ?>
		</p>
		<input class="ns-backend-input" type="number" name="ns_code_js_delayed_secs" value="<?php echo $ns_fbpxwp_delayed_secs; ?>"> <?php _e( 'Seconds of delay', 'ns-facebook-pixel-for-wp' ); ?> <br>
	</div>

<?php
	// Scroll percentage trigger
	$ns_fbpxwp_scroll_active = get_option('ns_code_js_scroll_active', '');
	$ns_fbpxwp_scroll_percentage = get_option('ns_code_js_scroll_percentage', '');
?>
	<div class="ns-backend-container">
		<h3><?php _e( 'Track a better quality visitors based on page length or percentage', 'ns-facebook-pixel-for-wp' ); ?></h3>
		<input class="ns-backend-input ns-fbp4wp-check-activation" type="checkbox" name="ns_code_js_scroll_active" <?php if($ns_fbpxwp_scroll_active == 'on') { echo 'checked'; } ?>> <?php _e( 'Activate Scroll Percentage Pixel (optional)', 'ns-facebook-pixel-for-wp' ); ?><br>
		<p class="description">
			<?php _e( 'You can use this functionality to track the percentage of the page red by the user.', 'ns-facebook-pixel-for-wp' ); ?>
		</p>
		<input class="ns-backend-input" type="number" min="1" max="100" name="ns_code_js_scroll_percentage" value="<?php echo $ns_fbpxwp_scroll_percentage; ?>"> <?php _e( '% of page user have to scroll to start track leads', 'ns-facebook-pixel-for-wp' ); ?>.<br>
	</div>
</div>
<?php settings_fields('ns_fbpxwp_options_group'); ?>