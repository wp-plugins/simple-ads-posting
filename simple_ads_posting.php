<?php 
  /*
   Plugin Name: Simple Ads Post
   Plugin URI: http://r3m1ck.us/wordpress-plugin/simple-ads-post
   Description: a plugin to show ads of adsense, chitika ,etc then you can put it into anywhere in your posting as you wish :) 
   Version: 1.0.0
   Author: Rosdyana Kusuma
   Author URI: http://r3m1ck.us/
   License: GPL2
   */

// register the admin menu settings for plugin settings
add_action('admin_menu', 'simple_ads_admin_actions');

function simple_ads_admin_actions() {
    $page_title = 'Simple Ads Posting';
    $menu_title = 'Simple Ads Setting';
    $capability = 'manage_options';
    $menu_slug	= 'simple-ads-posting';
    $function 	= 'simple_ads_admin';
	
    add_options_page($page_title, $menu_title, $capability, $menu_slug, $function);
}
//

// add setting link in plugin page
add_filter('plugin_action_links', 'simple_ads_action_links', 10, 2);

function simple_ads_action_links($links, $file) {
    static $this_plugin;
	
    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }
	
    if ($file == $this_plugin) {
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=simple-ads-posting">Settings</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}
//

// show setting page for admin
function simple_ads_admin(){
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

	$ads_cod = htmlentities(get_option('ads_code') != '') ? get_option('ads_code') : 'Put your ads code here';
	$ads_cod2 = htmlentities(get_option('ads_code2') != '') ? get_option('ads_code2') : 'Put your ads code here';
	
    $html = '</pre>
<div class="wrap"><form action="options.php" method="post" name="options">
<h2>Simple Ads Setting Page</h2>
' . wp_nonce_field('update-options') . '
<h3>Put your ads code for ads number 1 here</h3>
<textarea name="ads_code" rows="9" cols="80">
' . $ads_cod . '
</textarea> 
<br>
<h3>Put your ads code for ads number 2 here</h3>
<textarea name="ads_code2" rows="9" cols="80">
' . $ads_cod2 . '
</textarea> 
 <input type="hidden" name="action" value="update" />

 <input type="hidden" name="page_options" value="ads_code,ads_code2" />

<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  /></form></div>

<h3>How to use ?</h3>
<p><cite>just insert </cite> "<b>[ads]</b>" <cite>(without quote) in your post for ads number 1 or </cite> "<b>[ads2]</b>" <cite>(without quote) for ads number 2 in your post.</cite></p>
<h3>Contact me</h3>
	<a href="mailto:admin@r3m1ck.us" target="_blank"><img src="' . plugins_url( 'images/email.png' , __FILE__ ) . '" alt="mail"/></a>
	<a href="https://plus.google.com/u/0/115883076446540246884/posts" target="_blank"><img src="' . plugins_url( 'images/gplus.png' , __FILE__ ) . '" alt="google"/></a>
	<a href="https://twitter.com/XremickX" target="_blank"><img src="' . plugins_url( 'images/twitter.png' , __FILE__ ) . '" alt="twitter"/></a>
<pre>
';
    echo $html;
}
//

// register the shortcode to wrap html around the content
function simple_ads_shortcode(){
	$get_cod = get_option('ads_code');
    return $get_cod;  
}
add_shortcode ('ads', 'simple_ads_shortcode');

function simple_ads_shortcode2(){
	$get_cod2 = get_option('ads_code2');
    return $get_cod2;  
}
add_shortcode ('ads2', 'simple_ads_shortcode2');
//

?>