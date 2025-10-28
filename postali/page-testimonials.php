<?php
/**
 * Post archive template.
 * Template Name: Testimonials
 * @package Postali Parent
 * @author Postali LLC
 */
$args = array (
	'post_type' => 'testimonials',
	'post_per_page' => '10',
	'post_status' => 'publish',
	'order' => 'DESC',
);
$the_query = new WP_Query($args);
get_header(); ?>
	<section id="page-banner" class="banner">
		<?php get_template_part('block', 'banner');?>
	</section>

	<div class="container">
		
		<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 

		<div class="content">
			<div class="main-content" id="testimonial-feed">
			
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="single-testimonial-container">
					<h2><?php the_title(); ?></h2>
					<div class="testimonial-content"><?php the_content(); ?></div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>

            <?php the_posts_pagination(); ?>

			</div>
			<div class="main-sidebar">

				<?php get_sidebar(); ?>

			</div>
		</div>
	
	</div>

<?php get_footer();
