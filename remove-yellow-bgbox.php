<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.pakainfo.com/
 * @since             1.0.0
 * @package           rybb-google-adsense-ads
 *
 *            @wordpress-plugin
 *            Plugin Name: Remove Yellow BGBOX
 *            Plugin URI: https://www.pakainfo.com/
 *            Description: Fix the background color that sometimes AdSense ads have on websites (Remove Yellow Background/Box From Google Adsense Ads).
 *            Version: 1.0
 *            Author: Pakainfo
 *            Author URI: https://www.pakainfo.com/
 *            Text Domain: pakainfo-remove-yellow-bgbox
 *            Contributors: Pakainfo
 *            License: GPLv2
 *            License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


define( 'RYBB_PLUGIN_VERSION', '2.1.1' );
define( 'RYBB_DB', 'rybb_' );
define( 'RYBB_PLUGIN_SLUG', 'remove-yellow-bgbox' );
define( 'RYBB_PLUGIN_TEXTDOMAIN', 'customrybbest' );

$plugin = plugin_basename( __FILE__ );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-customrybbest-activator.php
 */
function rybb_activate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-customrybbest-activator.php';
	RYBB_Activator::activate();
	
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-customrybbest-deactivator.php
 */
function rybb_deactivate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-customrybbest-deactivator.php';
	RYBB_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'rybb_activate_plugin' );
register_deactivation_hook( __FILE__, 'rybb_deactivate_plugin' );
add_filter( "plugin_action_links_$plugin", 'rybb_add_settings_link' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-customrybbest.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function rybb_run_customrybbest() {

	$plugin = new RYBB_Controller();
	$plugin->run();

}
rybb_run_customrybbest();




