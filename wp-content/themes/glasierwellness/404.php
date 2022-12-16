<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

get_header();
?>
<?php //get_search_form(); 
?>

<div class="page-content">
	<!--section-->
	<div class="section mt-0">
		<div class="breadcrumbs-wrap">
			<div class="container">
				<div class="breadcrumbs">
					<a href="<?php echo site_url() ?>">Home</a>
					<span>404</span>
				</div>
			</div>
		</div>
	</div>
	<!--//section-->
	<!--section-->
	<div class="section bg-norepeat bg-right bg-md-none section-top-padding section-bottom-padding">
		<div class="container">
			<div class="title-wrap text-center">
				<h2 class="double-title double-title--center double-title--vcenter" data-title="<?php esc_html_e('Nothing here', 'glasierwellness'); ?>">
					<span><?php esc_html_e('404', 'glasierwellness'); ?></span>
				</h2>
				<div class="h-decor"></div>
				<p style="position: relative;margin-top: 20px;"><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'glasierwellness'); ?></p>
				<?php get_search_form(); ?>
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







<?php
get_footer();
