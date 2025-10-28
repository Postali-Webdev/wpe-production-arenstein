<?php
/**
 * Form Success Template
 * Template Name: Form Success
 *
 * @package Postali Parent
 * @author Postali LLC
**/
get_header(); ?>


<div id="blog-holder">
	<div id="blog-banner">

		<div class="index_page featured-wrap" style="background-image: url(<?php the_field('default_attorneys', 'options'); ?>); background-repeat:no-repeat;">
			<div class="container">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                <h1><span></span>Form Success</h1>
                <p><?php the_content() ?></p>
                <h2 class="att-title"><?php the_field('title'); ?></h2>
			</div>
		</div>
	</div>

</div>

<?php get_footer();
