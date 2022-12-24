<?php
$data = getData();
?>

<section class="hero">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if (isset($data['slider_items'])) : ?>
                <?php foreach ($data['slider_items'] as $item) : ?>
                    <div class="swiper-slide">
                        <div class="slide-image">
                            <?php
                            $image = wp_get_attachment_image_src($item['bg_image'], 'full');
                            echo '<img src="' . $image[0] . '" alt=""/>';
                            ?>
                        </div>
                        <div class="hero-content">
                            <span class="tag">
                                Featured |
                                <?php
                                // get category name of the post id
                                $category = get_the_category($item['selected_ids']);
                                echo $category[0]->cat_name;
                                ?></span>
                            <h1>
                                <?php
                                // get post title of the post id
                                $post = get_post($item['selected_ids']);
                                echo $post->post_title;
                                ?>
                            </h1>
                            <p>
                                <?php
                                // get post excerpt of the post id
                                $post = get_post($item['selected_ids']);
                                echo $post->post_excerpt;
                                ?>
                            </p>
                            <div class="bottom">
                                <span><?php echo reading_time($item['selected_ids']); ?> | </span>
                                <a href="<?php
                                            // get post link of the post id
                                            $post = get_post($item['selected_ids']);
                                            echo $post->guid;
                                            ?>">Read More
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="swiper-button-prev">
            <i class="fas fa-arrow-left"></i>
        </div>
    </div>
</section>