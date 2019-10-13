<?php

/* Widgets Start */ 
function humaun_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer1 Widget Area', 'royaltech' ),
		'id' => 'footer1',
		'description' => __( 'The Footer1 widget area', 'royaltech' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-title footer-title-line">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'humaun_widgets_init' );
/*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/ 

