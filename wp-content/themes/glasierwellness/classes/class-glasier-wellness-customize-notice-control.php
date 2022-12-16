<?php
/**
 * Customize API: glasier_wellness_Customize_Notice_Control class
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

/**
 * Customize Notice Control class.
 *
 * @since Glasier Wellness 1.0
 *
 * @see WP_Customize_Control
 */
class glasier_wellness_Customize_Notice_Control extends WP_Customize_Control {
	/**
	 * The control type.
	 *
	 * @since Glasier Wellness 1.0
	 *
	 * @var string
	 */
	public $type = 'glasier-wellness-notice';

	/**
	 * Renders the control content.
	 *
	 * This simply prints the notice we need.
	 *
	 * @since Glasier Wellness 1.0
	 *
	 * @return void
	 */
	public function render_content() {
		?>
		<div class="notice notice-warning">
			<p><?php esc_html_e( 'To access the Dark Mode settings, select a light background color.', 'glasierwellness' ); ?></p>
			<p><a href="<?php echo esc_url( __( 'https://wordpress.org/support/article/glasier-wellness/#dark-mode-support', 'glasierwellness' ) ); ?>">
				<?php esc_html_e( 'Learn more about Dark Mode.', 'glasierwellness' ); ?>
			</a></p>
		</div>
		<?php
	}
}
