<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
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

  
    <h2 class="comments-title">

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

  <?php 
  
    comment_form(); 
  
  ?>

</div><!-- comments-area -->
 
