<section class="page-php__container">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-php__content' ); ?>>



    <header class="page-php__header">

      <?php the_title('<h1>', '</h1>'); ?>

    </header>

    <main class="page-php__content">

      <div>
        <p><?php the_content(); ?></p>
      </div>

    </main>



  </article>
</section>