<?php

/**
 * Industry Dive functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Industry_Dive
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

define('THEMEROOT', get_stylesheet_directory_uri());
define('IMG', THEMEROOT . '/images');
define('JS', THEMEROOT . '/js');
define('CSS', THEMEROOT . '/css');

$attire_includes = array(
	'/theme-setup.php',                  	// Initialize theme default settings.	
	'/setup.php',                           // Theme setup and custom theme supports.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/gutenberg-blocks.php',				// Gutenberg blocks
	'/ajax-load-more.php'
);


function get_post_arr($pType)
{
	$output = ['0' => "None"];
	$games = get_posts(['post_type' => $pType, 'posts_per_page' => -1,]);
	foreach ($games as $game) {
		$output[$game->ID] = $game->post_title;
	}
	return $output;
}

function get_post_cat_arr($pType)
{
	// get post all category list
	$categories = get_categories(array(
		'type'         => $pType,
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'taxonomy'     => 'category',
		'pad_counts'   => false,
	));
	$output = ['0' => "None"];
	foreach ($categories as $category) {
		$output[$category->term_id] = $category->name;
	}
	return $output;
}

foreach ($attire_includes as $file) {
	require_once get_template_directory() . '/inc' . $file;
}


function getData()
{
	return get_query_var('component_data', []);
}

function setData($data)
{
	return set_query_var('component_data', $data);
}


// post content time read
function reading_time($id)
{
	$content = get_post_field('post_content', $id);
	$word_count = str_word_count(strip_tags($content));
	$readingtime = ceil($word_count / 200);
	if ($readingtime == 1) {
		$timer = " minute";
	} else {
		$timer = " minutes";
	}
	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}
