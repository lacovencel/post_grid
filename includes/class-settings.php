<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

class class_post_grid_settings{

	public function __construct(){
		
		add_action('admin_menu', array( $this, 'post_grid_menu_init' ));
		
		}


	public function license(){
		include('menu/license.php');	
	}
	
	public function settings(){
		include('menu/settings.php');	
	}
	public function help(){
		include('menu/help.php');	
	}	
	
	
	public function layout_editor(){
		include('menu/layout-editor.php');	
	}	
	
	
	
	public function post_grid_menu_init() {
		
		add_submenu_page('edit.php?post_type=post_grid', __('Layout Editor', post_grid_textdomain), __('Layout Editor', post_grid_textdomain), 'manage_options', 'layout_editor', array( $this, 'layout_editor' ));
		
		add_submenu_page('edit.php?post_type=post_grid', __('Settings', post_grid_textdomain), __('Settings', post_grid_textdomain), 'manage_options', 'settings', array( $this, 'settings' ));	
		add_submenu_page('edit.php?post_type=post_grid', __('Help', post_grid_textdomain), __('Help', post_grid_textdomain), 'manage_options', 'help', array( $this, 'help' ));		
		add_submenu_page('edit.php?post_type=post_grid', __('License', post_grid_textdomain), __('License', post_grid_textdomain), 'manage_options', 'license', array( $this, 'license' ));	
		
			
	
	}



	
}
	
new class_post_grid_settings();