<?php
/**
 * Plugin Name: ZZ Image Slider
 * Plugin URI:  http://zzapps.net/zzis
 * Description: Responsive images slider, bassed on JSSOR Slider.
 * Author:      zudikas zveris
 * Author URI:  http://zzapps.net
 * Version:     1.3.0
 * Text Domain: zz-images-slider
 * Domain Path: /languages/
 * License:     GPLv2 or later
 */

// security if direct
defined('ABSPATH') or die("Hello!");

define( 'PROVERSION', false );
define( 'ZZIS_TEXT_DOMAIN', "zz-images-slider" );
define( 'ZZIS_SHORTCODE', "ZZIS" );

define( 'ZZIS_PLUGIN_FILE', __FILE__ );
define( 'ZZIS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ZZIS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ZZIS_PLUGIN_BASE_DIR', dirname( plugin_basename( __FILE__ ) ) );

require_once ZZIS_PLUGIN_DIR . '/lib/controlers/zzis.php';

// install,uninstall
register_activation_hook( __FILE__, array( 'ZZIS', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'ZZIS', 'deactivate' ) );

ZZIS::init();

function ZZIS( $id ) {
    if ( is_numeric($id) )
        return ZZIS::process_shortcode( array( 'id' => $id ) );
}
