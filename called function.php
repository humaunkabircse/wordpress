<?php

//header and footer call
<?php get_header(); ?>
<?php get_footer(); ?>
	
	
	
//Dynamic title call inside title
<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'rt' ), max( $paged, $page ) );
?>	




//Home directory 
<a href="<?php bloginfo('home'); ?>" rel="home">


//file link
<?php bloginfo('template_url'); ?>/


//style sheet call inside head
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />




//wp header call inside head
	<?php wp_head();?>





//themplete called (camera-basic-slider is php page)
<?php get_template_part( 'camera-basic-slider' ); ?>



/* Includes page*/
require_once ('includes/camera-slide/custom-post-slide.php');







/*Dynamic copyright queryStart*/
<?php 
if (get_theme_mod( 'copyright_text' )) : echo get_theme_mod( 'copyright_text'); 
else: 
echo royaltechbd_copyright(); echo ' '; bloginfo('name'); echo ', All Rights Reserved.'; 
endif; 
?>
/* Dynamic Copyright Date Start */	
function royaltechbd_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}
/* Dynamic Copyright Date End */	









//query
<?php echo excerpt(10); ?>

/* Dynamic Excerpt Start */
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('/\[[^\]]*\]/','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]>', $content);
      return $content;
    }
/*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/






//Query Post publish last date
<?php kabir_site_last_updated_date('F j, Y') ?>

/* Site Last Updated START */
function kabir_site_last_updated_date($d = '') {
	$recent = new WP_Query("showposts=1&orderby=modified&post_status=publish");
	if ( $recent->have_posts() ) {
		while ( $recent->have_posts() ) {
			$recent->the_post();
			$last_update_date = get_the_modified_date($d);
		}
		echo $last_update_date;
	}
	else
		echo 'No posts.';
}

function kabir_site_last_updated_time($d = '') {
	$recent = new WP_Query("showposts=1&orderby=modified&post_status=publish");
	if ( $recent->have_posts() ) {
		while ( $recent->have_posts() ) {
			$recent->the_post();
			$last_update_time = get_the_modified_time($d);
		}
		echo $last_update_time;
	}
	else
		echo 'No posts.';
}
/* Site Last Updated END */






//query
<?php the_breadcrumb(); ?>

//breadcrumb function
function the_breadcrumb() {
    if (!is_home()) {
        echo '<a href="';
        echo get_option('home');
        echo '"> হোম ';
        echo "</a> / ";
        if (is_category() || is_single()) {
            the_category('title_li=');
            if (is_single()) {
                echo " / ";
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        }
    }
}
