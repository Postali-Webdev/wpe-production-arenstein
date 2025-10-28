<?php
/**
 * Results post archive template.
 * Template Name: Case Results
 * @package Postali Parent
 * @author Postali LLC
 */
$args = array (
	'post_type' => 'results',
	'post_per_page' => '-1',
	'post_status' => 'publish',
	'order' => 'DESC',
);
$the_query = new WP_Query($args);
$defaultBanner = get_field('default_banner', 'options');
get_header(); ?>
	<section id="page-banner" class="banner">
	<?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        <div class="banner" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size:cover;">
    <?php } else { ?>
        <div id="banner-default" class="banner" style="background: url('<?php echo $defaultBanner; ?>') no-repeat; background-size:cover;" >
    <?php } ?>
        
            <div id="banner-container" class="container">
                <h1>Case Results</h1>
            </div>

        </div>
	</section>

	<div class="container">
		
		<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 

		<div class="content">
			<div class="main-content" id="results-feed">
			
			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="single-result-container">
					<h2><?php the_title(); ?></h2>
					<div class="result-content"><?php the_content(); ?></div>
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
