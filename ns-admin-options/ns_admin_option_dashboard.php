<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require_once( plugin_dir_path( __FILE__ ).'inc.php');

$link_sidebar = $ns_url_plugin_premium.'?ref-ns=2&campaign=sidebar&utm_source='.$ns_menu_label.'%20Sidebar&utm_medium=Sidebar%20dentro%20settings&utm_campaign='.$ns_menu_label.'%20Sidebar%20premium';
$link_bannerino = $ns_url_plugin_premium.'?ref-ns=2&campaign=bannerino&utm_source='.$ns_menu_label.'%20Bannerino&utm_medium=Bannerino%20dentro%20settings&utm_campaign='.$ns_menu_label.'%20Bannerino%20premium'; 
$link_bannerone = $ns_url_plugin_premium.'?ref-ns=2&campaign=bannerone&utm_source='.$ns_menu_label.'%20Bannerone&utm_medium=Bannerone%20dashboard&utm_campaign='.$ns_menu_label.'%20Bannerone%20premium'; 
$link_bannerone_or_compare = $ns_url_plugin_premium.'?ref-ns=2&campaign=compare&utm_source='.$ns_menu_label.'%20Bannerone&utm_medium=Compare%20dashboard&utm_campaign='.$ns_menu_label.'%Compare%20premium'; 
$link_promo_theme = $ns_url_theme_promo.'?ref-ns=2&campaign='.$ns_theme_promo_slug.'&utm_source='.$ns_theme_promo_slug.'%20'.$ns_menu_label.'%20Sidebar&utm_medium=Sidebar%20'.$ns_theme_promo_slug.'%20dentro%20settings&utm_campaign='.$ns_theme_promo_slug.'%20'.$ns_menu_label.'%20Sidebar%20premium';
?>

	    <div class="verynsbigbox">
	    	<?php 
	    		/* *** BOX THEME PROMO *** */
				require_once( plugin_dir_path( __FILE__ ).'ns_settings_box_theme_promo.php');

	    		/* *** BOX PREMIUM VERSION *** */
				require_once( plugin_dir_path( __FILE__ ).'ns_settings_box_pro_version.php');

	    		/* *** BOX NEWSLETTER *** */
				// require_once( plugin_dir_path( __FILE__ ).'ns_settings_box_newsletter.php');
			?>			
		</div>
	   

		<div class="verynsbigboxcontainer">

	<div class="postbox nsproversionfbpx4wp">
        <h3 class="titprofbpx4wp"><?php _e( 'Upgrade to the PREMIUM VERSION', 'ns-facebook-pixel-for-wp' ); ?></h3>
	        <div class="colprofbpx4wp">
	        	<h2 class="titlefbpx4wp"><?php _e( 'Premium features:', 'ns-facebook-pixel-for-wp' ); ?></h2><br>
	        	<ul>
					<li>- <?php _e( 'add multiple Pixels', 'ns-facebook-pixel-for-wp' ); ?></li>
	        		<li>- <?php _e( 'add event "View content"', 'ns-facebook-pixel-for-wp' ); ?></li>
	        		<li>- <?php _e( 'add event "Purchase"', 'ns-facebook-pixel-for-wp' ); ?></li>
	        		<li>- <?php _e( 'add event in every single product', 'ns-facebook-pixel-for-wp' ); ?></li>
	        		<li>- <?php _e( '"View content" and "Purchase" parameters are compiled automatically', 'ns-facebook-pixel-for-wp' ); ?></li>
	        		<li>- <?php _e( 'add different Facebook Pixel code for any page', 'ns-facebook-pixel-for-wp' ); ?></li>
	        		<li>- <?php _e( 'add a single Facebook Pixel inside only one page', 'ns-facebook-pixel-for-wp' ); ?></li>
	        	</ul>	
	        </div>
	        <div class="colprofbpx4wp2">
	        	<h2 class="titlefbpx4wp2"><?php _e( 'Upgrade or get support:', 'ns-facebook-pixel-for-wp' ); ?></h2><br><br>
				<?php _e( 'If you upgrade your plugin you will get one year of free updates and support
				through our website available 24h/24h. Upgrade and you\'ll have the advantage
				of additional features of the premium version.', 'ns-facebook-pixel-for-wp' ); ?>
				<br><br>
				<a id="fbp4wplinkpremiumboxpremium" class="button-primary" href="<?php echo $link_bannerone; ?>" target="_blank"><?php _e( 'Get Premium Now', 'ns-facebook-pixel-for-wp' ); ?></a>
				<br><br><a href="<?php echo $link_bannerone_or_compare; ?>" target="_blank"><?php _e( 'or compare free with premium version', 'ns-facebook-pixel-for-wp' ); ?></a>
	        </div>
    </div>	

			<div class="icon32" id="icon-options-general"><br /></div>
			<form method="post" action="options.php" enctype="multipart/form-data">
	    		<?php /* *** BOX THEME PROMO *** */ ?>
				<?php require_once( plugin_dir_path( __FILE__ ).'ns_settings_custom.php'); ?>				
				<p><input type="submit" class="button-primary" id="submit" name="submit" value="<?php _e('Save Changes', 'ns-facebook-pixel-for-wp') ?>" /></p>				
			</form>
		</div>
		






