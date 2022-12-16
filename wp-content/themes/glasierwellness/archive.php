<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

get_header();

?>

<?php if ($post->post_type == 'products') { ?>

	<?php get_template_part('products/category-page'); ?>

<?php } else { ?>


	<div class="page-content">
		<?php if (have_posts()) : ?>
			<!--section-->
			<div class="section mt-0">
				<div class="breadcrumbs-wrap">
					<div class="container">
						<div class="breadcrumbs">
							<a href="<?php echo site_url() ?>">Home</a>
							<?php
							if (is_day()) {
								/* translators: %s: Date. */
								printf(__('Daily Archives: %s', 'highen'), '<span>' . get_the_date() . '</span>');
							} elseif (is_month()) {
								/* translators: %s: Date. */
								printf(__('Monthly Archives: %s', 'highen'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'highen')) . '</span>');
							} elseif (is_year()) {
								/* translators: %s: Date. */
								printf(__('Yearly Archives: %s', 'highen'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'highen')) . '</span>');
							} else {
								_e('Archives', 'highen');
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<!--//section-->
			<!--section-->
			<div class="section page-content-first">
				<div class="container">
					<div class="text-center mb-2  mb-md-3 mb-lg-4">
						<h1>Blog Post</h1>
						<div class="h-decor"></div>
					</div>
				</div>
				<div class="container">
					<div class="row blog-isotope">

						<?php
						while (have_posts()) :
							the_post();
						?>
							<?php get_template_part('blogs/blog-list'); ?>
						<?php endwhile;
						wp_reset_postdata();
						?>
					</div>
					<div class="clearfix"></div>
					<?php glasierwellness_pagination(); ?>
				</div>
			</div>

		<?php else : ?>
			<?php get_template_part('content', 'none'); ?>
		<?php endif; ?>

	</div>
	<!--//section-->

<?php } ?>







<?php get_footer(); ?>