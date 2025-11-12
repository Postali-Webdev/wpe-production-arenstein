<?php
/**
 * Theme header.
 *
 * @package Postali Parent
 * @author Postali LLC
**/
// ACF Variable Functions to reduce db Queries
$phone = get_field('local_phone', 'options');
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PZLKWHL');</script>
<!-- End Google Tag Manager -->
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>

<!-- Schema JSON-ID Goes Here -->
<?php
$global_schema = get_field('global_schema', 'options');
$single_schema = get_field('single_schema');
if ( !empty($global_schema) ) :
    echo '<script type="application/ld+json">' . strip_tags($global_schema) . '</script>';
endif;

if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . strip_tags($single_schema) . '</script>';
endif;



?>
</head>

<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZLKWHL"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<header>
		
		

		
		<div id="head-top">
			<div id="head-middle-left">
				<?php the_custom_logo(); ?>
			</div>
			
			<div id="head-middle-right">
				<?php if( $phone ): ?>
					<span><a title="Call Arnstein & Anderson CO., LPA Today" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></span>
				<?php endif; ?>
			
				
				
			</div>
			<div id="head-mobile">
				<div id="menu-icon" class="toggle-nav">
					<span class="line line-1"></span>
				    <span class="line line-2"></span>
				    <span class="line line-3"></span>
				</div>
			</div>
		</div>

		<div id="mobile-nav">
			<nav>
			<?php
				$args = array(
					'container'      => false,
					'theme_location' => 'header-nav',
				);
				wp_nav_menu( $args );
			?>
            </nav>
		</div>
		
	</header>
