<?php

/**
 * 
 * Template Name: Product Search
 * 
 **/

get_header();
?>
<?php
$search = $_POST['search'];
$title = $_POST['title'];
// echo $search;
?>
<div class="page-content">
    <!--section-->
    <div class="section mt-0">
        <div class="breadcrumbs-wrap">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="<?php echo site_url(); ?>">Home</a>
                    <span>Search Products : "<?php echo $search; ?>"</span>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->
    <!--section-->
    <div class="section page-content-first">

        <div class="container mt-3 mb-lg-5 mt-lg-5">

            <?php
            $the_query = new WP_Query(
                array(
                    'posts_per_page' => -1,
                    's' => esc_attr($_POST['search']),
                    'post_type' => 'products'
                )
            );
            if ($_POST['search'] == "") { ?>

                <div class="title-wrap text-center">
                    <h2 class="double-title double-title--center double-title--vcenter" data-title="<?php esc_html_e('invalid keyword!', 'glasierwellness'); ?>">
                        <span><?php esc_html_e('invalid keyword!', 'glasierwellness'); ?></span>
                    </h2>
                    <div class="h-decor"></div>
                    <p></p>
                    <?php get_template_part('products/productSearchForm'); ?>
                    <a href="<?php echo $title; ?>" class="btn">
                        <i class="icon-right-arrow"></i>
                        <span>Back</span>
                        <i class="icon-right-arrow"></i>
                    </a>
                </div>


            <?php } else if ($_POST['search'] == " ") { ?>
                <div class="title-wrap text-center">
                    <h2 class="double-title double-title--center double-title--vcenter" data-title="<?php esc_html_e('Nothing Found !', 'glasierwellness'); ?>">
                        <span><?php esc_html_e('Nothing Found !', 'glasierwellness'); ?></span>
                    </h2>
                    <div class="h-decor"></div>
                    <p></p>
                    <?php get_template_part('products/productSearchForm'); ?>
                    
                    <a href="<?php echo $title; ?>" class="btn">
                        <i class="icon-right-arrow"></i>
                        <span>Back</span>
                        <i class="icon-right-arrow"></i>
                    </a>
                </div>
            <?php } else { ?>



                <?php if ($the_query->have_posts()) : ?>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="prd-grid">
                                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                    <?php get_template_part('products/product-list'); ?>
                                <?php endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php
                else : ?>

                    <div class="title-wrap text-center">
                        <h2 class="double-title double-title--center double-title--vcenter" data-title="<?php esc_html_e('No Results Found !', 'glasierwellness'); ?>">
                            <span><?php esc_html_e('No Results Found !', 'glasierwellness'); ?></span>
                        </h2>
                        <div class="h-decor"></div>
                        <p></p>
                        <?php get_template_part('products/productSearchForm'); ?>
                        <a href="<?php echo $title; ?>" class="btn">
                            <i class="icon-right-arrow"></i>
                            <span>Back</span>
                            <i class="icon-right-arrow"></i>
                        </a>
                    </div>
            <?php endif;
            }
            ?>

        </div>
    </div>
</div>



<?php get_footer(); ?>