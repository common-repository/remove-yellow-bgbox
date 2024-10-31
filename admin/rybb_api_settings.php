<?php 
ob_start();
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
include_once('header.php');
if(isset($_GET['reset'])){
  if(sanitize_text_field($_GET['reset']) == 1){
    rybb_reset_deafault_settings();
  }
}
if(isset($_POST['rybb_save_settings'])){

  current_user_can( 'customize' ) || die;
  check_admin_referer( 'RYBB_form_submit' );

    $data = array();
    $get_settings = array();
    unset($data['rybb_save_settings']);

    if(!isset($_POST['rybb_set_enb_api'])){
      $data['rybb_set_enb_api'] = 0 ;
    }else{
      $data['rybb_set_enb_api'] = 1 ;
    }
    
    $get_settings = rybb_get_settings();
    $data = array_merge($get_settings , $data );
    update_option('rybb_settings_meta' , $data);
    echo '<script>alert("Settings Saved!");</script>';
 
}

$rybb_settings = get_option('rybb_settings_meta');


$rybb_set_enb_api = esc_attr($rybb_settings['rybb_set_enb_api']) == 1 ? 'checked' : '';

 ?>
 <div class="gsr_back_body">
 <div class="wraparea">
 <h2><?php _e( 'Settings' ); ?></h2>
<form action="" method="post">
  <?php wp_nonce_field( 'RYBB_form_submit' ); ?>
<table class="form-table rybb_set_table_wrap">
 <tr>
    <th class="row"><h3><?php _e( 'Enable Remove Yellow BGBOX' ); ?></h3>
      
      <i><?php _e('(Enable or Disable Remove Yellow BGBOX)'); ?></i>

    </th>
    <td>
      <label class="switch">
        <input type="checkbox" name="rybb_set_enb_api" value="1" <?php echo esc_attr($rybb_set_enb_api); ?>>
        <span class="slider round"></span>
      </label>
      <a href="#" data-toggle="tooltip" title="This option should be turn on .Remove the yellow background behind Google AdSense ads."><i class="fa fa-question-circle" aria-hidden="true"></i></a>
    </td>
  </tr>
</table>
<p class="submit"><input name="rybb_save_settings" id="submit" class="button button-primary" value="<?php _e('Save Settings'); ?>" type="submit">
<input name="rybb_reset_settings" id="rybb_reset_settings" class="button button-primary" value="<?php _e('Reset Default Settings'); ?>" type="button"></p>
</form>
</div>
</div>

