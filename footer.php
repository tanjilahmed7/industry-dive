	<footer>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<!-- menu -->
					<div class="menu">
						<?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
					</div>
				</div>
				<div class="col-6">
					<div class="subscriper">
						<h4>Subscribe to our newsletter</h4>
						<div class="input-group-append">
							<button class="btn btn-primary">Subscribe</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	</div><!-- #page -->

	<?php wp_footer(); ?>

	</body>

	</html>