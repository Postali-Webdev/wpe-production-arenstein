<?php
/**
 * Law Category Interior Page
 * Template Name: Interior
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section id="interior" class="interior">
	<div id="content" class="container">
	
		<div class="main-content">
		
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>    
					<h1><?php the_title(); ?></h1>
					<div><?php the_content(); ?></div>
				<?php endwhile; ?>
			<?php endif; ?> 
		
		</div>

		<div class="sidebar">
		
			<?php get_sidebar(); ?>
		
		</div>

	</div>
</section>
	
<?php get_footer(); ?>