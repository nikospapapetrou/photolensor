


  <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post__container' ); ?>>

    <section class="single-post__wrapper">

      <header class="single-post__header">

        <?php the_title('<h1>', '</h1>'); ?>
        <?php the_post_thumbnail(); ?>

        <div class="single-post__meta-information">
          <p>
            <?php esc_html_e( 'Author: ' ) ?>
            <?php the_author(); ?>
            <date>
              <?php the_date(); ?>
            </date>
          </p>
        </div>

      </header>

      <main class="single-post__content">

        <section>
          <p><?php the_content(); ?></p>
        </section>
        </main>

        <footer>
          <mark><?php the_category() ?></mark>
          <mark><?php the_tags() ?></mark>
        </footer>

      

    </section>

  </article>


<?php if( comments_open() ) : ?>

<?php comments_template(); ?>

<?php endif; ?>