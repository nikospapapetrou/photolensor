<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

<?php 
  wp_head(); 
?>
</head>

<!-- ===== body starts =====-->
<body <?php body_class( 'layout' ); ?>>

    <!--  mobile header with logo only -->
    <div class="mb-header">
        <a class="logo-link" href="<?php echo home_url(); ?>"><img class="logo" src = '<?php bloginfo('template_url'); ?>/assets/images/logo.svg' alt="Photolensor Logo"/>
</a>

    </div>
    <!--  mobile header with logo only ends here -->

    <!-- ============ Main Header Starts =================-->
    <header class="main-header" role="navigation">

        <!--================= navigation menu start here -->
        <?php
             $args = [
                'container_aria_label' => 'navigation',
               'theme_location' => 'main-menu',
               'menu_class'     => 'main-nav__list',
               'container'      => 'nav',
               'container_class'=> 'main-nav',
               'walker'         =>  new Walker_Nav_Primary(),
               
             ];
             wp_nav_menu( $args );
             ?>


            <!-- submenu ends here -->
        </nav>
                        <!--======== navigation menu end here ============-->

            <!-- search form -->
        <div class="search-container mb-menu"><a href="javascript:void(0)">Search</a>
            <div class="search-wrapper dropup">
               <?php get_search_form(); ?>
            </div>
        </div>
           <!--  search form ends here -->
        
    </header>
<!--======== main header ends here ============-->
