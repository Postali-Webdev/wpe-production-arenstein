<?php
/**
 * Child Template
 * Template Name: Child Page
 *
 * @package Postali Parent
 * @author Postali LLC
**/

$blogDefault = get_field('default_blog_image', 'options');
get_header();?>

<section id="single"  class="interior">
	<div class="container">

		<nav class="breadcrumb">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('
				<p id="breadcrumbs">','</p>');
			}
			?>
        </nav><!-- breadcrumb -->

        <div id="single-flex">
	
			<article<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?> class="sidebar-active"<?php endif; ?>>

				

		        <h1><?php the_title(); ?></h1>

				<div class="article-single-featured-image">
					<?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
					<?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
						<img src="<?php echo $featImg[0]; ?>" class="featured-image"  />
					<?php } else { ?>
						<img src="<?php echo $blogDefault; ?>" class="featured-image"/>
					<?php } ?>
				</div>
				
		        


				<?php the_content(); ?>


			</article>	

			

			<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
			<aside class="main-sidebar">
				<?php dynamic_sidebar( 'main-sidebar' ); ?>

			</aside>
			<?php endif; ?>

		</div><!--end of single-flex -->

		
	</div>
</section>
	

<?php get_footer(); ?>