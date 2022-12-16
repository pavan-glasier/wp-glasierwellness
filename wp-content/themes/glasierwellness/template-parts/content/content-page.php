<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

?>

<article id="scdasc post-<?php the_ID(); ?>" <?php post_class(); ?> style="display: none">

	<?php if (!is_front_page()) : ?>
		<header class="entry-header alignwide">
			<?php get_template_part('template-parts/header/entry-header'); ?>
			<?php glasier_wellness_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php elseif (has_post_thumbnail()) : ?>
		<header class="entry-header alignwide">
			<?php glasier_wellness_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'glasierwellness') . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__('Page %', 'glasierwellness'),
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer default-max-width">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					esc_html__('Edit %s', 'glasierwellness'),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article>
<!-- #post-<?php the_ID(); ?> -->





<div class="page-content">
	<!--section-->
	<div class="section mt-0">
		<div class="breadcrumbs-wrap">
			<div class="container">
				<div class="breadcrumbs">
					<a href="<?php echo site_url()?>">Home</a>
					<span><?php the_title()?></span>
				</div>
			</div>
		</div>
	</div>
	<!--//section-->
	<!--section-->
	<div class="section page-content-first">
		<div class="container">
			<div class="text-center mb-2  mb-md-3 mb-lg-4">
				<!-- <div class="h-sub theme-color">Our dentists working to your smile</div> -->
				<h1><?php the_title()?></h1>
				<div class="h-decor"></div>
			</div>
		</div>
		<div class="container">
			<div class="row">

				<div class="col-lg-12 mt-3 mb-3 mt-lg-0">
					<?php echo the_content()?>
				</div>
			</div>
		</div>
	</div>
	<!--//section-->
</div>