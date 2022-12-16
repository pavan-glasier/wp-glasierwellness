<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage glasier_wellness
 * @since Glasier Wellness 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Glasier Wellness 1.0
	 *
	 * @return void
	 */
	function glasier_wellness_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'glasierwellness-columns-overlap',
				'label' => esc_html__( 'Overlap', 'glasierwellness' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'glasierwellness-border',
				'label' => esc_html__( 'Borders', 'glasierwellness' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'glasierwellness-border',
				'label' => esc_html__( 'Borders', 'glasierwellness' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'glasierwellness-border',
				'label' => esc_html__( 'Borders', 'glasierwellness' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'glasierwellness-image-frame',
				'label' => esc_html__( 'Frame', 'glasierwellness' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'glasierwellness-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'glasierwellness' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'glasierwellness-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'glasierwellness' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'glasierwellness-border',
				'label' => esc_html__( 'Borders', 'glasierwellness' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'glasierwellness-separator-thick',
				'label' => esc_html__( 'Thick', 'glasierwellness' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'glasierwellness-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'glasierwellness' ),
			)
		);
	}
	add_action( 'init', 'glasier_wellness_register_block_styles' );
}
