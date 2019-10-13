<?php

//menu function
function register_humaun_menu() {
  register_nav_menu('mainmenu',__( 'Header Menu' ));
 
}
// Hooking up our function to theme setup
add_action( 'init', 'register_humaun_menu' );


//Query
<?php
wp_nav_menu( array( 
'theme_location' => 'mainmenu', 
'container'       	=> false,	
'menu_id' 			=> '', 
'fallback_cb' 		=> '__return_false',
'menu_class' 		=> 'sp-megamenu-parent menu-animation-fade-up d-none d-lg-block'
) 
); 
?>




// another way menu function//
register_nav_menus(array(
	'mainmenu' => ('Main Menu'),
));