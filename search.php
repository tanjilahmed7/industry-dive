<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Industry_Dive
 */

get_header();
?>

<section class="featured__posts latest">
	<div class="container">
		<h2>Search result...
			<!-- get seatch query -->
			<?php echo get_search_query(); ?>
		</h2>
		<div class="wrapper">
			<div class="row">
				<?php if (have_posts()) : ?>
					<?php
					/* Start the Loop */
					while (have_posts()) :
						the_post();
					?>
						<?php get_template_part('template-parts/content', 'post'); ?>
					<?php endwhile; ?>
				<?php else : ?>
					<?php get_template_part('template-parts/content', 'none'); ?>
				<?php endif; ?>
			</div>
		</div>
		<!-- add load more button -->
		<div class="load-more d-flex justify-content-center">
			<button class="btn btn-primary load-more-btn" data-page="1">Load More</button>
		</div>
	</div>
</section>
<?php
get_footer();
