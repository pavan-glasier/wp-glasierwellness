<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

?>
<nav class="navbar navbar-expand-lg btco-hover-menu">
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
    <?php wp_nav_menu( array(
		'theme_location'    => 'primary',
		'container'         => 'ul',
		'menu_class'        => 'navbar-nav',
		'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
		'walker'            => new WP_Bootstrap_Navwalker() )
		);
	?>
    </div>
</nav>



