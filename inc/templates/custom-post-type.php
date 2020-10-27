<?php

/* 

@package photolensor

  ===================
    THEME CUSTOM POST TYPES
  ===================

*/

$contact = get_option( 'activate_contact_form' );
if( @$contact == 1 ) {
  add_action( 'init', 'photolensor_contact_post_type');

  add_filter( 'manage_photolensor-contact_posts_columns', 'photolensor_set_contact_columns' );

  add_action( 'manage_photolensor-contact_posts_custom_column', 'photolensor_contact_custom_column', 10, 2 );

  add_action( 'add_meta_boxes', 'photolensor_contact_add_meta_box');
  add_action( 'save_post', 'photolensor_save_contact_email_data' );
}

/* CONTACT CPT */
function photolensor_contact_post_type() {
  $labels = array(
    'name'          => 'Messages',
    'singular_name' => 'Message',
    'menu_name'     => 'Messages',
    'name_admin_bar'=> 'Message',
    'add_new_item'  => 'Add New Message',
    'not_found'     => 'No Messages Found.',
    'search_items'  => 'Search Messages'
  );

  $args = array(
    'labels'          => $labels,
    'show_ui'         => true,
    'show_in_menu'    => true,
    'capability_type' => 'post',
    'hierarchical'    => false,
    'menu_position'   => 26,
    'menu_icon'       => 'dashicons-email-alt2',
    'supports'        => array( 'title', 'editor', 'author')
  );

  register_post_type( 'photolensor-contact', $args );
}


/* Adding Admin Columns */
function photolensor_set_contact_columns( $columns ) {
  $newColumns = array();
  $newColumns['title'] = 'Full Name';
  $newColumns['message'] = 'Message';
  $newColumns['email'] = 'Email';
  $newColumns['date'] = 'Date';
  return $newColumns;
}

function photolensor_contact_custom_column( $column, $post_id ) {

  switch( $column ) {
    
    case 'message' :
      echo get_the_excerpt();
      break;

    case 'email' :
      $email = get_post_meta( $post_id, '_contact_email_value_key', true );  
      echo '<a href="mailto:' . $email . '">' . $email . '</a>'; 
      break;
  }
}

/* Contact Meta Boxes */
function photolensor_contact_add_meta_box() {
  add_meta_box( 'contact_email', 
                'User Email', 
                'photolensor_contact_email_callback',
                'photolensor-contact',
                'side'
              );
}

function photolensor_contact_email_callback( $post ) {
  wp_nonce_field( 'photolensor_save_contact_email_data',
                  'photolensor_contact_email_meta_box_nonce'
                 );

  $value = get_post_meta( $post->ID, '_contact_email_value_key', true );  
  
  echo '<label for="photolensor_contact_email_field">User Email Address: </label>';
  echo '<input type="email" id="photolensor_contact_email_field" name="photolensor_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function photolensor_save_contact_email_data( $post_id ) {

  if( ! isset( $_POST['photolensor_contact_email_meta_box_nonce'] ) ) {
    return;
  }

  if( ! wp_verify_nonce( $_POST['photolensor_contact_email_meta_box_nonce'], 'photolensor_save_contact_email_data' ) ) {
    return;
  }

  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return;
  }

  if( ! current_user_can( 'edit_post', $post_id ) ) {
    return;
  }

  if( ! isset( $_POST['photolensor_contact_email_field']) ) {
    return;
  }

  $my_data = sanitize_textarea_field( $_POST['photolensor_contact_email_field'] );

  update_post_meta( $post_id, '_contact_email_value_key', $my_data );

}