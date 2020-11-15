<section class="bg-posts-container">
  <article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-articles' ); ?>>

    <section class="bg-posts__wrapper">

      <header class="bg-posts__header">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        <?php the_title('<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>'); ?>
        <div class="bg-posts__meta-inf">
          <p><?php esc_html_e( 'Author: ' ) ?><?php the_author(); ?></p>
          <p>
            <date><?php the_date(); ?></date>
          </p>
        </div>


      </header>

      <main class="bg-posts_content">

        <div>
          <p><?php the_excerpt(); ?></p>
        </div>

        <button class="btn-posts"><a href="<?php the_permalink(); ?>">Read More...</a></button>

      </main>

    </section>

  </article>
</section>