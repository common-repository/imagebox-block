<?php
/**
 * Plugin Name:     Imagebox Block
 * Plugin URI:      https://flickdevs.com/gutenberg/
 * Author:          FlickDevs
 * Author URI:      https://flickdevs.com/
 * Version:         1.0.2
 * Description:     A simple imagebox plugin for WordPress block editor(gutenberg) with 3 different styles
 *
 *
 * @since			1.0.0
 * @package         FDGB
 * @author 			FlickDevs
 * 
*/


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
define( 'FD_IMAGEBOX_SRC', plugins_url('/', __FILE__) );
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';