<?php
/**
 * About Template
 * Template Name: About
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

// Sticky Arnstein & Anderson at top of attorney query
$sticky = array('186', '129');

?>

<div id="blog-holder">
	<div id="blog-banner">

		<div class="index_page featured-wrap" style="background-image: url('<?php echo $imageUrl; ?>'); background-repeat:no-repeat;">
			<div class="container">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
			<h1><span></span><?php the_title();?></h1>
			<div class="the-content"><?php the_content(); ?></div>

			<div class="side-wrangle"><?php dynamic_sidebar( 'header' ); ?><div class="view-blogs"><h2>Meet Our Team</h2></div> </div>

			</div>
		</div>

	</div>
</div>



<section id="blog-tan">
<div class="container blog-posts">

	<div class="vertical-green-line"></div>
	
	<div>

			<div class="blog-feed">

				<?php if( have_rows('attorneys_repeater' , 'options') ): ?>

				<?php while( have_rows('attorneys_repeater' , 'options') ): the_row(); 

					// vars
					$attorney = get_sub_field('single_attorney');
					?>

					<?php if( $attorney ): ?>
					
					<?php $post = $attorney; setup_postdata( $post ); ?>

					<article class="attorneys">

						<a href="<?php the_permalink(); ?>"  title="<?php the_title_attribute(); ?>">
							<aside class="bio-image">
							<div><?php the_post_thumbnail(); ?></div>
							</aside>

							<div class="blog-feed-article-content">
									
								
								<h3><?php the_title(); ?></h3>
								<h4><?php the_field('title'); ?></h4>
							</div>
						</a>

							<a href="<?php the_permalink(); ?>" class="btn-new" title="<?php the_title_attribute(); ?>">Read Bio</a>

								
					</article>

					<?php wp_reset_postdata(); ?>

					<?php endif; ?>

				<?php endwhile; ?>

				<?php endif; ?>
			
			</div> <!-- end of blog feed -->

			</div>

	</div>
</div>
</section>

<section id="blog-tan" class="lightest">
	<div class="container fifty">

		<aside>
			<?php the_field('practice_areas'); ?>
		</aside>

		<aside>
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
		</aside>


	</div>
</section>

<?php get_footer(); ?>