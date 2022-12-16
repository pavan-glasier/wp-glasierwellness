<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php glasierwellness_the_html_classes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/landing/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/landing/css/flaticon.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/landing/css/remixicon.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/landing/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/landing/css/fancybox.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/landing/css/style.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/landing/css/responsive.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class('shop-page layout-medlab stickNav'); ?> data-bs-spy="scroll" data-bs-offset="120">
	<?php wp_body_open(); ?>
<!-- 	<div class="preloader js-preloader">
		<div class="loader loader-inner-1">
			<div class="loader loader-inner-2">
				<div class="loader loader-inner-3"></div>
			</div>
		</div>
	</div> -->
	<div class="page-wrapper">
		<header class="header-wrap style4">
			<div class="container">
				<div class="header-top">
					<div class="row align-items-center">
						<div class="col-lg-8 col-md-7">
							<div class="header-top-left">
								<ul class="contact-info list-style">
								
								</ul>
							</div>
						</div>
						<div class="col-lg-4 col-md-5">
							<div class="header-top-right">
								<ul class="contact-info list-style">
									<li>
									<?php $phone = get_field('phone', 'option'); ?>
									<?php if (!empty($phone)) { ?>
										<i class="flaticon-phone-call"></i>
										<a href="tel:<?php echo str_replace(' ', '', $phone); ?>"><?php echo $phone; ?></a>
									&nbsp; &nbsp;
									<?php } ?>
								<?php $email = get_field('email', 'option'); ?>
									<?php if (!empty($email)) { ?>
										<i class="flaticon-email"></i>
										<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
								<?php } ?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="header-bottom">
					<nav class="navbar navbar-expand-lg navbar-light header-sticky">
						<?php
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
							<img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo get_bloginfo( 'name' );?>" class="logo-light">
						</a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<?php wp_nav_menu( array(
								'theme_location'    => 'landing',
								'container'         => 'ul',
								'menu_class'        => 'navbar-nav mr-auto',
								'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
								'walker'            => new WP_Bootstrap_Navwalker() 
								)
								);
							?>
						</div>
					</nav>
				</div>
			</div>
		</header>