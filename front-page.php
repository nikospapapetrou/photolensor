
<?php get_header(); ?>

 
    <!-- hero area starts here  -->
    <section class="hero-area">
        <h1 class="hero-area__title">Photography Blog</h1>
        <p class="hero-area__text">Read and Learn <br>all around Photography</p>
    </section>
    <!-- hero area Ends here  -->

    <!-- Wave animation goes here -->
    <section class="animation-wave">
        <img id="wave" src= '<?php bloginfo('template_url'); ?>/assets/images/wave.svg' alt="Wave animation">
    </section>
    <!-- Wave animation end heres here -->

    <!--  main starts here -->
    <main role="main" class="main-content">
        <img src= '<?php bloginfo('template_url'); ?>/assets/images/garry.svg' alt="Garry the Photographer Illustration" class="garry">
        <div class="main-content--background">
            <div class="main-content__item-two">
                <!-- <svg class="main-content__cam">
                    <use xlink:href="/images/sprites.svg#icon-camera" class="cam">
                    </use>
                </svg> -->
                <h3 class="main-heading-title">Read articles about Photography</h3>
                <p class="main-paragraph">Landscape Photography tips and tricks. Photoshop tutorials and dslr theory.</p>
            </div>
        </div>
    </main>
    <!--  main Ends here -->

    <section class="animation-bottom">
        <img id="wave-bottom" src= '<?php bloginfo('template_url'); ?>/assets/images/wave.svg' alt="Wave animation">
    </section>

    <!-- gallery starts here -->
    <section class="gallery">
        <img class="gallery__imgs img1" src= '<?php bloginfo('template_url'); ?>/assets/images/cheimaditida-lake.jpg' alt="Lake Cheimaditida">
        <img class="gallery__imgs img2" src= '<?php bloginfo('template_url'); ?>/assets/images/nymfaio-florinas.jpg' alt="Nymfaio Florinas">
        <img class="gallery__imgs img3" src= '<?php bloginfo('template_url'); ?>/assets/images/Θεσσαλονίκη.jpg' alt="Thessaloniki">
        <img class="gallery__imgs img4" src= '<?php bloginfo('template_url'); ?>/assets/images/Parga.jpg' alt="Parga">
        <img class="gallery__imgs img5" src= '<?php bloginfo('template_url'); ?>/assets/images/lake-cheimaditida.jpg' alt="Lake Cheimaditida">
    </section>

    <?php get_footer(); ?>


