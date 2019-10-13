<?php

/* Includes */
require_once ('includes/camera-slide/custom-post-slide.php');

require_once ('includes/custom-post-product.php');

require_once ('includes/bangla-date-time/bangla-date-time.php');

require_once ('includes/royaltech-branding.php');

require_once ('includes/customization-api.php');



/* Option Tree Settings */
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( 'option-tree/ot-loader.php' );
include_once( 'includes/theme-options.php' );








