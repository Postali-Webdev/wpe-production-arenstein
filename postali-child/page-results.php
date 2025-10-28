<?php
/**
 * Law Case Results Archive
 * Template Name: Case Results
 * @package Postali Parent
 * @author Postali LLC
**/
get_header(); ?>

<section id="results" class="interior">
	<div class="container">
		<?php
			$custom_query = new WP_Query( 
				array(
					'post_type' => 'results', 
					'order' => 'DESC', 
					'posts_per_page' => -1
					) 
				);
				if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
				<div class="results-holder">
					<h2><?php the_title(); ?></h2>
					<p><?php the_content(); ?></p>
				</div>
		<?php endwhile; endif; wp_reset_query();?>
	</div>
</section>
	
<?php get_footer(); ?>