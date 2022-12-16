<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('glasier_wellness_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Glasier Wellness 1.0
	 *
	 * @return void
	 */
	function glasier_wellness_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Glasier Wellness, use a find and replace
		 * to change 'glasierwellness' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('glasierwellness', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1568, 9999);

		register_nav_menus(
			array(
				'primary' => esc_html__('Primary menu', 'glasierwellness'),
				'footer'  => __('Secondary menu', 'glasierwellness'),
				'landing'  => __('Landing Page menu', 'glasierwellness'),
			)
		);


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add support for editor styles.
		add_theme_support('editor-styles');
		$background_color = get_theme_mod('background_color', 'D1E4DD');
		if (127 > glasier_wellness_Custom_Colors::get_relative_luminance_from_hex($background_color)) {
			add_theme_support('dark-editor-style');
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ($is_IE) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style($editor_stylesheet_path);

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__('Extra small', 'glasierwellness'),
					'shortName' => esc_html_x('XS', 'Font size', 'glasierwellness'),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__('Small', 'glasierwellness'),
					'shortName' => esc_html_x('S', 'Font size', 'glasierwellness'),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__('Normal', 'glasierwellness'),
					'shortName' => esc_html_x('M', 'Font size', 'glasierwellness'),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__('Large', 'glasierwellness'),
					'shortName' => esc_html_x('L', 'Font size', 'glasierwellness'),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__('Extra large', 'glasierwellness'),
					'shortName' => esc_html_x('XL', 'Font size', 'glasierwellness'),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__('Huge', 'glasierwellness'),
					'shortName' => esc_html_x('XXL', 'Font size', 'glasierwellness'),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__('Gigantic', 'glasierwellness'),
					'shortName' => esc_html_x('XXXL', 'Font size', 'glasierwellness'),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__('Black', 'glasierwellness'),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__('Dark gray', 'glasierwellness'),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__('Gray', 'glasierwellness'),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__('Green', 'glasierwellness'),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__('Blue', 'glasierwellness'),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__('Purple', 'glasierwellness'),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__('Red', 'glasierwellness'),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__('Orange', 'glasierwellness'),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__('Yellow', 'glasierwellness'),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__('White', 'glasierwellness'),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__('Purple to yellow', 'glasierwellness'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to purple', 'glasierwellness'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__('Green to yellow', 'glasierwellness'),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to green', 'glasierwellness'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__('Red to yellow', 'glasierwellness'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to red', 'glasierwellness'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__('Purple to red', 'glasierwellness'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__('Red to purple', 'glasierwellness'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if (is_customize_preview()) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support('starter-content', glasier_wellness_get_starter_content());
		}

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Add support for custom line height controls.
		add_theme_support('custom-line-height');

		// Add support for experimental link color control.
		add_theme_support('experimental-link-color');

		// Add support for experimental cover block spacing.
		add_theme_support('custom-spacing');

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support('custom-units');
	}
}
add_action('after_setup_theme', 'glasier_wellness_setup');

/**
 * Register widget area.
 *
 * @since Glasier Wellness 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function glasier_wellness_widgets_init()
{

	register_sidebar(
		array(
			'name'          => esc_html__('Footer', 'glasierwellness'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here to appear in your footer.', 'glasierwellness'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'glasier_wellness_widgets_init');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Glasier Wellness 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function glasier_wellness_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('glasier_wellness_content_width', 750);
}
add_action('after_setup_theme', 'glasier_wellness_content_width', 0);

/**
 * Enqueue scripts and styles.
 *
 * @since Glasier Wellness 1.0
 *
 * @return void
 */
function glasier_wellness_scripts()
{
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ($is_IE) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style('glasier-wellness-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get('Version'));
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style('glasier-wellness-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
	}

	// RTL styles.
	wp_style_add_data('glasier-wellness-style', 'rtl', 'replace');

	// Print styles.
	wp_enqueue_style('glasier-wellness-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get('Version'), 'print');

	// Threaded comment reply styles.
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'glasier-wellness-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get('Version'),
		true
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'glasier-wellness-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get('Version'),
		true
	);
	wp_add_inline_script(
		'glasier-wellness-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'glasier-wellness-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if (has_nav_menu('primary')) {
		wp_enqueue_script(
			'glasier-wellness-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array('glasier-wellness-ie11-polyfills'),
			wp_get_theme()->get('Version'),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'glasier-wellness-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array('glasier-wellness-ie11-polyfills'),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('wp_enqueue_scripts', 'glasier_wellness_scripts');

/**
 * Enqueue block editor script.
 *
 * @since Glasier Wellness 1.0
 *
 * @return void
 */
function glasierwellness_block_editor_script()
{

	wp_enqueue_script('glasierwellness-editor', get_theme_file_uri('/assets/js/editor.js'), array('wp-blocks', 'wp-dom'), wp_get_theme()->get('Version'), true);
}

add_action('enqueue_block_editor_assets', 'glasierwellness_block_editor_script');

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Glasier Wellness 1.0
 *
 * @link https://git.io/vWdr2
 */
function glasier_wellness_skip_link_focus_fix()
{

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
?>
	<script>
		/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", (function() {
			var t, e = location.hash.substring(1);
			/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
		}), !1);
	</script>
<?php
}
add_action('wp_print_footer_scripts', 'glasier_wellness_skip_link_focus_fix');

/**
 * Enqueue non-latin language styles.
 *
 * @since Glasier Wellness 1.0
 *
 * @return void
 */
function glasier_wellness_non_latin_languages()
{
	$custom_css = glasier_wellness_get_non_latin_css('front-end');

	if ($custom_css) {
		wp_add_inline_style('glasier-wellness-style', $custom_css);
	}
}
add_action('wp_enqueue_scripts', 'glasier_wellness_non_latin_languages');

// SVG Icons class.
require get_template_directory() . '/classes/class-glasier-wellness-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-glasier-wellness-custom-colors.php';
new glasier_wellness_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-glasier-wellness-customize.php';
new glasier_wellness_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-glasier-wellness-dark-mode.php';
new glasier_wellness_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Glasier Wellness 1.0
 *
 * @return void
 */
function glasierwellness_customize_preview_init()
{
	wp_enqueue_script(
		'glasierwellness-customize-helpers',
		get_theme_file_uri('/assets/js/customize-helpers.js'),
		array(),
		wp_get_theme()->get('Version'),
		true
	);

	wp_enqueue_script(
		'glasierwellness-customize-preview',
		get_theme_file_uri('/assets/js/customize-preview.js'),
		array('customize-preview', 'customize-selective-refresh', 'jquery', 'glasierwellness-customize-helpers'),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('customize_preview_init', 'glasierwellness_customize_preview_init');

/**
 * Enqueue scripts for the customizer.
 *
 * @since Glasier Wellness 1.0
 *
 * @return void
 */
function glasierwellness_customize_controls_enqueue_scripts()
{

	wp_enqueue_script(
		'glasierwellness-customize-helpers',
		get_theme_file_uri('/assets/js/customize-helpers.js'),
		array(),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('customize_controls_enqueue_scripts', 'glasierwellness_customize_controls_enqueue_scripts');

/**
 * Calculate classes for the main <html> element.
 *
 * @since Glasier Wellness 1.0
 *
 * @return void
 */
function glasierwellness_the_html_classes()
{
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Glasier Wellness 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters('glasierwellness_html_classes', '');
	if (!$classes) {
		return;
	}
	echo 'class="' . esc_attr($classes) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Glasier Wellness 1.0
 *
 * @return void
 */
function glasierwellness_add_ie_class()
{
?>
	<script>
		if (-1 !== navigator.userAgent.indexOf('MSIE') || -1 !== navigator.appVersion.indexOf('Trident/')) {
			document.body.classList.add('is-IE');
		}
	</script>
<?php
}
add_action('wp_footer', 'glasierwellness_add_ie_class');



require get_template_directory() . '/better-comments.php';


add_filter('comment_reply_link', 'replace_reply_link_class');


function replace_reply_link_class($class)
{
	$class = str_replace("class='comment-reply-link", "class='reply", $class);
	return $class;
}




// function dequeue_my_css() {
//   wp_dequeue_style('glasierwellness-style');
//   wp_deregister_style('glasierwellness-style');
// }
// add_action('wp_enqueue_scripts','dequeue_my_css');



// add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
// function clear_nav_menu_item_id($id, $item, $args) {
//     return "";
// }

add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args)
{
	$navCls = "nav-item";
	return array($navCls);
}



add_filter('wp_enqueue_scripts', 'change_default_jquery');

function change_default_jquery()
{
	// 	wp_dequeue_script('jquery');
	// 	wp_deregister_script('jquery');

	// 	wp_dequeue_script('jquery-core');
	// 	wp_deregister_script('jquery-core');
}


function myscript_css()
{
	if (!is_page(array( '1185', '1097' ))) {
		wp_enqueue_style('slick', get_template_directory_uri() . '/vendor/slick/slick.css', array(), 'all');
		wp_enqueue_style('animate-min', get_template_directory_uri() . '/vendor/animate/animate.min.css', array(), 'all');
		wp_enqueue_style('icons-style', get_template_directory_uri() . '/icons/style.css', array(), 'all');
		wp_enqueue_style('bootstrap-datetimepicker', get_template_directory_uri() . '/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.css', array(), 'all');
		wp_enqueue_style('css-style', get_template_directory_uri() . '/css/style.css', array(), 'all');
		wp_enqueue_style('css-color', get_template_directory_uri() . '/color/color.css', array(), 'all');
		wp_enqueue_style('fontsPoppins', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800');
		wp_enqueue_style('fontsRoboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900');
		wp_enqueue_style('about-css', get_template_directory_uri() . '/css/about.css', array(), 'all');
	}
}
add_action('wp_head', 'myscript_css', 1);


function foot_theme_scripts()
{

	//   wp_enqueue_script( 'js', get_template_directory_uri() . '/vendor/jquery/jquery-3.2.1.min.js');
	//   wp_enqueue_script( 'migrate', get_template_directory_uri() . '/vendor/jquery-migrate/jquery-migrate-3.0.1.min.js');
	//   wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/vendor/cookie/jquery.cookie.js');
	//   wp_enqueue_script( 'js-moment', get_template_directory_uri() . '/vendor/bootstrap-datetimepicker/moment.js');
	//   wp_enqueue_script( 'bootstrap-datetimepicker-min', get_template_directory_uri() . '/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js');
	//   wp_enqueue_script( 'popper-min', get_template_directory_uri() . '/vendor/popper/popper.min.js');
	//   wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.min.js');
	//   wp_enqueue_script( 'waypoints-min', get_template_directory_uri() . '/vendor/waypoints/jquery.waypoints.min.js');
	//   wp_enqueue_script( 'sticky-min', get_template_directory_uri() . '/vendor/waypoints/sticky.min.js');
	//   wp_enqueue_script( 'imagesloaded-pkgd-min', get_template_directory_uri() . '/vendor/imagesloaded/imagesloaded.pkgd.min.js');
	//   wp_enqueue_script( 'slick-min', get_template_directory_uri() . '/vendor/slick/slick.min.js');
	//   wp_enqueue_script( 'scroll-with-ease-min', get_template_directory_uri() . '/vendor/scroll-with-ease/jquery.scroll-with-ease.min.js');
	//   wp_enqueue_script( 'jquery-countTo', get_template_directory_uri() . '/vendor/countTo/jquery.countTo.js');
	//   wp_enqueue_script( 'form', get_template_directory_uri() . '/vendor/form-validation/jquery.form.js');
	//   wp_enqueue_script( 'jquery-validate-min', get_template_directory_uri() . '/vendor/form-validation/jquery.validate.min.js');
	//   wp_enqueue_script( 'isotope-pkgd-min', get_template_directory_uri() . '/vendor/isotope/isotope.pkgd.min.js');

	//   wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js');
	//   wp_enqueue_script( 'color-color', get_template_directory_uri() . '/color/color.js');
	//   wp_enqueue_script( 'app-shop', get_template_directory_uri() . '/js/app-shop.js');
	//   wp_enqueue_script( 'forms', get_template_directory_uri() . '/form/forms.js');


}



add_action('wp_footer', 'foot_theme_scripts');

function admin_theme_style()
{
	wp_enqueue_style('acf-admin', get_template_directory_uri() . '/css/acf-admin.css');
}
add_action('admin_enqueue_scripts', 'admin_theme_style');
add_action('login_enqueue_scripts', 'admin_theme_style');



// PRODUCT PAGE LOAD MORE



add_action('wp_ajax_load_products_by_ajax', 'load_products_by_ajax_callback');
add_action('wp_ajax_nopriv_load_products_by_ajax', 'load_products_by_ajax_callback');

function load_products_by_ajax_callback()
{
	check_ajax_referer('load_more_products', 'security');
	$paged = $_POST['page'];
	$args = array(
		'post_type' => 'products',
		'posts_per_page' => 9,
		'order' => 'DESC',
		'paged' => $paged,
	);
	$products = new WP_Query($args);
?>


	<?php if ($products->have_posts()) : ?>
		<?php while ($products->have_posts()) : $products->the_post();
		?>
			<div class="prd">
				<div class="prd-img">
					<a href="<?php the_permalink(); ?>">
						<?php
						if (has_post_thumbnail()) { ?>
							<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'full'); ?>" class="img-fluid" alt="<?php echo get_the_title(); ?>">
						<?php } else { ?>
							<img src="<?= site_url(); ?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" alt="noprivew">
						<?php }
						?>
					</a>
				</div>
				<div class="prd-info">
					<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
					<a class="btn" href="<?php the_permalink(); ?>">
						<i class="icon-right-arrow"></i>Details<i class="icon-right-arrow"></i>
					</a>
				</div>
			</div>



		<?php endwhile; ?>
	<?php
	endif;

	wp_die();
}

// END PRODUCT PAGE LOAD MORE




// START CATEGORY PAGE LOAD MORE
add_action('wp_ajax_load_catproducts_by_ajax', 'load_catproducts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_catproducts_by_ajax', 'load_catproducts_by_ajax_callback');

function load_catproducts_by_ajax_callback()
{
	check_ajax_referer('load_more_catproducts', 'security');
	$catPaged = $_POST['page'];
	$categoryID = $_POST['categoryID'];

	$catArgs = array(
		'post_type' => 'products',
		'posts_per_page' => 9,
		'order' => 'DESC',
		'paged' => $catPaged,
		'tax_query' => array(
			array(
				'taxonomy' => 'product_category',
				'field'    => 'id',
				'terms'    => $categoryID,
			),
		),
	);
	$catProducts = new WP_Query($catArgs);
	?>


	<?php if ($catProducts->have_posts()) : ?>
		<?php while ($catProducts->have_posts()) : $catProducts->the_post();
		?>

			<div class="prd">
				<div class="prd-img">
					<a href="<?php the_permalink(); ?>">
						<?php
						if (has_post_thumbnail()) { ?>
							<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(), 'full'); ?>" class="img-fluid" alt="<?php echo get_the_title(); ?>">
						<?php } else { ?>
							<img src="<?= site_url(); ?>/wp-content/uploads/2022/10/placeholder-img-glasierwellness.png" alt="noprivew">
						<?php }
						?>
					</a>
				</div>
				<div class="prd-info">
					<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
					<a class="btn" href="<?php the_permalink(); ?>">
						<i class="icon-right-arrow"></i>Details<i class="icon-right-arrow"></i>
					</a>
				</div>
			</div>



		<?php endwhile; ?>
	<?php
	endif;

	wp_die();
}

// END LOAD MORE






// Register Nav Walker class_alias
require_once('wp-bootstrap-navwalker.php');



if (function_exists('acf_add_options_page')) {
	// Theme General Settings
	$general_settings   = array(
		'page_title' 	=> __('Theme General Settings', 'glasierwellness'),
		'menu_title'	=> __('Theme Settings', 'glasierwellness'),
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'	=> true
	);
	acf_add_options_page($general_settings);

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Theme Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Theme Footer',
		'parent_slug'	=> 'theme-general-settings',
	));


	$slider   = array(
		'page_title' 	=> __('Sliders Settings', 'glasierwellness'),
		'menu_title'	=> __('Sliders', 'glasierwellness'),
		'menu_slug' 	=> 'sliders-settings',
		'capability'	=> 'edit_posts',
		'icon_url' => 'dashicons-images-alt2',
		'position' => 4,
		'redirect'	=> true
	);
	acf_add_options_page($slider);
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Slider',
		'menu_title'	=> 'Slider',
		'parent_slug'	=> 'sliders-settings',
	));
}






remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
add_action('wpcf7_init', 'new_wpcf7_add_shortcode_submit_button', 20);

function new_wpcf7_add_shortcode_submit_button()
{
	wpcf7_add_shortcode('submit', 'new_wpcf7_submit_button_shortcode_handler');
}

function new_wpcf7_submit_button_shortcode_handler($tag)
{
	$tag = new WPCF7_Shortcode($tag);

	$class = wpcf7_form_controls_class($tag->type);

	$atts = array();

	$atts['class'] = $tag->get_class_option($class);
	$atts['id'] = $tag->get_id_option();
	$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);

	$value = isset($tag->values[0]) ? $tag->values[0] : '';
	if (empty($value))
		$value = __('Send', 'contact-form-7');

	$atts['type'] = 'submit';
	$atts['class'] = 'wpcf7-form-control has-spinner wpcf7-submit submit-btn';

	$atts = wpcf7_format_atts($atts);

	$html = sprintf('<button %1$s><span><i class="icon-black-envelope"></i></span></button>', $atts, $value);
	return $html;
}






function noPage_pagination($pages = '', $range = 4)
{
	$showitems = ($range * 2) + 1;
	global $paged;
	if (empty($paged)) $paged = 1;
	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
			$pages = 1;
		}
	}
	if (1 != $pages) {
		echo "<span>Page " . $paged . " of " . $pages . "</span>";
	}
}
//  Custom post type pagination function 

function cpt_pagination($pages = '', $range = 4)
{
	$showitems = ($range * 2) + 1;
	global $paged;
	if (empty($paged)) $paged = 1;
	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
			$pages = 1;
		}
	}
	if (1 != $pages) {
		echo "<ul class='mt-5 pagination justify-content-center'> ";
		if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<li class='page-item'><a class='page-link' href=\"" . get_pagenum_link(1) . "\"><i class='fa fa-angle-double-left'></i></a></li>";
		if ($paged > 1 && $showitems < $pages) echo "<li class='page-item'><a class='page-link' href='" . get_pagenum_link($paged - 1) . "'><i class='fa fa-angle-left'></i></a></li>";
		for ($i = 1; $i <= $pages; $i++) {
			if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
				echo ($paged == $i) ? "<li class=\"page-item active\"><a class='page-link'>" . $i . "</a></li>" : "<li class='page-item'> <a href='" . get_pagenum_link($i) . "' class=\"page-link\">" . $i . "</a></li>";
			}
		}
		if ($paged < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href=\"" . get_pagenum_link($paged + 1) . "\"><i class='fa fa-angle-right'></i></a></li>";
		if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href='" . get_pagenum_link($pages) . "'><i class='fa fa-angle-double-right'></i></a></li>";
		echo "</ul>\n";
	}
}


function query_post_type($query)
{
	$post_types = get_post_types();

	if (is_category() || is_tag()) {

		$post_type = get_query_var('products');

		if ($post_type) {
			$post_type = $post_type;
		} else {
			$post_type = $post_types;
		}

		$query->set('post_type', $post_type);

		return $query;
	}
}

add_filter('pre_get_posts', 'query_post_type');







function glasierwellness_pagination()
{

	$allowed_tags = [

		'span' => [
			'class' => []
		],
		'a' => [
			'class' => [],
			'href' => [],
		]

	];

	$args = [
		'before_page_number' => '<span class="paginate-btn">',
		'after_page_number' => '</span>',

	];
	printf('<div class="pagination justify-content-center align-items-center m-3">%s</div>', wp_kses(paginate_links($args), $allowed_tags));
}








// AJAX CALL


function contactUs()
{

	// global $wpdb;

	$postID = $_POST['postID'];

	echo $postID;
	die();
}
add_action('wp_ajax_contactUs', 'contactUs');
add_action('wp_ajax_nopriv_contactUs', 'contactUs');





// the ajax function
add_action('wp_ajax_s_data_fetch', 's_data_fetch');
add_action('wp_ajax_nopriv_s_data_fetch', 's_data_fetch');
function s_data_fetch()
{

	$the_query = new WP_Query(
		array(
			'posts_per_page' => 1,
			'p' => $_POST['postID'],
			'post_type' => 'products'
		)
	);
	?>
	<?php
	if ($the_query->have_posts()) :
		while ($the_query->have_posts()) : $the_query->the_post(); ?>

			<?php
			echo json_encode(array(
				'name' => get_the_title(),
				'imgUrl' => esc_url(wp_get_attachment_url(get_post_thumbnail_id($_POST['postID']), 'full')),
			));
			?>

<?php endwhile;
		wp_reset_postdata();
	else :
		echo '<span>No Results Found !</span>';
	endif;
	die();
}



function replace_content($content)
{
	$content = str_replace('ProductName', $_POST['product_name'], $content);
	$units = $_POST['quantity'] ? $_POST['quantity'] : '';
	$content = str_replace('Units', $units, $content);
	return $content;
}
add_filter('wpcf7_form_elements', 'replace_content');








// API SUBMIT DATA
add_action('wpcf7_mail_sent', 'on_submitInq', 10, 1);
function on_submitInq($form)
{
	if ($form->id === 252) {
		$submission = WPCF7_Submission::get_instance();
		$data = $submission->get_posted_data();

		$product_name = sanitize_text_field($data['product_name']);
		$requirement = sanitize_text_field($data['requirement']);
		$units = sanitize_text_field($data['units']);
		$remark = sanitize_text_field($data['remark']);
		$party_name = sanitize_text_field($data['party_name']);
		$company_name = sanitize_text_field($data['company_name']);
		$phone = sanitize_text_field($data['phone']);
		$email = sanitize_text_field($data['email']);
		$location = sanitize_text_field($data['location']);
		$country = sanitize_text_field($data['country']);
		$state = sanitize_text_field($data['state']);
		$city = sanitize_text_field($data['city']);

		$url = '';

		$response = wp_safe_remote_post($url, [
			'body' => json_encode([
				'product_name' => $product_name,
				'requirement' => $requirement,
				'units' => $units,
				'remark' => $remark,
				'party_name' => $party_name,
				'company_name' => $company_name,
				'phone' => $phone,
				'email' => $email,
				'location' => $location,
				'country' => $country,
				'state' => $state,
				'city' => $city,
			]),
		]);

		// 	    if ( is_wp_error($response) ) {
		// 	        // $abort = TRUE;

		$body = wp_remote_retrieve_body($response);
		$result = json_decode($body);
		$msg = $result->message;
		$submission->set_response($result->message);
		$submission->set_status($result->status);
		// 	        error_log(print_r($msg, true));
		// 	    }
	}
}


