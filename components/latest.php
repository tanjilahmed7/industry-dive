<?php
$data = getData();
// latest posts query
$latest_posts = new WP_Query(array(
    'posts_per_page' => 2,
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
));
?>
<section class="featured__posts latest">
    <div class="container">
        <h2><?php echo $data['title'] ?></h2>
        <div class="wrapper">
            <div class="row">
                <?php if ($latest_posts->have_posts()) : ?>
                    <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                        <?php get_template_part('template-parts/content', 'post'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- add load more button -->
        <div class="load-more d-flex justify-content-center">
            <button class="btn btn-primary load-more-btn" data-page="1">Load More</button>
        </div>
    </div>
</section>