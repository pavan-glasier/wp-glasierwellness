<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage highen
 * @since Highen 1.0
 */
get_header(); ?>
<div class="page-content">
	<?php if ( have_posts() ) : ?>

	<!--section-->
	<div class="section mt-0">
		<div class="breadcrumbs-wrap">
			<div class="container">
				<div class="breadcrumbs">
					<a href="<?php echo site_url()?>">Home</a>
					<?php printf( __( 'Category : %s', 'highen' ), '<span>' . single_tag_title( '', false ) . '</span>' );?>
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
                while ( have_posts() ) :
					the_post();
					?>
                    <?php get_template_part('blogs/blog-list'); ?>
                <?php endwhile; wp_reset_postdata();
                ?>
			</div>
			<div class="clearfix"></div>
			<?php glasierwellness_pagination(); ?>
		</div>
	</div>
   	
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

</div>
<!--//section-->

<?php get_footer(); ?>
