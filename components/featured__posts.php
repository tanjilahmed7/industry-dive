<?php
$data = getData();
// get latest 3 posts
$latest_posts = new WP_Query(array(
    'posts_per_page' => 2,
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'cat' => $data['selected_ids']

));

// get latest 1 post but check $latest_posts item doesnt show
$latest_post = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => array($latest_posts->posts[0]->ID, $latest_posts->posts[1]->ID),
    'cat' => $data['selected_ids']
));

?>

<section class="featured__posts featured">
    <div class="container">
        <div class="wrapper">
            <div class="row">
                <!-- query -->
                <?php if ($latest_posts->have_posts()) : ?>
                    <div class="col-6">
                        <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                            <div class="item">
                                <!-- check thumb  -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" />
                                <?php endif; ?>


                                <div class="content">
                                    <span class="tag">Featured | <?php echo get_the_category()[0]->cat_name; ?></span>
                                    <h2><?php echo get_the_title(); ?></h2>
                                    <div class="bottom">
                                        <span><?php echo reading_time(get_the_ID()); ?> | </span>
                                        <a href="<?php echo get_the_permalink(); ?>">Read More
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

                <?php if ($latest_post->have_posts()) : ?>
                    <div class="col-6">
                        <?php while ($latest_post->have_posts()) : $latest_post->the_post(); ?>
                            <div class="item full">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                                <div class="content">
                                    <span class="tag">Featured | <?php echo get_the_category()[0]->cat_name; ?></span>
                                    <h2><?php echo get_the_title(); ?></h2>
                                    <div class="bottom">
                                        <span><?php echo reading_time(get_the_ID()); ?> | </span>
                                        <a href="<?php echo get_the_permalink(); ?>">Read More
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>