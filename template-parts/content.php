
<section class="bg-posts-container">
    <article  id="post-<?php the_ID(); ?>" <?php post_class( 'single-post__content' ); ?>>

    <section class="bg-posts__wrapper">

      <header class="bg-posts__header">
        <?php the_post_thumbnail(); ?>
        <?php the_title('<h1>', '</h1>'); ?>

        <p><?php esc_html_e( 'Author: ' ) ?><?php the_author_posts_link(); ?></p>
        <p><date><?php the_date(); ?></date></p>

      </header>

      <main class="bg-posts_content">

        <div>
          <p><?php the_content(); ?></p> 
        </div>

      </main>

    </section>

  </article>
</section>

<?php if( comments_open() ) : ?>

<?php comments_template(); ?>

<?php endif; ?>







