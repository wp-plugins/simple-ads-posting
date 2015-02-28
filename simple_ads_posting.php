<?php 
  /*
   Plugin Name: Simple Ads Post
   Plugin URI: http://wordpress.org/plugins/simple-ads-posting
   Description: a plugin to show ads of adsense, chitika ,etc then you can put it into anywhere in your posting as you wish :) 
   Version: 1.0.6
   Author: Rosdyana Kusuma
   Author URI: http://r3m1ck.us/about
   License: GPL2
   Domain Path: /languages/
   */

	if ( !function_exists( 'add_action' ) ) {
		echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
		exit;
	}

	add_action('init', 'simple_ads_init');
	//init
	function simple_ads_init() {
		// Localization
		load_plugin_textdomain('SAP', false, dirname(plugin_basename(__FILE__)) . '/languages/');
	}

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
		include_once( 'simple-ads-admin.php' );
	}
	//

	// register the shortcode to wrap html around the content
	add_action('init', 'add_simple_ads_shortcode', 99);
	function add_simple_ads_shortcode(){
		add_shortcode ('ads', 'simple_ads_shortcode');
	}
	function simple_ads_shortcode($attr){
		$get_cod = get_option('ads_code');
		return $get_cod;  
	}
	
	add_action('init', 'add_simple_ads_shortcode2', 98);
	function add_simple_ads_shortcode2(){
		add_shortcode ('ads2', 'simple_ads_shortcode2');
	}
	function simple_ads_shortcode2(){
		$get_cod2 = get_option('ads_code2');
		return $get_cod2;  
	}
	//

?>