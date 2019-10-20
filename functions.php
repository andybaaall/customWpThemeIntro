<?php

// die('this die message comes from functions.php');

function addCustomThemeStyles(){
	// when we enqueue a style, we put it into the queue of assets to be rendered
	// this function takes five options: a name for the style, a directory location (get_template_directory + 'string'), any relevant dependencies (as an array), ...
	// the version number (which really ought to be the same version no. as the project), ...
	// and which media types we want to render the stylsheet (e.g. 'print', 'screen', 'all')

	wp_enqueue_style('customCSS', get_template_directory_uri() . '/assets/css/style.css', array(), '0.0.1', 'all');
};

add_action('wp_enqueue_scripts', 'addCustomThemeStyles');	// takes two values - a queue, and an enqueue function
// wp_enqueue_scripts() is part of wp_head()

// that easy! WP is automated and user-friendly 
