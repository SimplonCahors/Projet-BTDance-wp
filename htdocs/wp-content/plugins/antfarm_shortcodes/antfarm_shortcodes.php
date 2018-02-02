<?php

/*
Plugin Name: Antfarm Shortcodes
Plugin URI:
Description: Visual Composer extra elements for Antfarm themes.
Author: ant_farm
Author URI: http://digitalzoomstudio.net
Version: 1.01
*/

include_once(dirname(__FILE__).'/antfarm_functions.php');
include_once(dirname(__FILE__).'/class-antfarm_shortcodes.php');





define("ANTFARM_VERSION", "1.01");

$antfarm = new AntFarm();
register_activation_hook( __FILE__, array($antfarm, 'handle_plugin_activate') );
register_deactivation_hook( __FILE__, array($antfarm, 'handle_plugin_deactivate'));
