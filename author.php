<?php get_header(); ?>

<div class="author-bio">
  <h1><?php the_archive(); ?></h1>
  <p>
    <?php echo the_author_meta( 'description', $post->post_author ); ?>
  </p>
</div>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'template-parts/content-posts' ); ?>

<?php endwhile; else: ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

<?php echo paginate_links() ?>

<h1>archive.php</h1>


<?php get_footer(); ?>

