<?php	
# --------------------------------------- #
# prevent file from being accessed directly
# --------------------------------------- #
if ('simple-ads-main.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Hi there!  I\'m just a plugin, not much I can do when called directly.');

	if ( !is_admin() ) {
      Die();
	}
  

		$ads_cod = htmlentities(get_option('ads_code') != '') ? get_option('ads_code') : 'Put your ads code here';
		$ads_cod2 = htmlentities(get_option('ads_code2') != '') ? get_option('ads_code2') : 'Put your ads code here';
		
		$html = '</pre>
		<div class="wrap"><form action="options.php" method="post" name="options">
		'.'<h2>' . __('Simple Ads Setting Page!', 'SAP') . '</h2>' .'
		' . wp_nonce_field('update-options') . '
		'.'<h3>' . __('Put your ads code for ads number 1 here','SAP').'</h3>'.'
		<textarea name="ads_code" rows="9" cols="80">' . $ads_cod . '</textarea> 
		<br>
		'.'<h3>' . __('Put your ads code for ads number 2 here','SAP').'</h3>'.'
		<textarea name="ads_code2" rows="9" cols="80">' . $ads_cod2 . '</textarea> 
		 <input type="hidden" name="action" value="update" />

		 <input type="hidden" name="page_options" value="ads_code,ads_code2" />

		<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="'. __('Save Changes','SAP').'"  /></form></div>

		'.'<h3>'. __('How to use ?','SAP').'</h3>'.'
		'.__('<p><cite>just insert </cite> "<b>[ads]</b>" <cite>(without quote) in your post for ads number 1 or </cite> "<b>[ads2]</b>" <cite>(without quote) for ads number 2 in your post.</cite></p>','SAP').'
		';
		echo $html;
?>