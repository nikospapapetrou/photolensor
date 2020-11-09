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




//Load our styles
require get_template_directory() . '/inc/photolensor-enque-styles.php';




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



//comments

function Photolensor_get_post_navigation() {
  //if( get_comments_number() > 1 && get_option( 'page_comments' ) ):
    require get_template_directory() . '/template-parts/photolensor-comment-nav.php';
  //endif;
}

 function add_comment_js(){
  if (!is_admin()){
      if (!is_page() AND is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
        wp_enqueue_script( 'comment-reply' );
      }
    }
  }
  add_action('get_header', 'add_comment_js');



/*   //Cancel Reply Link
  function my_remove_comment_reply_link($link) {
    return '';
}
add_filter('cancel_comment_reply_link', 'photolensor_remove_comment_reply_link', 10);

// Add the comment reply button to the end of the comment form.
// Remove the my_remove_comment_reply_link filter first so that it will actually output something.
function my_after_comment_form($post_id) {
    remove_filter('cancel_comment_reply_link', 'photolensor_remove_comment_reply_link', 10);
    cancel_comment_reply_link('Cancel reply');
}
add_action('comment_form', 'my_after_comment_form', 99);  */