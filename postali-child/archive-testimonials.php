<?php
/**
 * Post archive template.
 *
 * @package Postali Parent
 * @author Postali LLC
**/

get_header(); ?>

<section id="testimonials" class="interior">
	<div class="container">
		<?php
			$custom_query = new WP_Query( 
				array(
					'post_type' => 'testimonials', 
					'order' => 'DESC', 
					'posts_per_page' => -1
					) 
				);
				if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
				
				<div class="testimonial-holder">
					<h2><?php the_title(); ?></h2>
					<p><?php the_content(); ?></p>
					<p><?php the_field('name'); ?></p>
				</div>
				
		<?php endwhile; endif; wp_reset_query();?>
	</div>
</section>

<?php get_footer();
