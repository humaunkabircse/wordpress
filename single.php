<?php 

//sigle page query
<?php if(have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	
				
	<?php endwhile; ?>
<?php endif; ?>  




<?php echo excerpt(10); ?>

<?php the_permalink(); ?>



//related post

<?php
$related = get_posts( array( 
'category__in' => wp_get_post_categories($post->ID), 
'numberposts' => 4, 
'post__not_in' => array($post->ID) ) );
if( $related ) foreach( $related as $post ) {
setup_postdata($post); ?>



<?php }
wp_reset_postdata(); ?>