<?php
// wp ajax
add_action('wp_ajax_nopriv_load_more', 'load_more');
add_action('wp_ajax_load_more', 'load_more');

function load_more()
{
    $nonce = $_POST['nonce'];
    if (!wp_verify_nonce($nonce, 'ajax-nonce')) {
        die('Busted!');
    }

    $paged = $_POST['page'];
    $cat = $_POST['cat'];
    $args = array(
        'posts_per_page' => 2,
        'paged' => $paged,
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
            get_template_part('template-parts/content', 'post');
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}
