<?php 
/*
Plugin Name: NowTalk
Plugin URI: http://www.nowtalk.com
Description: Plugin for adding NowTalk to your page
Author: Willow Hunt
Version: 1.0.2
Author URI: http://www.nowtalk.com
*/

/*
 * NowTalk Wordpress Plugin
 * Copyright Nowtalk 2014
 *
 * Echos nowtalk javascript into header with the options set
 */

function nowtalk_admin_actions() {
	add_options_page("NowTalk", "NowTalk", 1, "NowTalk", "nowtalk_admin");

}

//Sets up the admin options
function nowtalk_admin() {
	include('nowtalk_import.php');
}

//Echos the javascript in the header
function nowtalk_insert_widget() {
	$script = "<script type=\"text/javascript\">Nowtalk = []; Nowtalk.config = {running: true, fullscreen: false, session_id: 0, base_url: \"https://www.nowtalk.com\", widget_url: \"https://www.nowtalk.com/chat\", chat_id: \"".get_option('nowtalk_site_id') . "\", debug: false }; document.write(unescape(\"%3Cscript src='https://www.nowtalk.com/build/embed_nowtalk.min.js?' type='text/javascript'%3E%3C/script%3E\")); </script>";

	echo $script;
}

add_action('admin_menu', 'nowtalk_admin_actions');
add_action('wp_head', 'nowtalk_insert_widget');
?>
