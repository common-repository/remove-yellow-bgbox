<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;
include_once('header.php');
$icon_url1  = plugins_url(RYBB_PLUGIN_SLUG.'/admin/img/remove-yellow-bgbox.png');
$icon_url2  = plugins_url(RYBB_PLUGIN_SLUG.'/admin/img/remove-yellow-bgbox-2.png');
?>
  <div class="gsr_back_body">
 <div class="wraparea">
<h2><?php _e('Welcome To "Remove Yellow Background/Box".'); ?></h2>
<h3><?php _e('Fix the background color that sometimes AdSense ads have on wordpress websites/blog.'); ?></h3>
<h1>How to remove the (yellow) background from <a href="https://pakainfo.com/" target="_blank">AdSense ads</a>?</h1>
<table>
<tr>
	<td><h1>Before</h1></td>
	<td><h1>After</h1></td>
</tr>
<tr>
	<td>Why is there a background color?</td>
	<td>How to remove the background?</td>
</tr>
<tr>
	<td><img src="<?php echo $icon_url1;?>" alt="Smiley face" height="220" width="425"></td>
	<td><img src="<?php echo $icon_url2;?>" alt="Smiley face" height="220" width="425"></td>
</tr>
</table>
</div>
</div>
<script type="text/javascript">
  function copyToClipboard(element) {
        var $temp = jQuery("<input>");
        jQuery("body").append($temp);
        $temp.val(jQuery(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        alert('Copied to clipboard!');
      }
</script>
