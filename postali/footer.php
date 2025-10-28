<?php
/**
 * Theme footer
 *
 * @package Postali Parent
 * @author Postali LLC
 */
// ACF Variable Functions to reduce db Queries
$schemaLogo = get_field('schema_logo', 'options');
$schemaName = get_field('schema_name', 'options');
$schemaDescription = get_field('schema_description', 'options');
$schemaTelephone = get_field('schema_telephone', 'options');
$schemaEmail = get_field('schema_email', 'options');
$schemaStreet = get_field('schema_street', 'options');
$schemaCity = get_field('schema_city', 'options');
$schemaState = get_field('schema_state', 'options');
$schemaZip = get_field('schema_zip', 'options');
$directionsLink = get_field('directions_link', 'options');
$footerRight = get_field('footer_right', 'options');
?>

<footer>
	<div id="footer-main">
		<div id="footer-columns-container" class="container">
			<div id="footer-columns-left" class="footer-columns">

				<div id="footer-schema" itemscope="" itemtype="http://schema.org/LegalService">
					<div id="footer-schema-1">
						<a href="<?php echo home_url(); ?>/" title="Back to Home" id="footer-schema-logo"><img itemprop="image" src="<?php echo $schemaLogo; ?>" alt="<?php echo $schemaName; ?> Logo" /></a>
					</div>
					<div  id="footer-schema-2" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
						<div>
							<p><span itemprop="streetAddress" id="footer-schema-address"><?php echo $schemaStreet; ?></span></p>
							
							<p><span itemprop="addressLocality" id="footer-schema-city"><?php echo $schemaCity; ?></span>,&nbsp;<span itemprop="addressRegion" id="footer-schema-state"><?php echo $schemaState; ?></span>&nbsp;<span itemprop="postalCode" id="footer-schema-zip"><?php echo $schemaZip; ?></span></p>
							
							<a href="<?php echo $directionsLink; ?>" target="_blank" title="Directions to <?php echo $schemaName; ?> Office"  id="footer-driving-directions">Driving Directions</a>
						</div>
					</div>
					<div id="footer-schema-3">
						
						<p itemprop="telephone" id="footer-schema-telephone"><?php echo $schemaTelephone; ?></p>
						<p itemprop="email" id="footer-schema-email"><?php echo $schemaEmail; ?></p>
					</div>
					<div id="footer-schema-4">
						<p itemprop="name" id="footer-schema-name"><?php echo $schemaName; ?></p>
						<p itemprop="description" id="footer-schema-description"><?php echo $schemaDescription; ?></p>
					</div>
				</div>
								
			</div>
		</div>		
	</div>

	<div id="footer-bottom">
		<div class="container">
			<div id="footer-bottom-top">
				<?php
					$args = array(
						'container'      => false,
						'theme_location' => 'footer-nav',
					);
					wp_nav_menu( $args );
				?>
			</div>
			<div id="footer-bottom-bottom">
				<p>&copy; <?php echo date("Y"); ?> <?php echo $schemaName; ?>. All Rights Reserved</p>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
