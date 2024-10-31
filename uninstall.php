<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb, $wp_version;
$prefix = $wpdb->prefix.RYBB_DB;

// Delete options.
$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name = 'rybb_settings_meta' " );
