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

//* Add post navigation (requires HTML5 theme support)
add_action( 'genesis_entry_footer', 'genesis_prev_next_post_nav', 15 );

/** Support for different color style options */
add_theme_support( 'genesis-style-selector', array(
	'copyblogger-blue'		=> 'Blue',
	'copyblogger-green'	=> 'Green',
	'copyblogger-black'	=> 'Black',
	'copyblogger-white'		=> 'Hybrid',
) );

//* Load Lato and Merriweather Google fonts
add_action( 'wp_enqueue_scripts', 'custom_load_google_fonts' );
function custom_load_google_fonts() {
	wp_enqueue_style( 'google-font', 'http://fonts.googleapis.com/css?family=Lato:300,400,700|PT+Sans:400,700', array(), PARENT_THEME_VERSION );
}

/** Reposition the breadcrumbs */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_entry_header', 'genesis_do_breadcrumbs',7 );

/** Customize breadcrumbs display */
add_filter( 'genesis_breadcrumb_args', 'balance_breadcrumb_args' );
function balance_breadcrumb_args( $args ) {
	$args['home'] = 'Home';
	$args['sep'] = ' ';
	$args['list_sep'] = ', '; // Genesis 1.5 and later
	$args['prefix'] = '<div class="breadcrumb"><div class="wrap">';
	$args['suffix'] = '</div></div>';
	$args['labels']['prefix'] = '<span class="home">You are here :</span>';
	return $args;
}

add_filter( 'genesis_comment_list_args', 'childtheme_comment_list_args' );
function childtheme_comment_list_args( $args ) {
    $args['avatar_size'] = 40;
	return $args;
}

/** Footer Copyright notice */
add_filter('genesis_footer_output', 'footer_output_filter', 10, 3);
function footer_output_filter( $output, $backtotop_text, $creds_text ) {
    $creds_text = '<p>Copyright [footer_copyright] - <a href="'. trailingslashit( get_bloginfo('url') ) .'" title="'. esc_attr( get_bloginfo('name') ) .' rel="dofollow"">'.get_bloginfo('name').'</a>';
   
	  $output = '<div class="gototop"> [footer_backtotop text="Return to Top" href="#"] </div>' . '<div class="creds">' . $creds_text . ' | design by <a href="http://www.wpstuffs.com">WPStuffs</a> </div>' ;
      return $output;
}