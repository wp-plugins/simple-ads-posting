<?php
# --------------------------------------- #
# prevent file from being accessed directly
# --------------------------------------- #
if ('simple-ads-admin.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Hi there!  I\'m just a plugin, not much I can do when called directly.');

	if ( !is_admin() ) {
      Die();
  }
  
?>

<?php
$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'home';  
?>


<h2 class="nav-tab-wrapper">
		<a href="?page=simple-ads-posting&tab=home" class="nav-tab <?php echo $active_tab == 'home' ? 'nav-tab-active' : ''; ?>"><?php echo __('Home','SAP') ?></a>
		<a href="?page=simple-ads-posting&tab=credit" class="nav-tab <?php echo $active_tab == 'credit' ? 'nav-tab-active' : ''; ?>"><?php echo __('Credit', 'SAP') ?></a>
</h2>


<div class="wrap">

		<?php
        if (! defined('SAP_PLUGIN_MAIN_PATH'))
        	define('SAP_PLUGIN_MAIN_PATH', plugin_dir_path( __FILE__ ));
            			
			if( $active_tab == 'home' ) {
				
                if (file_exists(SAP_PLUGIN_MAIN_PATH. 'simple-ads-main.php')) {
                  include_once(SAP_PLUGIN_MAIN_PATH. 'simple-ads-main.php');
                }
                else {
                  echo 'File is missing';  
                }
			} 
			
			
			if( $active_tab == 'credit' ) {

                if (file_exists(SAP_PLUGIN_MAIN_PATH. 'simple-ads-credit.php')) {
                  include_once(SAP_PLUGIN_MAIN_PATH. 'simple-ads-credit.php');
                }
                else {
                  echo 'File is missing';  
                }

			}

		?>

</div>