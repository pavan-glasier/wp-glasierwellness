<?php

/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= (true === get_theme_mod('display_title_and_tagline', true)) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu('primary') ? ' has-menu' : '';
?>
<?php //echo esc_attr( $wrapper_classes ); 
?>

<header class="header ">
    <div class="header-quickLinks js-header-quickLinks d-lg-none">
        <div class="quickLinks-top js-quickLinks-top"></div>
        <div class="js-quickLinks-wrap-m">
        </div>
    </div>
    <div class="header-topline d-none d-lg-flex">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-auto d-flex align-items-center">
                    <?php $location = get_field('location', 'option'); ?>
                    <?php $phone = get_field('phone', 'option'); ?>
                    <?php $email = get_field('email', 'option'); ?>
                    <?php $social_media = get_field('social_media', 'option'); ?>
                    <?php if (!empty($location)) { ?>
                        <div class="header-info"><i class="icon-placeholder2"></i><?php echo $location; ?></div>
                    <?php } ?>

                    <?php if (!empty($phone)) { ?>
                        <div class="header-phone"><i class="icon-telephone"></i><?php echo $phone; ?></div>
                    <?php } ?>

                    <?php if (!empty($email)) { ?>
                        <div class="header-info"><i class="icon-black-envelope"></i><?php echo $email; ?></div>
                    <?php } ?>

                </div>
                <div class="col-auto ml-auto d-flex align-items-center">
                    <?php
                    if (have_rows('social_media', 'option')) : ?>
                        <span class="header-social">
                            <?php while (have_rows('social_media', 'option')) : the_row(); ?>
                                <?php
                                $link = get_sub_field('link');
                                if ($link) :
                                ?>
                                    <?php
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <?php $title = strtolower($link_title) ?>
                                    <a href="<?php echo esc_url($link_url); ?>" class="hovicon" target="<?php echo $link_target;?>">
                                        <i class="icon-<?php echo $title;?>-logo-circle"></i>
                                    </a>
                                <?php endif; ?>

                            <?php endwhile; ?>
                        </span>
                    <?php
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="header-content">
        <div class="container">
            <div class="row align-items-lg-center">
                <button class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNavDropdown">
                    <span class="icon-menu"></span>
                </button>
                <div class="col-lg-auto col-lg-2 d-flex align-items-lg-center">
                    <?php get_template_part('template-parts/header/site-branding'); ?>
                </div>
                <div class="col-lg ml-auto header-nav-wrap">
                    <div class="header-nav js-header-nav">
                        <?php get_template_part('template-parts/header/site-nav'); ?>
                    </div>
                    <div class="header-search">
                        <form role="search" method="get" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <i class="icon-search"></i>
                            <input type="text" placeholder="Search.." value="" name="s" id="searchid">
                            <button type="submit" id="searchSubmit" value="submit"><i class="icon-search"></i></button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>