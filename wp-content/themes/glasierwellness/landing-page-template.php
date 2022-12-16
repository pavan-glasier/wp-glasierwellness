<?php

/**
 * 
 * Template Name: Landing Page
 * 
 **/

get_header('landing'); ?>


<?php while (have_rows('sections')) : the_row(); ?>
    <?php if (get_row_layout() == 'section_1') :
        $form_group = get_sub_field('form_group');
        $sec_1_image = get_sub_field('image'); ?>
        <section id="home" class="hero-wrap style8">
            <div class="container-fluid">
                <div class="row gx-5">
                    <div class="col-lg-5 col-md-12 detailform">
                        <?php if (!empty($form_group['heading'])) : ?>
                            <div class="hero-content" data-speed="0.10" data-revert="true">
                                <span><?php echo $form_group['heading']; ?></span>
                                <?php if (!empty($form_group['description'])) : ?>
                                    <p><?php echo $form_group['description']; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
						
                        <?php echo do_shortcode('[contact-form-7 id="1166" html_class="form-wrap" html_id="contactForm"]')?>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-12">
                        <div class="hero-img-one hero-bg-12 bg-f" style="background-image: url('<?php echo esc_url($sec_1_image['url']); ?>');"></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile; ?>


<?php while (have_rows('sections')) : the_row(); ?>
    <?php if (get_row_layout() == 'about_section') :
        $content_group = get_sub_field('content_group');
        $about_images = get_sub_field('image'); ?>
        <section id="about" class="about-wrap style8 pb-100 pt-100">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-6">
                        <?php /*if ($about_images) : ?>
                            <div class="about-img-wrap">
                                <?php if (!empty($about_images['image_1']['url'])) : ?>
                                    <img src="<?php echo esc_url($about_images['image_1']['url']); ?>" alt="<?php echo $about_images['image_1']['alt']; ?>" class="about-img-one">
                                <?php endif; ?>
                                <?php if (!empty($about_images['image_2']['url'])) : ?>
                                    <img src="<?php echo esc_url($about_images['image_2']['url']); ?>" alt="<?php echo $about_images['image_2']['alt']; ?>" class="about-img-two">
                                <?php endif; ?>
                            </div>
                        <?php endif; */ ?>
						<div class="about-banner-wrap" style="background-image: url('<?php echo esc_url($about_images['url']); ?>');">
						</div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="content-title style1">
                                <?php if (!empty($content_group['heading'])) : ?>
                                    <div class="title-wrap">
                                        <h2 class="h1 double-title double-title--white double-title--center double-title--vcenter text-left" data-title="<?php echo strtoupper($content_group['heading']); ?>">
                                            <span><?php echo $content_group['heading']; ?></span>
                                        </h2>
                                        <div class="h-decor"></div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($content_group['content'])) : ?>
                                    <?php echo $content_group['content']; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile; ?>


<?php while (have_rows('sections')) : the_row(); ?>
    <?php if (get_row_layout() == 'services_section') : ?>
        <section id="service" class="service-wrap ptb-100">
            <div class="service-bg bg-f"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 services">
                        <?php if (!empty(get_sub_field('heading'))) : ?>
                            <div class="title-wrap text-center pb-30">
                                <h2 class="h1 double-title double-title--white double-title--center double-title--vcenter" data-title="<?php echo strtoupper(get_sub_field('heading')); ?>">
                                    <span><?php echo get_sub_field('heading'); ?></span>
                                </h2>
                                <div class="h-decor"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (have_rows('boxes')) : ?>
                    <div class="service-slider-one style2 owl-carousel">
                        <?php while (have_rows('boxes')) : the_row(); ?>
                            <div class="service-card style8">
                                <div class="service-icon">
                                    <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="<?php echo get_sub_field('icon')['alt']; ?>">
                                </div>
                                <div class="service-info">
                                    <h3>
                                        <a href="#"><?php echo get_sub_field('title'); ?></a>
                                    </h3>
                                    <p style="text-align: justify;"><?php echo get_sub_field('details'); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile; ?>



<?php while (have_rows('sections')) : the_row(); ?>
    <?php if (get_row_layout() == 'category_section') : ?>
        <section id="category" class="promo-wrap pt-100 pb-75">
            <div class="container">
                <?php if (!empty(get_sub_field('heading'))) : ?>
                    <div class="title-wrap text-center pb-30">
                        <h2 class="h1 double-title double-title--white double-title--center double-title--vcenter" data-title="<?php echo strtoupper(get_sub_field('heading')); ?>">
                            <span><?php echo get_sub_field('heading'); ?></span>
                        </h2>
                        <div class="h-decor"></div>
                    </div>
                <?php endif; ?>
                <?php
                $cat_args = array(
                    'orderby'       => 'term_id',
                    'order'         => 'ASC',
                    'hide_empty'    => true,
                );
                $terms = get_terms('product_category', $cat_args);
                if ($terms) : ?>
                    <div class="row justify-content-center">
                        <?php foreach ($terms as $taxonomy) {
                            $categoryIcon = get_field('category_icon', 'product_category_' . $taxonomy->term_id . ''); ?>
                            <div class="col-xl-3 col-lg-6 col-md-6 aos-init aos-animate">
                                <a href="<?php echo get_term_link($taxonomy); ?>" class="promo-card style2 d-block">
                                    <div class="promo-title">
                                        <div class="promo-icon">
                                            <img src="<?php echo esc_url($categoryIcon['url']); ?>" alt="<?php echo esc_attr($categoryIcon['alt']); ?>">
                                        </div>
                                        <h3><?php echo $taxonomy->name; ?></h3>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile; ?>


<?php while (have_rows('sections')) : the_row(); ?>
    <?php if (get_row_layout() == 'product_section') : ?>
        <section id="products" class="team-wrap pb-100 pt-80">
            <div class="container">
                <?php if (!empty(get_sub_field('heading'))) : ?>
                    <div class="title-wrap text-center pb-30">
                        <h2 class="h1 double-title double-title--white double-title--center double-title--vcenter" data-title="<?php echo strtoupper(get_sub_field('heading')); ?>">
                            <span><?php echo get_sub_field('heading'); ?></span>
                        </h2>
                        <div class="h-decor"></div>
                    </div>
                <?php endif; ?>

                <?php
                $allProducts = new WP_Query(array(
                    'post_type' => 'products',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                ));
                ?>
                <div class="team-slider-two style1 owl-carousel">
                    <?php while ($allProducts->have_posts()) : $allProducts->the_post(); ?>
                    <div class="team-card style8">
                        <div class="team-img">
                        <?php
                        if (has_post_thumbnail()) { ?>
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" alt="<?php echo get_the_title(); ?>">
                        <?php } else { ?>
                            <img src="<?= site_url(); ?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" alt="noprivew">
                        <?php }
                        ?>
                            <a href="<?php the_permalink(); ?>" class="btn style2">Details <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                        <div class="team-info">
                            <h3><?php echo get_the_title(); ?></h3>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata();?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile; ?>

<?php get_footer('landing'); ?>