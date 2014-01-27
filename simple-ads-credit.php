<?php
# --------------------------------------- #
# prevent file from being accessed directly
# --------------------------------------- #
if ('simple-ads-credit.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Hi there!  I\'m just a plugin, not much I can do when called directly.');

	if ( !is_admin() ) {
      Die();
	}
	
	
	$html = '
		<h3>'.__('Credit','SAP').'</h3>'.'
		<p>'. __('Simple-Ads-Posting is one of my utility for my own project. I using this plugin to manage ads from Google Adsense or Chitika. Long time ago I usually modify my theme to adding ads, then I think with a plugin will be easier to manage the ads. Someday my friend ask me to relase this plugin, and maybe you need this to helps you. I am personally thanking all of the users who use this plugin. Also thanks to all of the translators and the generous people who have donated for this project', 'SAP').'</p>
		<br />	
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
			">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/id_ID/i/scr/pixel.gif" width="1" height="1">
		</form>
		<br />
		<br />	
		
		<h3>'.__('Translator','SAP').'</h3>'.'
		<p><a href="http://www.webhostinghub.com/index-c.html?utm_expid=31925339-46.KEGZK8A6Q3yfZW0EUfEw5Q.1" target="_blank">'.__('Spanish Translator - Maria Ramos' ,'SAP') .'</a></p>
		<p><a href="http://r3m1ck.us" target="_blank">'.__('Indonesian Translator - Rosdyana Kusuma' ,'SAP') .'</a></p>
		<p><a href="http://r3m1ck.us" target="_blank">'.__('Javanese Translator - Rosdyana Kusuma' ,'SAP') .'</a></p>

		<b><a href="'. plugins_url( 'languages/SAP-en.po' , __FILE__ ) .'" target="_blank" title="">'.__('Download .POT File to translate','SAP') .'</a> | '. __('Email your translations to','SAP') .' <a href="mailto:admin@r3m1ck.us">admin@r3m1ck.us</a></b>
		<br />
		<br />	
			
		<h3>'.__('Contact me','SAP').'</h3>'.'
		<a href="mailto:admin@r3m1ck.us" target="_blank"><img src="' . plugins_url( 'images/email.png' , __FILE__ ) . '" alt="mail"/></a>
		<a href="https://plus.google.com/u/0/115883076446540246884/posts" target="_blank"><img src="' . plugins_url( 'images/gplus.png' , __FILE__ ) . '" alt="google"/></a>
		<a href="https://twitter.com/XremickX" target="_blank"><img src="' . plugins_url( 'images/twitter.png' , __FILE__ ) . '" alt="twitter"/></a>';
		
	echo $html;


?>