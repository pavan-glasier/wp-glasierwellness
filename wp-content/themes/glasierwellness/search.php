<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

get_header();

if ( have_posts() ) {
	?>


<div class="page-content">
    <!--section-->
    <div class="section mt-0">
        <div class="breadcrumbs-wrap">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="<?php echo site_url(); ?>">Home</a>
                    <span>
						<span class="highlight">
							<?php
								printf(
									esc_html(
										/* translators: %d: The number of search results. */
										_n(
											'%d',
											'%d',
											(int) $wp_query->found_posts,
											'glasierwellness'
										)

									),
									(int) $wp_query->found_posts
								);
								?>
							</span>
						<?php
						printf(
							/* translators: %s: Search term. */
							esc_html__( '&nbsp; Results for "%s"', 'glasierwellness' ),
							'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
						);
						?>
					</span>
					
                </div>
            </div>
        </div>
    </div>
    <!--//section-->
    <!--section-->
    <div class="section page-content-first">

        <div class="container mt-3 mb-lg-5 mt-lg-5">
            <div class="row">
                
					<?php 
						// Start the Loop.
						while ( have_posts() ) {
							the_post();

							// get_template_part( 'template-parts/content/content-excerpt', get_post_format() );
							?>
							<div class="col-md-3 col-lg-3">
								<div class="search-post">
								<span class="badges"><?php echo get_post_type( get_the_ID());?></span>
									<h5>
										<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
									</h5>
									
								</div>
							</div>
							<?php } ?>
						
                    

                    <div class="clearfix"></div>
					
            </div>
			<div class="paginations">
				<?php glasier_wellness_the_posts_navigation();?>
			</div>
        </div>
    </div>
</div>
	<?php
} else {
	get_template_part( 'template-parts/content/content-none' );
}

get_footer();
