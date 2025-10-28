<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div id="blog-holder">

	<div id="tagline">
		<h1><span></span><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>


	<section id="mobile-expansion">


		<?php 
			$pImage = get_field('personal_image'); 
			$fImage = get_field('family_image'); 
			$bImage = get_field('business_image'); 
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
		?>

		<div id="personal" class="main-effect">
			<div class="tan-hold"></div>
			<div class="gradient-hold" style="background-image: url('<?php echo $pImage; ?>'); background-repeat:no-repeat;"></div>
			
			<div class="sub-content">
				<div><?php the_field('personal'); ?></div>
			</div>

		</div>

		<div id="family" class="main-effect">
			<div class="tan-hold"></div>
			<div class="gradient-hold" style="background-image: url('<?php echo $fImage; ?>'); background-repeat:no-repeat;"></div>

			<div class="sub-content">
				<div><?php the_field('family'); ?></div>
			</div>

		</div>

		<div id="business" class="main-effect">
			<div class="tan-hold"></div>
			<div class="gradient-hold" style="background-image: url('<?php echo $bImage; ?>'); background-repeat:no-repeat;"></div>

			<div class="sub-content">
				<div><?php the_field('business'); ?></div>
			</div>

		</div>
		

	</section>


	<section id="desktop-expansion">


		<?php 
			$pImage = get_field('personal_image'); 
			$fImage = get_field('family_image'); 
			$bImage = get_field('business_image'); 
			$wwaImage = get_field('wwa_image'); 
			$msImage = get_field('middle_section_image'); 
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
		?>


		<div id="personal" class="main-effect-desktop hover-white">
				<div class="tan-hold"></div>
				<div class="gradient-hold" style="background-image: url('<?php echo $pImage; ?>'); background-repeat:no-repeat;"></div>

				<div class="sub-content">
					<div><?php the_field('personal'); ?></div>
				</div>
		</div>

		
		<div id="family" class="main-effect-desktop">
				<div class="tan-hold"></div>
				<div class="gradient-hold" style="background-image: url('<?php echo $fImage; ?>'); background-repeat:no-repeat;"></div>

				<div class="sub-content">
					<div><?php the_field('family'); ?></div>
				</div>
		</div>



		<div id="business" class="main-effect-desktop">
				<div class="tan-hold"></div>
				<div class="gradient-hold" style="background-image: url('<?php echo $bImage; ?>'); background-repeat:no-repeat;"></div>

				<div class="sub-content">
					<div><?php the_field('business'); ?></div>
				</div>
		</div>

		

	</section>

	<section id="who-we-are" style="background-image: url('<?php echo $wwaImage; ?>'); background-repeat:no-repeat;">
		<div class="container">
			<h2>Who We Are</h2>
			<div class="sub-container">
				<div class="before-aside">
					<?php the_field('who_we_are_overview'); ?>
				</div>
				<aside>
					<?php dynamic_sidebar( 'main-sidebar' ); ?>
				</aside>
			</div>
			<h3 class="bebas push-down">Meet the team with a different approach</h3>
		</div>
		<div class="cont-mod" id="attorneys-slider">

			<div class="mod1"></div>
			<div class="mod2">
				
					<?php get_template_part('block', 'attorneys');?>

			</div>
			<div class="mod3"></div>

		</div><!-- end of container-modified -->

	</section>

	<section id="service" style="background-image: url('<?php echo $msImage; ?>'); background-repeat:no-repeat;">
		<div class="container">
			<div class="ms-left">
				<?php the_field('middle_section_left'); ?>
			</div>
			<div class="ms-right">
				<?php the_field('middle_section_right'); ?>
			</div>
		</div>

		<div id="fp-practice-areas" class="container">
			<h3>Practice Areas</h3>
			<div class="clearfix"></div>
			<div id="attorney-arrows" class="slider-arrows">
				<div class="slide-prev">
					<div class="prev-arrow"></div>
				</div>
				<div class="slide-next">
					<div class="next-arrow"></div>
				</div>
			</div>
		</div>
			<div class="cont-mod">
		
			<div class="mod1"></div>
			<div class="mod2">
			

				<?php if( have_rows('practice_areas') ): ?>
				<div class="our-areas"></div>
					<div class="not-responsive-new">
						

					<?php while( have_rows('practice_areas') ): the_row(); 

						// vars
						$background = get_sub_field('background');
						$content = get_sub_field('content');
						$title = get_sub_field('title');

						?>

						<article class="areas" style="background-image: url('<?php echo $background; ?>'); background-repeat:no-repeat;">

							<div class="flexy-stuff">
							<h3><?php echo $title; ?></h3>
						    <div><?php echo $content; ?></div>
							</div>

						</article>

					<?php endwhile; ?>

					</div>

				<?php endif; ?>


			</div>
			<div class="mod3"></div>

		</div><!-- end of container-modified -->
		<div class="container">

			<?php if( have_rows('bottom_section') ): ?>
					<div class="bottom">
						

					<?php while( have_rows('bottom_section') ): the_row(); 

						// vars
						$content = get_sub_field('content');
						$title = get_sub_field('new_title');
						?>

						<div class="row-new">

							<h3><?php echo $title; ?></h3>
						    <div class="flex-content"><?php echo $content; ?></div>			

						</div>

					<?php endwhile; ?>

					</div>

				<?php endif; ?>

		</div>
	</section>
	
</div><!-- #front-page -->

<?php get_footer();?>