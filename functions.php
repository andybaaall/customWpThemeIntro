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
	wp_enqueue_script('bootstrapJS', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', array('jquery', 'popperJS'), '4.3.1', true);
	wp_enqueue_script('customJS', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '0.0.1', true);
};

add_action('wp_enqueue_scripts', 'addCustomThemeFiles');	// takes two values - a queue, and an enqueue function
// wp_enqueue_scripts() is part of wp_head()

add_theme_support('post-thumbnails', array('post', 'movie'));

add_image_size('Very Small Thumbail', 100, 100, true);

// menus!
function addCustomMenu1902(){
	add_theme_support('menus');	// turning on theme support for menus

	// register_nav_menu('primary', 'Primary Menu'); -- sets up the menu as a navbar (primary) menu
	// register_nav_menu('primary', __('Primary Menu', 'theme-text-domain'));
	// Primary Menu is what we'll index this menu by; theme-text-domain comes from style.css ...
	// ... (Text Domain: 1902Custom). Because people might install a new menu called 'primary', and our ...
	// ... menu will persist in their database persist in their database, we might want to give it a unique identifier

	register_nav_menu('top_navigation', __('This is the navbar that will go on the top of the page', '1902Custom'));
	register_nav_menu('sidebar_navigation', __('This is the navbar that will go on the left of the page', '1902Custom'));
	register_nav_menu('bottom_navigation', __('This is the navbar that will go on the bottom of the page', '1902Custom'));
	// having done this, we can put wp_nav_menu into our front-end pages.
}

add_action('after_setup_theme', 'addCustomMenu1902');

// bootstrap walker
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

// custom header options
$customHeaderDefaults = array(
	'default-image'          => get_template_directory_uri() . '/assets/images/RAVENING-HI-RES.jpg',
    'width'                  => 1280,
    'height'                 => 720,		// setting w & h allows cropping that preserves aspect ratio
);
add_theme_support('custom-header', $customHeaderDefaults);

	// default image for custom header
	register_default_headers( array(
	    'defaultImage' => array(
	        'url'           => get_template_directory_uri() . '/assets/images/RAVENING-HI-RES.jpg',
	        'thumbnail_url' => get_template_directory_uri() . '/assets/images/RAVENING-HI-RES.jpg',
	        'description'   => __( 'Default header image', '1902Custom' )
	    )
	) );

// gutenberg support
add_theme_support('wp-block-styles');

// post formats support - these show up in the post editor under status & visibility.
add_theme_support('post-formats', array('video', 'audio', 'image', 'gallery'));

// adding custom post types
function add_custom_post_types(){
	$args = array(
		'labels' => array(
			'name' => 'Movies',
			'singular_name' => 'Movie',
			'add_new_item' => 'Add a new movie :^)',

		),
		'description' => 'A list of movies we\'ve blogged about',
		'public' => true,
		'hierarchical' => true,
		'show_in_nav_menus' => false,
		'show_in_rest' => true,	// Gutenberg uses an API, so we need this to be 'true' to access Gutenberg
		'mene_position' => 6, // https://developer.wordpress.org/reference/functions/add_menu_page/#menu-structure
		'menu_icon' => 'dashicons-tickets-alt', // https://developer.wordpress.org/resource/dashicons/
		'supports' => array(	// this is an alias for add_post_type_support()
			'title',
			'editor',
			'thumbnail',
			'post-formats'
		),
		'delete_with_user' => false
		// https://wordpress.stackexchange.com/questions/247328/change-custom-post-type-slug for changing the slug
		// looks like a lot of stuff in WP happens by applying filters!
	);
	register_post_type('movie', $args);	// steer well clear of using plural names when you set these up
}

add_action('init', 'add_custom_post_types'); // post types must be added after init. More abt this in dev handbook.

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/custom-fields.php';
