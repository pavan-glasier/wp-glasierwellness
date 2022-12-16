<div class="page-content">
    <!--section-->
    <div class="section mt-0">
        <div class="breadcrumbs-wrap">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="<?php echo site_url(); ?>">Home</a>
                    <span>Product</span>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->
    <!--section-->
    <div class="section page-content-first">
        <div class="container mt-6">
            <div class="row product-block">
                <div class="col-md-6">
                    <div class="product-block-gallery">

                        <?php
                        $images = get_field('product_images');
                        if ($images) :
                            $a = 1;
                        ?>
                            <div class="product-previews" id="productPreviews">
                            <?php
                            if (has_post_thumbnail()) { ?>
                                <a href="#" class="product-previews-item active" data-image="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" data-zoom-image="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>">
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" alt="<?php echo get_the_title(); ?>" />
                                </a>
                            <?php } else { ?>
                                <a href="#" class="product-previews-item active" data-image="<?= site_url(); ?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" data-zoom-image="<?= site_url(); ?>/wp-content/uploads/2021/12/no-preview.png">
                                    <img src="<?= site_url(); ?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" alt="<?php echo get_the_title(); ?>" />
                                </a>
                            <?php }
                            ?>
                                
                                <?php foreach ($images as $image) : ?>
                                    <a href="#" class="product-previews-item" data-image="<?php echo esc_url($image['url']); ?>" data-zoom-image="<?php echo esc_url($image['url']); ?>">
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </a>
                                <?php endforeach; ?>

                            </div>
                        <?php endif; ?>
                        <div class="product-block-mainimage">
                        <?php
                        if (has_post_thumbnail()) { ?>
                            <img id="mainImage" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" data-zoom-image="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" />
                        <?php } else { ?>
                            <img id="mainImage" src="<?= site_url(); ?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" data-zoom-image="<?= site_url(); ?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" />
                        <?php }
                        ?>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="product-block-info">
                        <h2 class="product-block-title"><?php echo get_the_title(); ?></h2>

                        <div class="product-block-description">
                            <div>
                                <?php echo get_the_content(); ?>
                            </div>
                        </div>
                        <div class="product-block-price-comment mt-15">
                            Category :
                            <?php
                            global $post;
                            $postID = $post->ID;
                            $getProductCat = get_the_terms($postID, 'product_category');
                            foreach ($getProductCat as $productInfo) {
                                $category_id = $productInfo->term_id; ?>
                                <a href="<?php echo get_category_link($category_id); ?>"><?php echo $productInfo->name; ?></a>
                                <span class="saparts"> / </span>
                            <?php } ?>

                        </div>

                        <form action="<?php echo site_url();?>/inquiry/" method="post">
                            <div class="product-block-price-comment mt-15">
                                <?php $quantity = get_field('quantity'); ?>
                                <div class="">
                                    <input type="hidden" id="product_name" name="product_name" value="<?php echo get_the_title(); ?>" />
<!--                                     <input type="number" id="qty" name="quantity" class="form-control qty" value="<?php echo $quantity['minimum']; ?>" min="<?php echo $quantity['minimum']; ?>" max="<?php echo $quantity['maximum']; ?>" style="padding-left: 16px !important;" /> -->
                                </div>
                                <span id="msg" class="err"></span>
                            </div>
                            <!-- <button id="btnDis" class="btn mt-2" onclick="openProductDetail(<?php echo $post->ID;?>)"><i class="icon-right-arrow"></i>Get Best Quote<i class="icon-right-arrow"></i></button>  -->
<!--                             <button type="submit" id="btnDis" class="btn mt-2"><i class="icon-right-arrow"></i>Get Inquiry<i class="icon-right-arrow"></i></button> -->
                            <button type="submit" id="" class="btn mt-2"><i class="icon-right-arrow"></i>Get Inquiry<i class="icon-right-arrow"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->
    <!--section-->
    <div class="section mt-5 mb-5">
        <div class="container">
            <?php
            if (have_rows('tabs')) :
                $i = 1;
                $j = 1;
            ?>
                <div class="prd-tabs-wrap">
                    <!-- Nav tabs -->
                    <div class="nav nav-pills" role="tablist">
                        <?php
                        while (have_rows('tabs')) : the_row();
                            $tab_content = get_sub_field('content');
                            $tab_name = get_sub_field('tab_name');
                            if (!empty($tab_name) && !empty($tab_content)) { ?>
                                <a class="nav-link <?php if ($i == 1) { ?> active<?php } ?> " data-toggle="pill" href="#tab<?php echo $i++; ?>" role="tab"><?php echo $tab_name; ?></a>
                            <?php }
                            ?>
                        <?php endwhile; ?>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <?php
                        while (have_rows('tabs')) : the_row();
                            $tab_name = get_sub_field('tab_name');
                            $tab_content = get_sub_field('content');
                            if (!empty($tab_name) && !empty($tab_content)) { ?>
                                <div role="tabpanel" class="tab-pane <?php if ($j == 1) { ?> active<?php } ?>" id="tab<?php echo $j++; ?>">
                                    <?php echo $tab_content; ?>
                                </div>
                            <?php }
                            ?>

                        <?php endwhile; ?>

                    </div>
                </div>
            <?php
            else :
            endif; ?>
        </div>
    </div>
    <!--//section-->
    <!--section-->
    <div class="section mb-5">
        <div class="container">
            <div class="title-wrap text-center">
                <h2 class="h1">Similar Products</h2>
                <div class="h-decor"></div>
                <?php

                $productCat = get_the_terms($post->ID, 'product_category');
                
                foreach ($productCat as $productsInfo) {
                    $cat_id = $productsInfo->term_id; 
                    // echo $cat_id;
                    ?>
                <?php }
                ?>
            
            </div>
            <div class="prd-grid prd-carousel">
            <?php
           
            $related_query = new WP_Query(array(
                'post_type' => 'products',
                'posts_per_page' => 12,
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_category',
                        'field'    => 'id',
                        'terms'    => array($productCat[0]->term_id,$productCat[1]->term_id,$productCat[2]->term_id)
                    ),
                ),
            ));
            while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                <div class="prd">
                    <div class="prd-img">
                        <a href="<?php the_permalink(); ?>">
                        <?php 
                        if ( has_post_thumbnail() ) { ?>
                            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>" class="img-fluid product-thumb" alt="<?php echo get_the_title(); ?>">
                        <?php }
                        else { ?>
                            <img src="<?=site_url();?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" alt="noprivew" >
                        <?php }
                        ?>
                        </a>
                    </div>
                    <div class="prd-info">
                        <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                    </div>
                </div>
                <?php endwhile;
            wp_reset_postdata(); 
            ?>
            </div>
        </div>
    </div>
    <!--//section-->
</div>