<?php

/*
 @packgage Photolensor

 ================
  AJAX FUNCTIONS
 ================
 */



  //Ajax Hooks
 add_action( 'wp_ajax_nopriv_photolensor_save_user_contact_form', 'photolensor_save_contact');
 add_action( 'wp_ajax_photolensor_save_user_contact_form', 'photolensor_save_contact' );

 function photolensor_save_contact() {

  $name = wp_strip_all_tags($_POST["name"]);
  $email = wp_strip_all_tags($_POST["email"]);
  $message = wp_strip_all_tags($_POST["message"]);
 

/*   if( ! isset($_POST['photolensor-contact-nonce-field'] ) || ! wp_verify_nonce( $_POST['photolensor-contact-nonce-field'], 'photolensor_save_user_contact_form' ) ) {

    wp_send_json_error( [ 'message' => 'Something Wrong'] );

  } */

  //do form stuff
 /*  wp_send_json_success($_POST); */

    // Insert Informations in Custom Post Type in the Admin area
  $args = array(
    'post_title'        => $name,
    'post_content'      => $message,
    'post_author'       => 1,
    'post_status'       => 'publish',
    'post_type'         => 'photolensor-contact',
    'meta_input'        => array(
    '_contact_email_value_key'     => $email
    )
  );

  $postId = wp_insert_post( $args );
   wp_die();
 }