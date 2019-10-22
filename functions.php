<?php

// die('this die message comes from functions.php');

function addCustomThemeFiles(){
	// when we enqueue a style, we put it into the queue of assets to be rendered
	// this function takes five options: a (unique) handle for the style, a directory location (get_template_directory + 'string'), any relevant dependencies (as an array), ...
	// the version number (which really ought to be the same version no. as the project), ...
	// and which media types we want to render the stylsheet (e.g. 'print', 'screen', 'all')
	wp_enqueue_style('bootstrapCSS', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), '4.3.1', 'all');
	wp_enqueue_style('customCSS', get_template_directory_uri() . '/assets/css/style.css', array(), '0.0.1', 'all');

	wp_enqueue_script('jquery');
	wp_enqueue_script('popperJS', get_template_directory_uri() . '/node_modules/popper.js/dist/umd/popper.js', array(), '1.16.0', true);
	wp_enqueue_script('bootstrapJS', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', array('jquery', 'popper'), '4.3.1', true);
	wp_enqueue_script('customJS', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '0.0.1', true);
};

add_action('wp_enqueue_scripts', 'addCustomThemeFiles');	// takes two values - a queue, and an enqueue function
// wp_enqueue_scripts() is part of wp_head()

add_theme_support('post-thumbnails');

add_image_size('Very Small Thumbail', 100, 100, true);

// menus!
function addCustomMenu1902(){
	add_theme_support('menus');	// turning on theme support for menus

	// register_nav_menu('primary', 'Primary Menu'); -- sets up the menu as a navbar (primary) menu
	// register_nav_menu('primary', __('Primary Menu', 'theme-text-domain'));
	// Primary Menu is what we'll index this menu by; theme-text-domain comes from style.css ...
	// ... (Text Domain: 1902Custom). Because people might install a new menu called 'primary', and our ...
	// ... menu will persist in their database persist in their database, we might want to give it a unique identifier

	register_nav_menu('top_navigation', __('Hello, world! This is the navbar that will go at the top of the page', '1902Custom'));
	// having done this, we can put wp_nav_menu into our front-end pages.
}

add_action('after_setup_theme', 'addCustomMenu1902');
