<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
// ACF Variable Functions to reduce db Queries
$footerLogo = get_field('footer_logo', 'options');
$footerName = get_field('footer_name', 'options');
$footerDescription = get_field('footer_description', 'options');
$footerTelephone = get_field('footer_telephone', 'options');
$footerFax = get_field('footer_fax', 'options');
$footerEmail = get_field('footer_email', 'options');
$footerStreet = get_field('footer_street', 'options');
$footerCity = get_field('footer_city', 'options');
$footerState = get_field('footer_state', 'options');
$footerZip = get_field('footer_zip', 'options');
$directionsLink = get_field('directions_link', 'options');
$twitter = get_field('twitter', 'options');
$facebook = get_field('facebook', 'options');
$linkedin = get_field('linkedin', 'options');
?>

<footer>

	<div id="footer-main">
		<div class="container">
			<div class="fifty-flex">
				<div class="top-fifty">
					<h2 class="hh-2"><?php the_field('footer_title', 'option'); ?></h2>
					<div class="contact-p-e"><div><span>P</span> <a title="Call Arnstein & Anderson CO., LPA Today" href="tel:<?php the_field('footer_phone', 'option'); ?>"><?php the_field('footer_phone', 'option'); ?></a></div> <div><span>E</span> <a title="Email Arnstein & Anderson CO., LPA Today" href="mailto:<?php the_field('footer_email', 'option'); ?>"><?php the_field('footer_email', 'option'); ?></a></div></div>
				</div>
				<div class="top-fifty">
					<?php the_field('footer_content', 'option'); ?>
				</div>
			</div>

			
			<?php the_field('footer_form', 'option'); ?>
		</div>	

		
	</div>

	<div id="footer-bottom">
		<div class="container">
			<div class="flexed">
				
				<?php dynamic_sidebar( 'footer' ); ?>

			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
