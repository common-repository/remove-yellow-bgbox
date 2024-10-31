<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class RYBB_Activator {

	public static function activate() {
				//create root secret
		global $wpdb;
		$rybb_settings = array();
  		$rybb_set_enb_api = 1;
  		$_get_settings = rybb_get_settings('rybb_set_end_slug');
	    $rybb_settings['rybb_set_enb_api'] = $rybb_set_enb_api;
	    if(empty($_get_settings)){
	    	update_option('rybb_settings_meta' , $rybb_settings);
	    }
	    add_action( 'activated_plugin', 'rybb_activation_redirect' );
	}

}
