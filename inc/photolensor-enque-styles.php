<?php 

// Add  CSS
function Photolensor_enqueue_styles() {

wp_enqueue_style( 'custom-fonts', get_stylesheet_directory_uri() . 
'/assets/web-fonts.css', [], time(), 'all' );

wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . 
'/style.css', [], time(), 'all' );

wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . 
'/assets/normalize.css', [], time(), 'all' );

wp_enqueue_style( 'main', get_stylesheet_directory_uri() . 
'/assets/main.css', ['normalize'], time(), 'all' ); 


}
add_action ( 'wp_enqueue_scripts', 'Photolensor_enqueue_styles' );


//Add JavaScript

function Photolensor_enqueue_scripts() {

  wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . 
  '/assets/main.js', [], time(), true );
  wp_localize_script( 'main-js', 'jsforwp_globals', array(
    'ajax_url'  => admin_url( 'admin-ajax.php' ),
    /* 'nonce'     => wp_create_nonce( 'photolensor_save_user_contact_form' ) */
  ) );
}

add_action( 'wp_enqueue_scripts', 'Photolensor_enqueue_scripts' );

