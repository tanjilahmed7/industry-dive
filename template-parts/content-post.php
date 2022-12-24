<div class="col-4">
    <div class="item">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" />
        <?php endif; ?> <div class="content">
            <span class="tag">Featured | <?php echo get_the_category()[0]->cat_name ?? ''; ?></span>
            <h2><?php echo get_the_title(); ?></h2>
            <div class="bottom">
                <span><?php echo reading_time(get_the_ID()); ?> | </span>
                <a href="<?php echo get_the_permalink(); ?>">Read More
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>