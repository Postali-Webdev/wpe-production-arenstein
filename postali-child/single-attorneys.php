<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Parent
 * @author Postali LLC
 */

// Variables

$imageUrl = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' )[0];
$bio = get_field('bio');
$education = get_field('education');
$bar_memberships = get_field('bar_memberships');
$memberships = get_field('memberships');
$licenses = get_field('licenses');
$past_affiliations = get_field('past_affiliations');
$areas_of_practice = get_field('areas_of_practice'); 
$joe_awards = get_field('joe_awards'); 
$pro_bono = get_field('pro_bono'); 
$training_certifications = get_field('training_certifications'); 
get_header();?>


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

	<section id="blog-tan" class="attorneys">
		<div class="container">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 
			<?php if ( $imageUrl ): ?>
				<aside class="bio-image">
				<div><?php the_post_thumbnail(); ?></div>
				</aside>
			<?php endif; ?>

			<div class="att-content<?php if($image_url): ?> thumb-avail<?php endif; ?>">

				<?php if ( $bio ): ?>
				<div><?php echo $bio; ?></div>
				<?php endif; ?>

				<?php if( have_rows('awards') ): ?>

					<div>
					<h3><span>Ratings</span></h3>
					<div class="awards">
					<?php while( have_rows('awards') ): the_row(); 
					// vars
					$image = get_sub_field('award_badge');
					$link = get_sub_field('link');
					$link_url = $link['url'];
					$link_title = $link['title'];
					?>

					<?php if( $link ): ?>
						<a title="<?php echo $link_title ?>" href="<?php echo esc_url($link_url); ?>">
					<?php endif; ?>

						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

					<?php if( $link ): ?>
						</a>
					<?php endif; ?>

					<?php endwhile; ?>
					</div>
					</div>

				<?php endif; ?>

				<?php if ( $joe_awards ): ?>
				<div class="sub-attorney">
					<h3><span>Ratings</span></h3>
					<?php echo $joe_awards; ?></div>
				<?php endif; ?>

				<?php if ( $education ): ?>
				<div class="sub-attorney">
					<h3><span>Education</span></h3>
					<?php echo $education; ?></div>
				<?php endif; ?>

				<?php if ( $licenses ): ?>
				<div class="sub-attorney">
					<h3><span>Licenses</span></h3>
					<?php echo $licenses; ?></div>
				<?php endif; ?>

				<?php if ( $training_certifications ): ?>
				<div class="sub-attorney">
					<h3><span>Training/Certification</span></h3>
					<?php echo $training_certifications; ?></div>
				<?php endif; ?>

				<?php if ( $bar_memberships ): ?>
				<div class="sub-attorney">
					<h3><span>Bar Memberships</span></h3>
					<?php echo $bar_memberships; ?></div>
				<?php endif; ?>

				<?php if ( $memberships ): ?>
				<div class="sub-attorney">
					<h3><span>Memberships</span></h3>
					<?php echo $memberships; ?></div>
				<?php endif; ?>

				<?php if ( $pro_bono ): ?>
				<div class="sub-attorney">
					<h3><span>Pro Bono/Volunteer Activities</span></h3>
					<?php echo $pro_bono; ?></div>
				<?php endif; ?>

				<?php if ( $past_affiliations ): ?>
				<div class="sub-attorney">
					<h3><span>Past Affiliations</span></h3>
					<?php echo $past_affiliations; ?></div>
				<?php endif; ?>

                <?php 
                if( have_rows('additional_credentials') ):
                while( have_rows('additional_credentials') ) : the_row(); 
                ?>
            
                <div class="sub-attorney">
                    <h3><span><?php the_sub_field('credential_title'); ?></span></h3>
                    <?php the_sub_field('credential_details') ?>
                </div>

                <?php 
                endwhile;
                endif;
                ?>

			</div>
				 <!-- content here -->

			<?php endwhile; else: ?>

			      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

			<?php endif; ?>

			


		</div>
	</section>

	<section id="tan-slide">
		<div class="container">

			<div class="blog-feed responsive">


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


		</div>
	</section>


</div>
<?php get_footer(); ?>
