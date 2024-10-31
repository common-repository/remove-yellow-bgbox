<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class RYBB_Public {
	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	public function enqueue_styles() {

		$_get_settings = rybb_get_settings('rybb_set_enb_api');
	    if($_get_settings == 1 ){
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/customrybbest-public.css', array(), $this->version, 'all' );
	    }
	}

	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/customrybbest-public.js', array( 'jquery' ), $this->version, false );

	}

}
