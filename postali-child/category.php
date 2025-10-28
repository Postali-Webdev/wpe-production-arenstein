<?php
/**
 * 
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<div id="blog-holder">
		  
    
<div id="blog-banner">
<div class="index_page featured-wrap" style="background-image: url('/wp-content/uploads/2019/04/legal-blog-landing-header-img.jpg'); background-repeat:no-repeat;">
	<div class="container">
	<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
	<h1><span></span>Legal Blog</h1>

	<div class="the-content"><p>At Arenstein & Andersen Co., LPA, our focus is on you and providing tailored solutions to your unique legal needs.</p></div>

	<div class="side-wrangle"><?php dynamic_sidebar( 'header' ); ?><div class="view-blogs"><h2>View Blogs</h2></div> </div>
	</div>
</div>
</div>


<section id="blog-tan">
<div class="container blog-posts">

	<div class="vertical-green-line"></div>
	
	<div>

			<div class="blog-feed">

			<?php 
			//Protect against arbitrary paged values
			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

			$queried_object = get_queried_object () ;

			$args = array (
				'post_type' => 'post',
				'post_per_page' => '-1',
				'post_status' => 'publish',
				'order' => 'DESC',
				'paged' => $paged,
				'tax_query' => array (
        					array (
            					'taxonomy' => $queried_object->taxonomy,
            					'field' => 'slug',
            					'terms' => $queried_object->slug,
            					),
        					),

			);
			$the_query = new WP_Query($args); ?>

				<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<article>

						<div class="post_image">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php $background_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
								<div class="featured-wrap" style="background-image: url('<?php echo esc_attr( $background_img[0] ); ?>' ); background-repeat:no-repeat;"></div>
							</a>
						</div>

						<div class="blog-feed-article-content">
      						
							<div class="post-meta"><span class="post-meta-date"><?php the_time( 'n.j.Y' ); ?></span></div> 
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
							<!-- <div class="blog-feed-article-excerpt"><?php the_excerpt(); ?></div> -->
							

						</div>

						<a href="<?php the_permalink(); ?>" class="btn-new">Read Blog</a>
  						
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			
			</div> <!-- end of blog feed -->
		
		
				<div class="blog-pagination">
		<?php
		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $the_query->max_num_pages
		) );
		?>
		</div>
	</div>


</div><!-- #containter -->
</section>
</div>
<?php get_footer(); ?>
