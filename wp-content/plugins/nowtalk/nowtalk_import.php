<?php   

/*
 * NowTalk Wordpress Plugin
 * Copyright Nowtalk 2013
 * 
 * Current supporting the following options:
 * 		The site id given to you
 */

if ($_POST['nowtalk_hidden'] == 'Y') {
	//Check form data
	
	$site_id = "";

	if (isset($_POST['site_id']) &&
	!empty($_POST['site_id'])) {
		$site_id = $_POST['site_id'];
	}
	update_option('nowtalk_site_id', $site_id);


	?>

<div class="updated">
	<p>
		<strong><?php _e('Options saved.' ); ?> </strong>
	</p>
</div>
<?php
}
?>
<div class="wrap">
	<?php  echo "<h2>" . __( 'NowTalk Options', 'nowtalk_trdom' ) . "</h2>"; ?>
	<form name="nowtalk_form" method="post"
		action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="nowtalk_hidden" value="Y">
		<?php    echo "<h4>" . __( 'Widget Settings', 'nowtalk_trdom' ) . "</h4>"; ?>
		<p>
			<?php _e("Site Id: " ); ?>
			<input type="text" name="site_id"
				value="<?php echo get_option('nowtalk_site_id'); ?>" size="28">
			<?php _e(" ex: abc123" ); ?>
		</p>
	<?php submit_button(); ?>
	</form>
</div>

