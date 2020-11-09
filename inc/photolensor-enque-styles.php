<?php 

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

}

add_action( 'wp_enqueue_scripts', 'Photolensor_enqueue_scripts' );

