<?php
$data = getData();

// get latest 3 posts
$latest_posts = new WP_Query(array(
    'posts_per_page' => 2,
    'post_type' => 'post',
    // 'meta_key'       => 'post_views_count', when will single post show then comment this line and uncomment below line
    // 'orderby'        => 'meta_value_num', 'post_views_count', when will single post show then comment this line and uncomment below line
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
));

// get latest 1 post but check $latest_posts item doesnt show
$latest_post = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'post_status' => 'publish',
    // 'meta_key'       => 'post_views_count',
    // 'orderby'        => 'meta_value_num',
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => array($latest_posts->posts[0]->ID, $latest_posts->posts[1]->ID)
));

// trending posts show



?>

<section class="featured__posts trending">
    <div class="container">
        <h2><?php echo $data['title'] ?></h2>
        <div class="wrapper">
            <div class="row">

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
                <?php if ($latest_posts->have_posts()) : ?>
                    <div class="col-6">
                        <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                            <div class="item">
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
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>