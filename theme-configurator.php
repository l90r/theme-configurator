<?php
/*
Plugin Name: Theme Configurator
Plugin URI: http://www.l90r.com/posts/wordpress-theme-configurator
Description: The most elegant way to add a settings screen to your theme
Version: 0.1
Author: Igor Prochazka
Author URI: http://www.l90r.com/

---------------------------------------------------------------------
    This file is part of the wordpress plugin "Theme Configurator"
    Copyright (C) 2009 by Igor Prochazka

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

---------------------------------------------------------------------
*/

/* register hooks */

add_action('admin_menu', 'thcfg_admin_menu' );
add_action('admin_init', 'thcfg_admin_init');
add_action('admin_enqueue_scripts', 'thcfg_enqueue');

define('THCFG_PATH', dirname(__FILE__));
define('THCFG_URL', plugins_url() . '/' . basename(dirname(__FILE__)));

global $thcfg_pages;

function thcfg_request($name) {
	return stripslashes_deep($_REQUEST[$name]);
}

function thcfg_request_encoded($name) {
	$code = thcfg_request($name);
	if($code) {
		return json_decode($code);
	} else {
		return null;
	}
}

function thcfg_request_array($name) {
	$arr = thcfg_request($name);
	if(!$arr) {
		$arr = array();
	}
	return $arr;
}

function thcfg_get_option($name, $default) {
	return get_option($name, $default);
}

function thcfg_add_option($name, $value) {
	return add_option($name, $value);
}

function thcfg_admin_menu() {
	global $thcfg_pages;
	require_once('Model.php');
	
	$titles = array(
		'color' => 'Colors',
		'images' => 'Images',
		'text' => 'Text',
		'dimension' => 'Dimensions',
		'admin' => 'Theme Configurator'
	);

	$model = new Model();
	$screens = $model->getScreens();
	if(get_option('thcfg_advanced', false)) {
		$screens[] = 'admin';
	}
	
	$thcfg_pages = array();
	foreach($titles as $id => $title) {
		if(in_array($id, $screens)) {
			$handle = add_theme_page($title, $title, 'edit_theme_options', $id, 'thcfg_page_' . $id );
			$thcfg_pages[$id] = $handle;
			add_action('admin_head-' . $handle, 'thcfg_head_' . $id );
		}
	}
}

function thcfg_enqueue($hook) {
	global $thcfg_pages;

	if($id = array_search($hook, $thcfg_pages)) {
		$control = thcfg_controller($id);
	    $control->queue();
	}
}

function thcfg_admin_init() {
 	add_settings_field('thcfg_advanced', 'Theme Configurator Advanced Mode', 'thcfg_settings_cb', 'general');
 	register_setting('general','thcfg_advanced');
}

function thcfg_settings_cb() {
	echo '<input name="thcfg_advanced" id="thcfg_advanced" type="checkbox" value="1" class="code" '
	. checked( 1, get_option('thcfg_advanced'), false ) . ' /> Show advanced Theme Configurator options (for theme developers)';
	
}

function thcfg_controller($id) {
	static $thcfg_controller = null;
	$valid = array('admin', 'color', 'dimension', 'text');
	if(!$thcfg_controller) {
		if(in_array($id, $valid)) {
			$file = THCFG_PATH . '/' . ucwords($id) . '.php';
			$class = 'Thcfg_' . ucwords($id);
			require_once($file);
			$thcfg_controller = new $class();
		}
	}
	return $thcfg_controller;
}

function thcfg_page_admin() { $control = thcfg_controller('admin')->displayBody(); }
function thcfg_page_color() { $control = thcfg_controller('colors')->displayBody(); }

function thcfg_head_admin() { $control = thcfg_controller('admin')->displayHead(); }
function thcfg_head_color() { $control = thcfg_controller('colors')->displayHead(); }


?>