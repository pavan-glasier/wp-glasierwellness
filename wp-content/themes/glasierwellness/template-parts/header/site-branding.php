<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

<?php if ( has_custom_logo() ) : ?>
    <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo">
        <img src="<?php echo esc_url( $image[0] ); ?>" alt="" class="img-fluid">
    </a>
<?php endif; ?>

