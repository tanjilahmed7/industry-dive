<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Industry_Dive
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<header>
			<div class="container">
				<div class="row align-items-center pb--15">
					<div class="col-4">
						<!-- search -->
						<div class="search">
							<!-- wordpress custom search -->
							<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
								<div class="input-group">
									<input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search …', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit">
											<i class="fas fa-search"></i>
										</button>
									</div>
								</div>
							</form>


						</div>
					</div>
					<div class="col-4">
						<!-- logo -->
						<div class="logo">
							<h2>
								<a href="<?php echo home_url('/') ?>">
									<?php
									if (has_custom_logo()) {
										the_custom_logo();
									} else {
										echo bloginfo('name');
									}
									?>
								</a>
							</h2>
							<span>
								<?php echo bloginfo('description'); ?>
							</span>
						</div>
					</div>
					<div class="col-4">
						<button class="btn btn-primary">
							<i class="fas fa-envelope"></i>
							Subscripe
						</button>
					</div>
				</div>
				<!-- navigation -->
				<nav class="navbar">
					<div id="navbarNav">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'navbar-nav d-flex justify-content-center',
							)
						);
						?>
					</div>
				</nav>
			</div>
		</header>