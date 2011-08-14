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

function thcfg_admin_menu() {
	global $thcfg_pages;
	
	$titles = array(
		'colors' => 'Colors',
		'images' => 'Images',
		'contents' => 'Contents',
		'phrase' => 'Phrases'
	);
	if(get_option('thcfg_advanced', false)) {
		$titles['admin'] = 'Theme Configurator';
	}
	
	foreach($titles as $id => $title) {
		$handle = add_theme_page($title, $title, 'edit_theme_options', $id, 'thcfg_page_' . $id );
		$thcfg_pages[$id] = $handle;
		add_action('admin_head-' . $handle, 'thcfg_head_' . $id );
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
	if(!$thcfg_controller) {
		switch($id) {
			case 'colors':
				require_once(THCFG_PATH . '/Colors.php');
				$thcfg_controller = new Thcfg_Colors();
				break;
			case 'admin':
				require_once(THCFG_PATH . '/Admin.php');
				$thcfg_controller = new Thcfg_Admin();
				break;
		}
	}
	return $thcfg_controller;
}

function thcfg_page_admin() { $control = thcfg_controller('admin')->action(); }
function thcfg_page_colors() { $control = thcfg_controller('colors')->action(); }

function thcfg_head_admin() { $control = thcfg_controller('admin')->header(); }
function thcfg_head_colors() { $control = thcfg_controller('colors')->header(); }


?>