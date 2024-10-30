<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 * 
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Enqueue Gutenberg block 
 * assets for both frontend + backend.
 */
add_action( 'init', 'fdimagebox_for_wordpress_block_editor_block_assets' );
function fdimagebox_for_wordpress_block_editor_block_assets() { // phpcs:ignore
	// Register block styles for both frontend + backend.
	wp_register_style(
		'fdimageboxfwpeb-style-css', // Handle.
		plugins_url( 'loader/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
		array( 'wp-editor' ), 
		null 
	);
	 // Clock CSS.	
	wp_enqueue_style('fd-imagebox-styler',plugins_url( 'include/css/stylerloader.css', dirname( __FILE__ ) ), array() );
	
	// Register block editor script for backend.
	wp_register_script(
		'fdimageboxfwpeb-block-js', 
		plugins_url( '/loader/blocks.build.js', dirname( __FILE__ ) ), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), 
		null, 
		true 
	);

	// Register block editor styles for backend.
	wp_register_style(
		'fdimageboxfwpeb-block-editor-css', // Handle.
		plugins_url( 'loader/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), 
		null 
	);

	// WP Localized globals. 
	wp_localize_script(
		'fdimageboxfwpeb-block-js',
		'cgbGlobal', 
		[
			'pluginDirPath' => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'  => plugin_dir_url( __DIR__ ),			
		]
	);
	wp_localize_script(
		'fdimageboxfwpeb-block-js',
		'PreinfoboxBlocksettings',
		array(
			'defaultSrcImg' => FD_IMAGEBOX_SRC . 'include/img/img1.jpg',			
		)
	);

	/**
	 * Register Gutenberg block on server-side.
	 *
	 * Register the block on server-side to ensure that the block
	 * scripts and styles for both frontend and backend are enqueued when the editor loads.	 
	 *
	 */
	register_block_type(
		'cgb/fdimagebox-for-wordpress-editor-block', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'fdimageboxfwpeb-style-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'fdimageboxfwpeb-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'fdimageboxfwpeb-block-editor-css',			
		)
	);
}
// Enqueue block_categories name to editor box.
add_filter( 'block_categories', 'fdimageboxfwpeb_category', 10, 2);
function fdimageboxfwpeb_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'flickdevs-blocks',
				'title' => 'Flickdevs Blocks',
			),
		)
	);
}