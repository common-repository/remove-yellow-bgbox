<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class RYBB_Controller {

	protected $loader;
	protected $plugin_name;
	protected $version;
	public function __construct() {
		if ( defined( 'RYBB_PLUGIN_VERSION' ) ) {
			$this->version = RYBB_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.1';
		}
		$this->plugin_name = 'customrybbest';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-customrybbest-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-customrybbest-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-customrybbest-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/settings.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/functions.php';
		

		$this->loader = new RYBB_Loader();

	}

	private function define_admin_hooks() {

		$plugin_admin = new RYBB_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}
	private function define_public_hooks() {

		$plugin_public = new RYBB_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}
	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
