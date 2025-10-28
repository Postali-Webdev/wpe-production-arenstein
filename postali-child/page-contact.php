<?php
/**
 * Contact Template
 * Template Name: Contact
 *
 * @package Postali Parent
 * @author Postali LLC
 */
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

			<div class="contact-flexy">
				<div><h1><span></span><?php the_title();?></h1></div>
				<div class="the-content"><?php the_content(); ?></div>
			</div>

			<div class="contact-flexy last-one"><?php dynamic_sidebar( 'header' ); ?></div>

			</div>
		</div>

	</div>
</div>



<?php get_footer('contact'); ?>
