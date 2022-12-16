
<div class="page-content">
	<!--section-->
	<div class="section mt-0">
		<div class="breadcrumbs-wrap">
			<div class="container">
				<div class="breadcrumbs">
					<a href="<?php echo site_url()?>">Home</a>
					<span><?php the_archive_title();?></span>
                    <?php 
                        $category = get_queried_object();
                        $cat_ID = $category->term_id;
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
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $blog = new WP_Query(array('post_type' => 'post', 'cat' => $cat_ID, 'posts_per_page' => 9, 'order' => 'DESC', 'paged' => $paged));
                $a = 1;
                $b = 1;
                ?>
                <?php
                while ($blog->have_posts()) : $blog->the_post(); ?>
                    <?php get_template_part('blogs/blog-list'); ?>
                <?php endwhile; wp_reset_postdata();
                ?>
			</div>
			<div class="clearfix"></div>
			<?php cpt_pagination($blog->max_num_pages); ?>
		</div>
	</div>
</div>
<!--//section-->
