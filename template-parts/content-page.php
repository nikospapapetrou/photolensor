
<section class="bg-posts-container">
    <article  id="post-<?php the_ID(); ?>" <?php post_class( 'single-post__content' ); ?>>

    <section class="bg-posts__wrapper">

      <header class="bg-posts__header">
    
        <?php the_title('<h1>', '</h1>'); ?>

        

      </header>

      <main class="bg-posts_content">

        <div>
          <p><?php the_content(); ?></p> 
        </div>

      </main>

    </section>

  </article>
</section>









