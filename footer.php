
<footer class="main-footer">

<div class="social-media">
    <p class="social-media__text">Contact Us:</p>
    <div class="social-media__icons">
        <a id="facebook" href="https://www.facebook.com/"><img class="icon-moon" src= '<?php bloginfo('template_url'); ?> /assets/images/Social-Icons/facebook.svg' alt="Facebook Link"><span class="tooltip-fb">Facebook</span></a>
        <a id="instagram" href=""><img id="instagram" src= '<?php bloginfo('template_url'); ?> /assets/images/Social-Icons/instagram.svg' alt="Link to Instagram" class="icon-moon"><span class="tooltip-in">Instagram</span></a>
        <a id="social-email" href="mailto:nikospap1991@hotmail.gr"><img src= '<?php bloginfo('template_url'); ?>/assets/images/Social-Icons/email.svg' alt="Email Adress" class="icon-moon"><span class="tooltip-email">Email Us</span></a>
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
    <div class="copyright">
        <p>photolensor <?php echo get_the_date( 'Y' ); ?> &copy;</p>
    </div>
</section>

    
</footer>

<!--  footer ends here -->

<?php 
  wp_footer(); 
?>
</body>

</html>