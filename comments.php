<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Photolensor
 * @subpackage Photolensor
 * @since Photolensor 1.0
 */

 /*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
  return;
?>

<div id="comments" class="comments-area">

  <?php 
    if( have_comments() ):
    //We have comments
  ?>

<?php 

$args = [
           'fields'               => [
           'author'               => '<label for="author">Name: *</label><input id="author" name="author" type="text" value="" size="30" maxlength="245" placeholder="John Lock" required="required">',
           'email'                => '<label for="email">Email: *</label><input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" placeholder="johnlock@gmail.com" required="required">',
           
         ], 
          'format'                => 'html5',
          'submit_field'          => '<section class="button-choices"><button class="form-submit">%1$s %2$s</button></section>', 
          'comment_field'         => '<label for="textarea">Your Comment: *</label><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525"  placeholder="Your comment here..." required="required"></textarea>',
          'title_reply_before'    =>  '<h3 id="reply-title" class="comment-reply-title">',
          'title_reply_after'     => '</h3>',
          'cancel_reply_before'   => '</form>',
          
          /* 'cancel_reply_after'  =>   */


];

  comment_form( $args ); 

?>

   <!-- starting comment list -->
    <h2 class="comments-title">
        hello
      <?php 
        printf(
          esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'Photolensor') ),
          number_format_i18n( get_comments_number() ),
          '<span>' .get_the_title(). '</span>'
        );
      ?>
      
    </h2>
  
    <?php 
      Photolensor_get_post_navigation();
    ?>

      <ol class="comment-list">

        <?php
        
          $args = array(
            'style'       => 'ol',
            'type'        => 'all',
            'avatar_size' => 32,
            'echo'        => true,

          );
          wp_list_comments( $args );
        ?>

      </ol>

      <?php 
        Photolensor_get_post_navigation();
      ?>    

  <?php 
    if( !comments_open() && get_comments_number() ):
  ?>

      <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'Photolensor' ); ?></p>

  <?php
      endif;
  ?>

  <?php 
    endif;
  ?>



</div><!-- comments-area -->
