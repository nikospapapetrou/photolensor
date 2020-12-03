<?php get_header(); ?>

<section class="page-php">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'template-parts/content', 'page' ); ?>

<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>