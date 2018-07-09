<?php
/**
 * Template Name: Homepage
 *
 * The template for homepage
 *
 */

get_header();
?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<div class="home">
<?php the_content(); ?>
	</div>
	<?php endwhile; endif ;

	wp_reset_query();
?>	



<?php get_footer(); ?>