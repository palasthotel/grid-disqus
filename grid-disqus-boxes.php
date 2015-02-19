<?php
/**
 * Plugin Name: Grid Disqus Boxes
 * Plugin URI: https://github.com/Palasthotel/grid-disqus-boxes
 * Description: Provides Disqus Boxes for Grid.
 * Version: 1.0
 * Author: PALASTHOTEL by Edward Bock <eb@palasthotel.de>
 * Author URI: http://www.palasthotel.de
 * Requires at least: 4.0
 * Tested up to: 4.1
 * License: http://www.gnu.org/licenses/gpl-2.0.html GPLv2
 * @copyright Copyright (c) 2015, PALASTHOTEL
 * @package Palasthotel\Grid-Disqus-Boxes
 */

add_action("grid_load_classes", "grid_disqus_boxes_load");

function grid_disqus_boxes_load(){
	require "boxes/grid-disqus-popular-box.inc";
}

add_filter("grid_templates_paths", "grid_disqus_boxes_tempaltes_path");
function grid_disqus_boxes_tempaltes_path($paths){
	$paths[] = dirname(__FILE__)."/templates";
	return $paths;
}

add_action("admin_menu", "grid_disqus_boxes_admin_menu");
function grid_disqus_boxes_admin_menu(){
	add_submenu_page( 'options-general.php', 'Grid Disqus Settings', 'Grid Disqus Settings', 'manage_options', 'grid-disqus-boxes-admin-menu', 'grid_disqus_boxes_admin_menu_page' );
}

function grid_disqus_boxes_admin_menu_page(){

	$api_key_name = "grid_disqus_api_key";
	$access_token_name = "grid_disqus_access_token";

	if(isset($_POST[$api_key_name]) && $_POST[$api_key_name] != ""
		&& isset($_POST[$access_token_name]) && $_POST[$access_token_name] != ""){
		
		update_site_option($api_key_name, sanitize_text_field($_POST[$api_key_name]) );
		update_site_option($access_token_name, sanitize_text_field($_POST[$access_token_name]) );

	}

	$api_key = get_site_option( $api_key_name, "" );
	$access_token = get_site_option( $access_token_name, "" ); 

	include dirname(__FILE__)."/grid-disqus-settings.tpl.php";
}

?>