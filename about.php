<?php 
  // Template Name: about
?>

<?php get_header(); ?>

<body <?php body_class( 'about-us-page' ); ?>>

 <div class="container-banner">
    <h2 class="about-us"><?php the_title() ?></h2>
 </div>

<div class="nikos-wrapp">
  <div class="nikos-container">
    <img class="nikos" src = '<?php bloginfo('template_url'); ?>/assets/images/nikos-papapetrou.jpg' alt="Nikos Papapetrou">
    <div class="about-p"><?php the_content() ?></div>
  </div>
</div>

</body> 







<?php get_footer(); ?>