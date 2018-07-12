<?php
/**
 * Template Name: Agents Visit View
 *
 * The template for homepage
 *
 */
if ( !is_user_logged_in() ) { auth_redirect(); }
get_header();
?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php the_content(); ?>
	
	<?php endwhile; endif ;

	wp_reset_query();
?>	
<?php get_footer(); ?>