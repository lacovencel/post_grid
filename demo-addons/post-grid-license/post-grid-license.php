<?php
/*
Plugin Name: Post Grid - License
Plugin URI: http://paratheme.com/
Description: License activation for "Post Grid"
Version: 1.0.0
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright: 	2016 pickplugins

*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


register_activation_hook(__FILE__, 'post_grid_activation_license');


function post_grid_activation_license()
	{

		update_option('post_grid_license_key', 'cb27da484195946a61144bfdebeddd6b'); //update plugin license.

		
	}
	
	
	
