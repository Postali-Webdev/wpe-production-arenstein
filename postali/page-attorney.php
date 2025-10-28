<?php
/**
 * About Template
 * Template Name: Attorney Profile
 *
 * @package Postali
 * @author Postali LLC
 */
get_header(); ?>

<div class="container">
		
    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 

    <div class="content">
        <div class="main-content">
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <span><?php the_title(); ?></span>
                <div><?php the_content(); ?></div>
    
        </div>
        <div class="main-sidebar">

            <?php get_sidebar(); ?>

        </div>
    </div>

</div>

<?php get_footer(); ?>
