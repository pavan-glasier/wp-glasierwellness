<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

?>




<div class="page-content">
	<!--section-->
	<div class="section mt-0">
		<div class="breadcrumbs-wrap">
			<div class="container">
				<div class="breadcrumbs">
					<a href="<?php echo site_url() ?>">Home</a>
					<?php
					printf(
						/* translators: %s: Search term. */
						esc_html__( 'Results for "%s"', 'glasierwellness' ),
						'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
					);
					?>
				</div>
			</div>
		</div>
	</div>
	<!--//section-->
	<!--section-->
	<div class="section bg-norepeat bg-right bg-md-none section-top-padding section-bottom-padding">
		<div class="container">
			<div class="title-wrap text-center">
				<h2 class="double-title double-title--center double-title--vcenter" data-title="<?php esc_html_e('Nothing Found', 'glasierwellness'); ?>">
					<span><?php esc_html_e('Nothing Found', 'glasierwellness'); ?></span>
				</h2>
				<div class="h-decor"></div>
				<?php if ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'glasierwellness' ); ?></p>
				<?php get_search_form(); ?>

				<?php else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'glasierwellness' ); ?></p>
				<?php get_search_form(); ?>

				<?php endif; ?>

				<a href="<?php echo site_url() ?>" class="btn">
					<i class="icon-right-arrow"></i>
					<span>Home</span>
					<i class="icon-right-arrow"></i>
				</a>
			</div>

		</div>
	</div>
	<!--//section-->
</div>
