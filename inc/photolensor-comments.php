<?php

function add_comment_js(){
  if (!is_admin()){
      if (!is_page() AND is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
        wp_enqueue_script( 'comment-reply' );
      }
    }
  }
  add_action('get_header', 'add_comment_js');


//Cancel Reply Link
add_filter('cancel_comment_reply_link', 'photolensor_remove_comment_reply_link' ); 

function photolensor_remove_comment_reply_link($link) {
  return '';
}

// Add the comment reply button to the end of the comment form.
// Remove the my_remove_comment_reply_link filter first so that it will actually output something.
add_action( 'comment_form', 'create_cancel_button');

function create_cancel_button($post_id) {
 remove_filter('cancel_comment_reply_link', 'photolensor_remove_comment_reply_link');
 cancel_comment_reply_link('Ante na doume'); 
}