<?php
/**
 * Parent Template
 * Template Name: Parent Page
 *
 * @package Postali Parent
 * @author Postali LLC
**/
get_header(); ?>

<?php 
if ( has_post_thumbnail( $post->ID ) ) :
  $imageInfo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  $imageUrl = $imageInfo[0];
else:
  $imageUrl = get_field('default_banner', 'options'); 
endif;

?>

<div id="blog-holder">
	<div id="blog-banner">

		<div class="index_page featured-wrap" style="background-image: url('<?php echo $imageUrl; ?>'); background-repeat:no-repeat;">
			<div class="container">

				<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
			
				<?php  $icons = get_field('top_icons'); if ($icons): ?>
					<div class="icons"><?php echo $icons; ?></div>
				<?php endif; ?>

				<h1 class="no-margin"><span></span><?php the_title();?></h1>
			
				<div class="the-content">
					<p><?php the_field('sub_title'); ?></p>
				</div>

				<div class="side-wrangle">
					<?php dynamic_sidebar( 'header' ); ?>
					
					<div class="view-blogs">
						<h2>Read More</h2>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>

<section id="blog-tan" class="parent">
	<div class="container">

		<div class="vertical-green-line"></div>
		
		<div id="single-flex">

			<article <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?> class="sidebar-active"<?php endif; ?>>
					
				<?php the_content(); ?>
			</article>

			<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
				<aside class="main-sidebar">
				
					<?php dynamic_sidebar( 'main-sidebar' ); ?>

				</aside>
			<?php endif; ?>

		</div>
	</div>
</section>

<section id="blog-tan" class="lightest">
	<div class="container extra">
	
		<?php the_field('section_2'); ?>

	</div>

	<div class="cont-mod cat-parent-slider" id="attorneys-slider">

			<div class="mod1"></div>
			<div class="mod2">
				<h3 class="bebas push-down">Meet the team with a different approach</h3>
					<?php get_template_part('block', 'attorneys');?>

			</div>
			<div class="mod3"></div>

	</div><!-- end of container-modified -->

	<section>
		<div class="container">
			<a href="/about/" class="learn-firm-more" tabindex="0">Learn More About The Firm</a>
		</div>
	</section>

	<?php if( get_field('section_3') ): ?>
		<div class="container extra">
				<p><?php the_field('section_3'); ?></p>
		</div>
	<?php endif; ?>
	
</section>

<?php get_footer(); ?>