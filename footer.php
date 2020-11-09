
<footer class="main-footer">

<div class="social-media">
    <p class="social-media__text">Contact Us:</p>
    <div class="social-media__icons">
        <a href="https://www.facebook.com/"><img class="icon-moon" src= '<?php bloginfo('template_url'); ?> /assets/images/Social-Icons/facebook.svg' alt="Facebook Link"></a>
        <a href=""><img src= '<?php bloginfo('template_url'); ?>/assets/images/Social-Icons/instagram.svg' alt="Link to Instagram" class="icon-moon"></a>
        <a href=""><img src= '<?php bloginfo('template_url'); ?>/assets/images/Social-Icons/email.svg' alt="Email Adress" class="icon-moon"></a>
    </div>
</div>

<form class="newsletter">
    <label for="email">Email in New Articles:</label>
    <input class="newsletter__input" type="text" name="name" placeholder="John">
    <input class="newsletter__input" type="email" name="email" placeholder="JohnLock@mail.com">
    <button class="newsletter__button hvr-buzz-out" type="submit">Subscribe</button>

</form>

<section class="bloginfo">
    <div class="info">
        <a class="info__text" href="<?php echo site_url( '/about' ) ?>">About</a>
        <a class="info__text" href="<?php echo site_url( '/privacy-policy' ) ?>">Privacy</a>
    </div>

    
</section>
    <div class="copyright">
        <p>photolensor <?php echo get_the_date( 'Y' ); ?> &copy;</p>
    </div>
</footer>

<!--  footer ends here -->

<?php 
  wp_footer(); 
?>
</body>

</html>