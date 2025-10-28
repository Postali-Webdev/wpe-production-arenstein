<?php
/**
 * Theme functions.
 *
 * @package Postali Child
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php'; // Custom Post Type Attorneys
	require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
	require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials
	//require_once dirname( __FILE__ ) . '/includes/reviews-cpt.php'; // Custom Post Type Testimonials

	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	
	}  

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

		wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue child theme styles.css
		wp_enqueue_style( 'slickstyle', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
		wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i'); // Enqueue child theme styles.css


		

		// Compiled .js using Grunt.js
		//wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
		//wp_enqueue_script('custom-scripts');
		wp_register_script('slick-min', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-min');
		wp_register_script('slick-custom-min', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-custom-min');

	}

	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(
				'example-nav' => __( 'Example Navigation', 'postali-child' ),
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );


	// Save newly created fields to child theme
	add_filter('acf/settings/load_json', 'my_acf_json_load_point');

	function my_acf_json_load_point( $paths ) {
		
		// remove original path (optional)
		unset($paths[0]);
		
		
		// append path
		$paths[] = get_stylesheet_directory() . '/acf-json';
		
		
		// return
		return $paths;
		
	}

	$steinbauer_footer_sidebar = array(
	  'name'          => 'Footer',
	  'id'            => 'footer',
	  'description'   => 'Widgets placed here will go in the Footer sidebar',
	  'before_widget' => '<div class="individual_widget">',
	  'after_widget'  => '</div><!-- class: individual_widget -->',
	  'before_title'  => '<h2 class="widgettitle">',
	  'after_title'   => '</h2>',
	);
	register_sidebar( $steinbauer_footer_sidebar );

	$steinbauer_header_sidebar = array(
	  'name'          => 'Header',
	  'id'            => 'header',
	  'description'   => 'Widgets placed here will go in the Header sidebar',
	  'before_widget' => '<div class="sidebar-widget">',
	  'after_widget'  => '</div><!-- class: sidebar-widget -->',
	  'before_title'  => '<h2 class="widgettitle">',
	  'after_title'   => '</h2>',
	);
	register_sidebar( $steinbauer_header_sidebar );
	
    function retrieve_latest_gform_submissions() {
    $site_url = get_site_url();
    $search_criteria = [
        'status' => 'active'
    ];
    $form_ids = 1; //search all forms
    $sorting = [
        'key' => 'date_created',
        'direction' => 'DESC'
    ];
    $paging = [
        'offset' => 0,
        'page_size' => 5
    ];
    
    $submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
    $start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
    $end_date = date('Y-m-d H:i:s');
    $entry_in_last_5_days = false;
    
    foreach ($submissions as $submission) {
        if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
            $entry_in_last_5_days = true;
        } 
    }
    if( !$entry_in_last_5_days ) {
        wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
    }
}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');
?>
