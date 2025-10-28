<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */

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

				<p><time datetime="<?php the_time('n.j.Y'); ?>" pubdate="pubdate">
		        <?php the_time('n.j.Y'); ?></time></p>

		        <h1><?php the_title(); ?></h1>

				<div class="article-single-featured-image">
					<?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
					<?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
						<img src="<?php echo $featImg[0]; ?>" class="featured-image"  />
					<?php } else { ?>
						<img src="<?php echo $blogDefault; ?>" class="featured-image"/>
					<?php } ?>
				</div>
				
		        

		        <p class="posted-in">Posted In: <?php the_category( ', ' ); ?> &nbsp | &nbsp; Posted by: Arenstein & Anderson Co., LPA</p>

				<?php the_content(); ?>

				<p class="posted-in no-bottom">Posted In: <?php the_category( ', ' ); ?></p>

				<p class="the-tags no-top"><?php the_tags( 'Tagged in: ',' , ' ); ?></p>
			</article>	

			

			<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
			<aside class="main-sidebar">
				<?php dynamic_sidebar( 'main-sidebar' ); ?>


				<?php
				// Start WP_Query for only the ID's from above
				$first_query = new WP_Query(
					array(
						
						'posts_per_page' => 5
					)
				); 
				?>
				<h3>Recent Blog Posts</h3>
				<ul id="sidebar-latest">
				<?php while($first_query->have_posts()) : $first_query->the_post(); ?>

					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

				<?php endwhile; ?>
				</ul>
				<h4 class="view-all"><a href="<?php $url = home_url(); echo $url; ?>/blog/">View All Blogs</a></h4>
				  <!-- end of the loop -->
				  				
				<?php wp_reset_postdata(); ?>

			</aside>
			<?php endif; ?>

		</div><!--end of single-flex -->

		
	</div>
</section>
	

<?php get_footer(); ?>