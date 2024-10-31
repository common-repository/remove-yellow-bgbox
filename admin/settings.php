<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/** Step 2 (from text above). */
add_action( 'admin_menu', 'rybb_add_admin_menu' );

/** Step 1. */
function rybb_add_admin_menu() {

	$page_title = 'RYBB';
	$menu_title = 'RYBB';
	$capability = 'manage_options';
	$menu_slug = 'rybb_api_endpoints';
	$function = 'rybb_menu_callback';
	$icon_url  = plugins_url(RYBB_PLUGIN_SLUG.'/admin/img/remove-yellow-bgbox.jpg');
	$position  = 5;
	add_menu_page(  $page_title,  $menu_title,  $capability,  $menu_slug,  $function  ,$icon_url ,$position );
	add_submenu_page( $menu_slug ,  'Settings', 'Settings',  $capability, 'rybb_api_settings', 'rybb_menu_settings_callback' );
	add_submenu_page( $menu_slug ,  'Walk Through', 'Walk Through',  $capability, 'rybb_api_walk_help', 'rybb_api_walk_help_callback' );
}

/** Step 3. */
function rybb_menu_callback() {
	
	require_once 'rybb_api_endpoints.php';
}

function rybb_menu_settings_callback(){
	require_once 'rybb_api_settings.php';
}
function rybb_api_walk_help_callback(){
	require_once 'rybb_api_walk_help.php';
}


function rybb_get_settings	($key=''){
	$rybb_settings = get_option('rybb_settings_meta');
	if($key){
		return $rybb_settings[$key];
	}else{
		return $rybb_settings;
	}
}