<?php

/**
 * Enqueue scripts and styles.
 */
function industry_dive_scripts()
{
    wp_enqueue_style('fontawesome', get_theme_file_uri() . '/assets/css/all.min.css', array(), _S_VERSION);
    wp_enqueue_style('swiper', get_theme_file_uri() . '/assets/css/swiper.min.css', array(), _S_VERSION);
    wp_enqueue_style('styles', get_theme_file_uri() . '/assets/css/style.css', array(), _S_VERSION);

    wp_enqueue_style('industry-dive-style', get_stylesheet_uri(), array(), _S_VERSION);

    wp_register_script('fontawesome-js', get_theme_file_uri() . '/assets/js/all.min.js', array('jquery'), _S_VERSION, true);

    wp_register_script('swiper-js', get_theme_file_uri() . '/assets/js/swiper.min.js', array('jquery'), _S_VERSION, true);

    // add theme js
    wp_register_script('theme-js', get_theme_file_uri() . '/assets/js/theme.js', array('jquery'), _S_VERSION, true);


    wp_enqueue_script('fontawesome-js');
    wp_enqueue_script('swiper-js');
    wp_enqueue_script('theme-js');

    // wp localize scripts
    wp_localize_script('theme-js', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'industry_dive_scripts');
