<?php
/**
 * ACF Gutenberg Block Registration & Functions.
 *
 * @package Jafar_Theme
 */

/**
 * Register ACF Block Category.
 *
 * @param array  $categories our block categories.
 * @param object $post our post object.
 */
function block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			[
				'slug'  => 'oguk-blocks',
				'title' => __( 'OGUK Blocks', 'stella' ),
			],
		)
	);
}
add_filter( 'block_categories', 'block_category', 10, 2 );

/**
 * Register ACF Blocks.
 */
function register_acf_block_types() {
	acf_register_block_type(
		[
			'name'            => 'homepage-hero',
			'title'           => __( 'Homepage Hero' ),
			'description'     => __( 'Homepage hero block.' ),
			'render_template' => 'blocks/m01-homepage-hero.php',
			'category'        => 'oguk-blocks',
			'icon'            => 'align-center',
			'keywords'        => [ 'custom', 'block' ],
			'supports'        => [
				'mode'     => false,
				'align'    => false,
				'multiple' => false,
			],
			'enqueue_assets'  => function() {
				if ( is_admin() ) {
					wp_enqueue_script( 'block-scripts', get_template_directory_uri() . '/assets/js/vendor.js', [], '1.0.0', true );
				}
			},
		]
	);
}

// Check if function exists and hook into setup.
if ( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', 'register_acf_block_types' );
}

/**
 * Allowed theme block types.
 */
// function allowed_block_types() {
// 	return array(
// 		'core/image',
// 		'core/group',
// 		'core/table',
// 		'core/paragraph',
// 		'core/quote',
// 		'core/heading',
// 		'core/list',
// 	);
// }
// add_filter( 'allowed_block_types', 'allowed_block_types' );