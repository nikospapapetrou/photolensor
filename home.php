<?php get_header(); ?>

<main class="bg-posts">
 


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'template-parts/content-posts' ); ?>

<?php endwhile; else: ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</main>

<?php echo paginate_links() ?>


<?php get_footer(); ?>

