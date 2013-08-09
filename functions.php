<?php
/** Load directories */
require_once( get_template_directory() . '/lib/init.php');

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', __( 'Copyblogger 2 Theme', 'copyblogger2' ) );
define( 'CHILD_THEME_URL', 'http://www.wpstuffs.com/copyblogger' );
define( 'CHILD_THEME_VERSION', '2.0.0' );

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add Viewport meta tag for mobile browsers */
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );

/** Support for various Image sizes */
add_image_size('home', 220, 180, TRUE);
add_image_size('home-featured', 580, 300, TRUE);

//* Customize the entry meta in the entry header */
add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter($post_info) {
  $post_info = __( 'Posted on', 'copyblogger2' ) . ' [post_date]  [post_comments] [post_edit]';		
  return $post_info;
}

