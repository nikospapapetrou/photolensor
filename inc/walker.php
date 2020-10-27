<!--   
  
  <nav> exist main nav
    <ul> exist main nav list
      <li><a></a></li>
      <li><a></a></li>
      <        <ul>
          <li><a></a></li>
          <li><a></a></li> 
        </ul>
      </li>
    </ul>
  </nav>
  
   -->


<?php

   class Walker_Nav_Primary extends Walker_Nav_menu {

      function start_lvl( &$output, $depth = 1, $args = array() ) {
      
        $indent = str_repeat("\t", $depth);
        $mb_menu = ($depth > 0 ) ? ' sub-menu' : '';
        $output .= "<ul class=\"mb-menu__container dropup$mb_menu depth_$depth\">\n";

      }
   }
   
?>
