<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


function rybb_add_settings_link( $links ) {
    $settings_link = '<a href="'.admin_url( "admin.php?page=rybb_api_endpoints" ).'">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}

function rybb_activation_redirect( $plugin ) {
        exit( wp_redirect( admin_url( 'admin.php?page=rybb_api_endpoints' ) ) );    
}
//disable cron

function rybb_reset_deafault_settings(){
  global $wpdb;
  $rybb_settings = array();
  $rybb_set_enb_api = 1;
  $rybb_settings['rybb_set_enb_api'] = $rybb_set_enb_api;
  update_option('rybb_settings_meta' , $rybb_settings);    
}

function rybb_admin_page_tabs( $current = 'rybb_new_api' ) {
    $tabs = array(
      'rybb_api_endpoints'  => __( '<i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;General', 'plugin-textdomain' ),
        'rybb_api_settings'  => __( '<i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Settings', 'plugin-textdomain' ),
        'rybb_api_walk_help'  => __( '<i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Walk Through', 'plugin-textdomain' ),
    );
    $html = '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? 'nav-tab-active' : '';
        $html .= '<a class="nav-tab navmar ' . esc_attr($class) . '" href="?page=' . $tab . '">' . $name . '</a>';
    }
    $html .= '</h2>';
    echo $html;
}


add_action('init' , 'rybb_redirect_old_to_new');
function rybb_redirect_old_to_new(){
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $make_link = admin_url('options-general.php?page=rybb_settings&tab=rybb_api_settings');
  if( $actual_link == $make_link ){
    exit(wp_redirect(admin_url('admin.php?page=rybb_api_endpoints')));
  }
}
