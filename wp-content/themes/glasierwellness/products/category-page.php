<div class="page-content">
    <!--section-->
    <div class="section mt-0">
        <div class="breadcrumbs-wrap">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="<?php echo site_url();?>">Home</a>
                    <span><?php the_archive_title();?></span>
                    <?php
                    $category = get_queried_object();
                   $cat_ID = $category->term_id;
                   $cat_name = $category->name;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->
    <!--section-->
    <div class="section page-content-first">
<!--         <div class="container">
            <div class="text-center mb-2  mb-md-3 mb-lg-4">
                <h1><span class="theme-color"><?php echo $cat_name;?> </span></h1>
                <div class="h-decor"></div>
            </div>
        </div> -->
        <div class="container mt-3 mt-lg-5">
            <div class="row">
                <?php get_template_part('products/product-cat-list'); ?>
                <div class="col-md-8 col-lg-9">
					<div class="pro-heading mb-2 mb-md-3 mb-lg-4">
						<div class="text-center">
							<h1><span class="theme-color"><?php echo $cat_name;?> </span></h1>
							<div class="h-decor"></div>
							<p>
								Descriptions
							</p>
						</div>
					</div>
                    <div class="filters-row align-items-center d-md-none d-flex" >
                        <div class="d-flex align-items-center justify-content-between filters-row-left col-md-12 p-0">
							<?php if( $_GET['orderby'] ):
								
								if($_GET['orderby'] == 'date'):
									 $orderby = $_GET['orderby'] ? $_GET['orderby'] : 'date';
										$order = 'DESC';
								endif;
								if($_GET['orderby'] == 'title') :
									 $orderby = $_GET['orderby'] ? $_GET['orderby'] : 'date';
										$order = 'ASC';
								endif;
							endif;?>
                            <?php
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//                             $paged = 1;
                            $products = new WP_Query(array(
                                'post_type' => 'products',
                                'posts_per_page' => 9,
								'orderby' => $orderby,
                                'order' => $order ? $order : 'DESC',
                                'paged' => $paged,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_category',
                                        'field'    => 'id',
                                        'terms'    => $cat_ID,
                                    ),
                                ),
                            ));
                            $a = 1;
                            $b = 1;
                            ?>
                            <input type="hidden" name="categoryID" id="categoryID" value="<?php echo $cat_ID;?>" />
                            <div class="form-inline w-100">
                                <div class="select-wrapper">
                                    <select id="select" name="sorting">
                                        <option value="<?php echo site_url();?>/product-page/">Category</option>
                                        <?php
                                        $args = array('hide_empty=1');
                                        $terms = get_terms('product_category', $args);
                                        if (!empty($terms) && !is_wp_error($terms)) {
                                            $count = count($terms);
                                            $i = 0;
                                            // $term_list = '<p class="my_term-archive"></p>';
                                            foreach ($terms as $term) {
                                                $i++;
                                                if($cat_name == $term->name){
                                                    $term_list .= '<option value="' . esc_url(get_term_link($term)) . '" selected >' . $term->name . '</option>';
                                                }else{
                                                    $term_list .= '<option value="' . esc_url(get_term_link($term)) . '">' . $term->name . '</option>';
                                                }                                                
                                            }
                                            echo $term_list;
                                        }
                                        ?>
                                    </select>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            $('#select').change(function() {
                                                location.href = $(this).val();
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="prd-grid" id="prd-gridCat">
                        <?php
                        while ($products->have_posts()) : $products->the_post(); ?>
                            <?php get_template_part('products/product-list'); ?>
                        <?php endwhile; wp_reset_postdata();
                        ?>
                    </div>
                    <div class="clearfix mb-3"></div>
                    <div class="row justify-content-center mt-5 mb-5 loadMore hidden" id="loadMoreCat">
                        <img src="<?php echo site_url()?>/wp-content/uploads/2021/12/loadmore.gif" alt="loading"/>
                    </div>
					<?php cpt_pagination($products->max_num_pages); ?>
                </div>
            </div>
        </div>
    </div>
</div>