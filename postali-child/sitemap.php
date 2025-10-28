<?php
/**
 * Sitemap
 * Template Name: Sitemap
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>
<?php get_template_part('block', 'banner');?>

<div id="blog-holder">

	<div id="blog-banner">

		<div class="index_page featured-wrap" style="background-image: url(<?php the_field('default_attorneys', 'options'); ?>); background-repeat:no-repeat;">
			<div class="container">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
			<h1><span></span><?php the_title();?></h1>
			<h2 class="att-title"><?php the_field('title'); ?></h2>
			

			</div>
		</div>
	</div>

	<section id="sitemap" class="interior">
		<?php if (have_posts()) : 
			while (have_posts()) : the_post(); ?>
				<div class="container">
					<div class="column1">
						<h2>Pages</h2> 
						<ul>
							<?php wp_list_pages("title_li=" ); ?>
						</ul> 
					</div>
					<div class="column2">
						<h2>Blog Posts</h2> 
						<ul>
							<?php wp_get_archives('type=postbypost'); ?>
						</ul>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
</div>
<?php get_footer(); ?>			