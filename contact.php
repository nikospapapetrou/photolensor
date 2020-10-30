<?php 
  // Template Name: contact
?>

<?php get_header(); ?>

<section class="cnt-container">
        <div class="hr">
            <h2>Write us</h2>
            
        </div>

        <form id="cnt-form" class="cnt-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
            <hr>
            <label for="name">Your name:</label>
            <input type="text" name="name" placeholder="John" required>
            <label for="email">Your email:</label>
            <input type="email" name="email" placeholder="johnlock@mail.com" required>
            <label for="message">Message:</label>
            <textarea name="message" id="#message" placeholder="Your message here..."></textarea>
            <input type="submit" id="cn-btn" name="submit" value="Submit">
        </form>
    </section>
  







<?php get_footer(); ?>