<?php

/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage highen
 * @since Highen 1.0
 */

get_header(); ?>

<div class="page-content">
	<?php if (have_posts()) : ?>

		<?php the_post(); ?>

		<?php rewind_posts(); ?>



		<!--section-->
		<div class="section mt-0">
			<div class="breadcrumbs-wrap">
				<div class="container">
					<div class="d-flex align-items-center justify-content-between">
						<div class="breadcrumbs ">
							<a href="<?php echo site_url() ?>">Home</a>
							<?php printf(__('Author : %s', 'glasierwellness'), '<span>' . get_the_author() . '</span>'); ?>
						</div>

						<div class="card">
							<div class="pro-img">
								<?php
								$author_bio_avatar_size = apply_filters('highen_author_bio_avatar_size', 68);
								echo get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size);
								?>
							</div>
							<div class="details">
								<p><?php printf(__('%s', 'highen'), '<span class="vcard">' . get_the_author() . '</span>'); ?></p>
							</div>
						</div>
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
<?php get_footer(); ?>