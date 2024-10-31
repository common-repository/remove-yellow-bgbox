<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function rybb_page_tabs( $current = 'rybb_new_api' ) {
    $tabs = array(
        'rybb_api_settings'  => __( '<i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Settings', 'plugin-textdomain' ),
        'rybb_api_endpoints'  => __( '<i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;General', 'plugin-textdomain' ),
    );
    $html = '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? 'nav-tab-active' : '';
        $html .= '<a class="nav-tab navmar ' . esc_attr($class) . '" href="?page=rybb_settings&tab=' . $tab . '">' . $name . '</a>';
    }
    $html .= '</h2>';
    echo $html;
}

// Code displayed before the tabs (outside)
// Tabs


if ( isset( $_GET['tab'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    $tab_sec = sanitize_text_field( wp_unslash( $_GET['tab'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    $tab = ( ! empty( $tab_sec)  ) ?  $tab_sec  : 'rybb_new_api';
    rybb_page_tabs( $tab );
}
    

if($tab == 'rybb_api_settings'){
   require_once 'rybb_api_settings.php';
}
else if($tab == 'rybb_api_endpoints'){
   require_once 'rybb_api_endpoints.php';
}


?>