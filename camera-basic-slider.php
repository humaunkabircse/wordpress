 	<div class="fluid_container">
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1" style="margin-bottom:15px">
			<?php $loop = new WP_Query( array('post_type' => array('slides'),'showposts' =>4 ) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>	
            <div data-thumb="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'slides-image', true); echo $image_url[0];  ?>" data-src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'slides-image', true); echo $image_url[0];  ?>"> </div>
			<?php endwhile; ?>
        </div><!-- #camera_wrap_1 -->
    </div><!-- .fluid_container -->
