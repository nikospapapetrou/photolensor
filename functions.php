<?php 

//Add theme support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat'] );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-logo' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'starter-content' );


//Register Menu  Location

register_nav_menus( [
  'main-menu' => esc_html__('Main Menu', 'Photolensor')
] );


// Widgets areas

function Photolensor_widgets_init() {
  register_sidebar([
    'name'             => esc_html__( 'Main Sidebar', 'Photolensor' ),
    'id'               => 'main-sidebar',
    'description'      => esc_html__( 'Add widgets for main sidebar' ),
    'before_widget'    => '<section class="widget">',
    'after_widget'     => '</section>',
    'before_title'     => '<h2 class="widget-tittle">',
    'after_title'      => '</h2>',
  ]);
}
add_action( 'widgets_init', 'Photolensor_widgets_init' );


/* 

=================
include walker.php 
=================

*/

/* require get_template_directory() . '/inc/walker.php'; */

add_action('wp_head', function() {
  require get_template_directory() . '/inc/walker.php';
});

require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/templates/custom-post-type.php';
require get_template_directory() . '/inc/templates/photolensor-metadata.php';
require get_template_directory() . '/inc/ajax-functions.php';

//Load our styles
require get_template_directory() . '/inc/photolensor-enque-styles.php';
require get_template_directory() . '/inc/photolensor-comments.php';

//comments

function Photolensor_get_post_navigation() {
  //if( get_comments_number() > 1 && get_option( 'page_comments' ) ):
    require get_template_directory() . '/template-parts/photolensor-comment-nav.php';
  //endif;
}






