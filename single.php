<?php get_header(); ?>

<main class="single-post">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'template-parts/content' ); ?>

<?php endwhile; else: ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</main>

<h1>single-php</h1>

<?php get_footer(); ?>