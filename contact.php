<?php 
  // Template Name: contact
?>

<?php get_header(); ?>

<section class="cnt-container">
  <div class="hr">
    <?php the_title('<h2>', '</h2>') ?>

  </div>
    
  <form id="cnt-form" class="cnt-form" action="" method="post">
  
    <hr>
    <div class="cnt-form__inputs">
      <label for="name">Your name:
      <input id="contact-name" type="text" name="name" minlength="3" placeholder="John">
      <img class="cnt-form__success-icon" src="<?php echo get_theme_file_uri( '/assets/images/icosuccess.svg' ); ?>" alt="success">
      <img class="cnt-form__error-icon" src="<?php echo get_theme_file_uri( '/assets/images/icoWarning.svg' ); ?>" alt="wrong">
      <ol class="input-requirements">
        <li>Must be over 3 characters</li>
        <li>Must Contain Only Leters</li> 
      </ol>
      </label>
     <!--  <small>Error Message</small> -->
    </div>


    <div class="cnt-form__inputs">
      <label for="email">Your email:<!-- </label> -->
      <input id="contact-email" type="email" name="email" placeholder="johnlock@mail.com">
      <img class="cnt-form__success-icon" src="<?php echo get_theme_file_uri( '/assets/images/icosuccess.svg' ); ?>" alt="success">
      <img class="cnt-form__error-icon" src="<?php echo get_theme_file_uri( '/assets/images/icoWarning.svg' ); ?>" alt="wrong">
      <ol class="input-requirements">
        <li>Must be over 8 characters</li>
        <li>Valid Email</li>
      </ol>
      </label>
     <!--  <small>Error Message</small> -->
    </div> 


    <div class="cnt-form__inputs">
      <label for="message">Message:
      <textarea name="message" id="contact-message" placeholder="Your message here..."></textarea>
      <img class="cnt-form__success-icon" src="<?php echo get_theme_file_uri( '/assets/images/icosuccess.svg' ); ?>" alt="success">
      <img class="cnt-form__error-icon" src="<?php echo get_theme_file_uri( '/assets/images/icoWarning.svg' ); ?>" alt="wrong">
      <small>Error Message</small>
      </label>
    </div>



    <input type="submit" id="cn-btn" name="submit" value="Submit">
  </form>


</section>





<?php get_footer(); ?>