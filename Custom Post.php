<?php

// Our custom post type function
function create_posttype_slider() {
    register_post_type( 'slide',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Slide' ),
                'singular_name' => __( 'slide' ),
				'add_new'               => __( 'Add New Slide', 'textdomain' ),
				'add_new_item'          => __( 'Add New Slide', 'textdomain' ),
            ),
            'public' => true,
			'supports'            => array( 'title', 'thumbnail' ),
            'has_archive' => true,
            'rewrite' => array('slug' => 'slide'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype_slider' );




////custom post query
<?php
$humaunslider = array( 
'post_type' => 'slide', 
'meta_query' => array(array('key' => '_thumbnail_id')),//if have image
'posts_per_page' => -1 );
$loop = new WP_Query( $humaunslider );
while ( $loop->have_posts() ) : $loop->the_post();
?>


<?php endwhile; ?>  



//Query custom post thumbnails
<?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'sliderimage', true); echo $image_url[0];  ?>

// post thumbnails
<?php the_post_thumbnail('medium', array('class' => '')); ?>	
