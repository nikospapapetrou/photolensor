<form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="search-form">
    <button class="search-bar__button" type="submit"><img class="search-icon" src='<?php bloginfo('template_url'); ?>/assets/images/Search-menu.svg' alt="search-icon"></button>
    <input class="search-bar__input" type="search" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s">
</form>