<?php get_header(); ?>

<main class="single-post">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'template-parts/content', 'page' ); ?>

<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>