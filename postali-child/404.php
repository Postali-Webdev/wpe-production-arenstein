<?php
/**
 * 404 Page Not Found.
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
			<h1><span></span>404</h1>
			<h2 class="att-title"><?php the_field('title'); ?></h2>
			

			</div>
		</div>
	</div>

	<div class="container">
		<h1 class="post-title"><?php esc_html_e( 'Page Not Found', 'postali-child' ) ?></h1>
	</div>

	<section><div class="container container-404">


		<div>
			<p><?php esc_html_e( 'We apologize but the page you\'re looking for could not be found.', 'postali' ); ?></p>
			<p><strong><a class="link-404" href="/">Return to the Home Page</a></strong></p>
			<p><strong><a class="link-404" class="link-404" href="/about/">Meet Our Team</a></strong></p>
			<p><strong><a class="link-404" class="link-404" href="/business/">Business Legal Services</a></strong></p>
			<p><strong><a class="link-404" class="link-404" href="/blog/">Our Blog</a></strong></p>
			<!-- TODO: Do we need this? Leaving it commented out for now --><br>
		</div>

		<div class="search-form">
			<p>Search our site</p>
			<?php get_search_form(); ?>
		</div>

	</div></section><!-- #content -->

</div>

<?php get_footer();
