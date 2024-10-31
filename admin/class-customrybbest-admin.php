<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class RYBB_Admin {

	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/customrybbest-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'rybb_font-awesome', plugin_dir_url( __FILE__ ) . '/font-awesome/css/font-awesome.css', array(), $this->version, 'all' );
	}
	public function enqueue_scripts() {
		wp_register_script( 'rybb_back_handle',  plugin_dir_url( __FILE__ ) . 'js/customrybbest-admin.js', array( 'jquery' ), $this->version, false );
		$translation_array = array(
			'base_url' => plugins_url(RYBB_PLUGIN_SLUG) ,
			'settings_url' => admin_url('admin.php?page=rybb_api_settings'),
		);
		wp_localize_script( 'rybb_back_handle', 'rybbObj', $translation_array );

		wp_enqueue_script( 'rybb_back_handle' );

	}

}
