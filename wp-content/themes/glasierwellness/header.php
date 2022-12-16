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
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="google-site-verification" content="YEsg6DUm3pbPb_C3kUISKbqi9SyhyZuRQMRheExagEg" />
	<?php wp_head(); ?>

	<?php if( is_page('1167')):?>
	<!-- Google tag (gtag.js) --> 
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11026604242"></script> 
	<script> 
		window.dataLayer = window.dataLayer || []; 
		function gtag(){
			dataLayer.push(arguments);
		} 
		gtag('js', new Date()); 
		gtag('config', 'AW-11026604242'); 
	</script>
	<!-- Event snippet for Submit lead form 1 conversion page --> 
	<script> 
		gtag('event', 'conversion', {
			'send_to': 'AW-11026604242/g0LXCLeygoUYENLB8okp'
		});
	</script>
	<?php endif;?>
</head>

<body <?php body_class('shop-page layout-medlab stickNav'); ?>>
<?php wp_body_open(); ?>
	
 <?php get_template_part( 'template-parts/header/site-header' ); ?>