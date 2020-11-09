<?php /*
	
@package sunsettheme
*/

if( post_password_required() ){
	return;
}

?>

<div id="comments" class="comments-area">
	
	<?php 
		if( have_comments() ):
		//We have comments
	?>
	
	<h2 class="comment-title">
		<?php
			
			printf(
				esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sunsettheme' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
				
		?>
	</h2>
	
	<?php if( get_comments_number_count() > 1 && get_option( 'page_comments' ) ): ?>
		
		<nav id="comment-nav-top" class="comment-navigation" role="navigation">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="post-link-nav">
						<span class="sunset-icon sunset-chevron-left" aria-hidden="true"></span> 
						<?php previous_comments_link( esc_html__( 'Older Comments', 'sunsettheme' ) ) ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 text-right">
					<div class="post-link-nav">
						<?php next_comments_link( esc_html__( 'Newer Comments', 'sunsettheme' ) ) ?>
						<span class="sunset-icon sunset-chevron-right" aria-hidden="true"></span>
					</div>
				</div>
			</div><!-- .row -->
		</nav>
		
	<?php endif; ?>
	
	<ol class="comment-list">
		
		<?php 
			
			$args = array(
				'walker'			=> null,
				'max_depth' 		=> '',
				'style'				=> 'ol',
				'callback'			=> null,
				'end-callback'		=> null,
				'type'				=> 'all',
				'reply_text'		=> 'Reply',
				'page'				=> '',
				'per_page'			=> '',
				'avatar_size'		=> 64,
				'reverse_top_level' => null,
				'reverse_children'	=> '',
				'format'			=> 'html5',
				'short_ping'		=> false,
				'echo'				=> true
			);
			
			wp_list_comments( $args );
		?>
		
	</ol>
	
	<?php if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>
		
		<nav id="comment-nav-bottom" class="comment-navigation" role="navigation">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="post-link-nav">
						<span class="sunset-icon sunset-chevron-left" aria-hidden="true"></span> 
						<?php previous_comments_link( esc_html__( 'Older Comments', 'sunsettheme' ) ) ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 text-right">
					<div class="post-link-nav">
						<?php next_comments_link( esc_html__( 'Newer Comments', 'sunsettheme' ) ) ?>
						<span class="sunset-icon sunset-chevron-right" aria-hidden="true"></span>
					</div>
				</div>
			</div><!-- .row -->
		</nav>
		
	<?php endif; ?>
	
	<?php 
		if( !comments_open() && get_comments_number() ):
	?>
		 
		 <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sunsettheme' ); ?></p>
		 
	<?php
		endif;
	?>
		
	<?php	
		endif;
	?>
	
	<?php comment_form(); ?>
	
</div><!-- .comments-area -->


<!-- Photlensor comment form -->

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


<?php
// awesome semantic comment

function better_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	
	if ( 'article' == $args['style'] ) {
		$tag = 'article';
		$add_below = 'comment';
	} else {
		$tag = 'article';
		$add_below = 'comment';
	}

	?>
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
		<figure class="gravatar"><?php echo get_avatar( $comment, 65, 'http://hey.georgie.nu/wp-content/themes/heygeorgie/images/bg.png', 'Author’s gravatar' ); ?></figure>
		<div class="comment-meta post-meta" role="complementary">
			<h2 class="comment-author">
				<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
			</h2>
			<time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
			<?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
			<?php if ($comment->comment_approved == '0') : ?>
			<p class="comment-meta-item">Your comment is awaiting moderation.</p>
			<?php endif; ?>
		</div>
		<div class="comment-content post-content" itemprop="text">
			<?php comment_text() ?>
			<div class="comment-reply">
				<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>
	<?php }

// end of awesome semantic comment

function better_comment_close() {
	echo '</article>';
}



/*
============================
			walker comment 
============================
*/
wp_list_comments( array(
	'walker'        => new Bootstrap_Comment_Walker(),
));

class Bootstrap_Comment_Walker extends Walker_Comment {
	protected function html5_comment( $comment, $depth, $args ) {

?><li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>

	<?php if ( 0 != $args['avatar_size'] ): ?>
	<div class="media-left">
			<a href="<?php echo get_comment_author_url(); ?>" class="media-object"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
	</div>
	<?php endif; ?>

	<div class="media-body">
	<?php printf( '<h4 class="media-heading">%s</h4>', get_comment_author_link() ); ?>
	<div class="comment-metadata">
			<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
					<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?>
					</time>
			</a>
	</div><!-- .comment-metadata -->

	<?php if ( '0' == $comment->comment_approved ) : ?>
	<p class="comment-awaiting-moderation label label-info"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
	<?php endif; ?>             

	<div class="comment-content">
			 <?php comment_text(); ?>
	</div>

	<ul class="list-inline">
			<?php edit_comment_link( __( 'Edit' ), '<li class="edit-link">', '</li>' ); ?>

	<?php
			comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<li class="reply-link">',
					'after'     => '</li>'
			) ) );  
	?>
	</ul>
	</div>      
<?php
	}   
}


class Custom_Walker_Comment extends Walker_Comment {
 
	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {

			$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

			?>
			<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
					<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
							<footer class="comment-meta">
									<div class="comment-author vcard">
											<?php
											$comment_author_link = get_comment_author_link( $comment );
											$comment_author_url  = get_comment_author_url( $comment );
											$comment_author      = get_comment_author( $comment );
											$avatar              = get_avatar( $comment, $args['avatar_size'] );
											if ( 0 != $args['avatar_size'] ) {
													if ( empty( $comment_author_url ) ) {
															echo $avatar;
													} else {
															printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url );
															echo $avatar;
													}
											}
											/*
											 * Using the `check` icon instead of `check_circle`, since we can't add a
											 * fill color to the inner check shape when in circle form.
											 */
											if ( custom_is_comment_by_post_author( $comment ) ) {
													printf( '<span class="post-author-badge" aria-hidden="true">%s</span>', custom_get_icon_svg( 'check', 24 ) );
											}

											/*
											 * Using the `check` icon instead of `check_circle`, since we can't add a
											 * fill color to the inner check shape when in circle form.
											 */
											if ( custom_is_comment_by_post_author( $comment ) ) {
													printf( '<span class="post-author-badge" aria-hidden="true">%s</span>', custom_get_icon_svg( 'check', 24 ) );
											}

											printf(
													/* translators: %s: comment author link */
													wp_kses(
															__( '%s <span class="screen-reader-text says">says:</span>', 'custom' ),
															array(
																	'span' => array(
																			'class' => array(),
																	),
															)
													),
													'<b class="fn">' . get_comment_author_link( $comment ) . '</b>'
											);

											if ( ! empty( $comment_author_url ) ) {
													echo '</a>';
											}
											?>
									</div><!-- .comment-author -->

									<div class="comment-metadata">
											<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
													<?php
															/* translators: 1: comment date, 2: comment time */
															$comment_timestamp = sprintf( __( '%1$s at %2$s', 'custom' ), get_comment_date( '', $comment ), get_comment_time() );
													?>
													<time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo $comment_timestamp; ?>">
															<?php echo $comment_timestamp; ?>
													</time>
											</a>
											<?php
													$edit_comment_icon = custom_get_icon_svg( 'edit', 16 );
													edit_comment_link( __( 'Edit', 'custom' ), '<span class="edit-link-sep">&mdash;</span> <span class="edit-link">' . $edit_comment_icon, '</span>' );
											?>
									</div><!-- .comment-metadata -->

									<?php if ( '0' == $comment->comment_approved ) : ?>
									<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'custom' ); ?></p>
									<?php endif; ?>
							</footer><!-- .comment-meta -->

							<div class="comment-content">
									<?php comment_text(); ?>
							</div><!-- .comment-content -->

					</article><!-- .comment-body -->

					<?php
					comment_reply_link(
							array_merge(
									$args,
									array(
											'add_below' => 'div-comment',
											'depth'     => $depth,
											'max_depth' => $args['max_depth'],
											'before'    => '<div class="comment-reply">',
											'after'     => '</div>',
									)
							)
					);
					?>
			<?php
	}
}