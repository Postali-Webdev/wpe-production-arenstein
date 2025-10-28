<?php
/**
 * Theme functions.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

require_once dirname( __FILE__ ) . '/includes/admin.php';
require_once dirname( __FILE__ ) . '/includes/utility.php';

/** Enable additional theme features */
add_post_type_support( 'page', 'excerpt' );
add_theme_support( 'post-thumbnails' );

// Remove Wordpress Emoji Javascript call
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Register and enqueue theme styles and scripts.
**/
function postali_register_styles_scripts() {

    /* Stylesheets */ /* This is commented out because the parent theme will be enqueued in the child */
    // wp_register_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css', null, null, 'all' );
    
    // Editor stylesheets.
    add_editor_style( 'assets/css/editor.css' );

    /* Scripts */
    wp_register_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), null, true );
    wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/assets/js/modernizr.min.js', null, null, false );

    if ( ! is_admin() && ! is_login_page() ) {
        wp_enqueue_style( 'styles' );
        wp_enqueue_style( 'google-fonts' );

        wp_enqueue_script( 'scripts' );
        wp_enqueue_script( 'modernizr' );
    }

    if( ! is_home() ) {

    }
}
add_action( 'init', 'postali_register_styles_scripts' );

/** 
* ACF Options Page
*
**/
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Instructions',
        'menu_title'    => 'Instructions',
        'menu_slug'     => 'theme-instructions',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Customizations',
        'menu_title'    => 'Customizations',
        'menu_slug'     => 'customizations',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-admin-customizer', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Awards',
        'menu_title'    => 'Awards',
        'menu_slug'     => 'awards',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-awards', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));

}

// Custom Read More Links
function postali_excerpt_more( $more ) {
	global $post;

	return sprintf(
		'...<div class="clearfix"></div>',
		esc_url( get_permalink( $post->ID ) ),
		esc_attr( sprintf( __( 'Read More "%s"', 'postali' ), get_the_title( $post->ID ) ) ),
		esc_html__( 'Read More', 'postali' )
	);
}
add_filter( 'excerpt_more', 'postali_excerpt_more' );

// Change the length of wordpress default excerpt
add_filter( 'excerpt_length', function($length) {
    return 40;
} );

// Register Dynamic Sidebars
function postali_register_dynamic_sidebars() {
	$sidebars = array(
		array(
			'id'   => 'main-sidebar',
            'name' => __( 'Main Sidebar' ),
            'description'   => '',
            'class'         => '',
            'before_widget' => '<div class="sidebar-widget">',
            'after_widget'  =>  '</div>',
            'before_title'  => '',
            'after_title'   => '',
		),
	);

	foreach ( $sidebars as $sidebar ) {
		register_sidebar( $sidebar );
	}
}
add_action( 'widgets_init', 'postali_register_dynamic_sidebars' );

// Add widget title as a class to the widget
function widget_title_as_class($title) { 
    return '<h3 class="widget-title ' . sanitize_title($title) . '">' . $title . '</h3>';
}
add_filter('widget_title', 'widget_title_as_class');

// Register Site Navigations
function postali_register_nav_menus() {
	register_nav_menus(
		array(
			'header-nav' => __( 'Header Navigation', 'postali' ),
			'footer-nav' => __( 'Footer Navigation', 'postali' ),
		)
	);
}
add_action( 'init', 'postali_register_nav_menus' );

/**
* Remove page tabs from wordpress backend
*
**/
function postali_menu_page_removing() {
    // remove_menu_page( 'jetpack' );                      //Jetpack* 
    // remove_menu_page( 'themes.php' );                   // Appearance
    remove_menu_page( 'edit-comments.php' );            //Comments
}
add_action( 'admin_menu', 'postali_menu_page_removing' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {
    // This is a standard implementation of a new widget sidebar
    register_sidebar( array(
        'name'          => 'Default Widget',
        'id'            => 'default_widget',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );


// Customize the logo on the wp-login.php page
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/postali-logo.png);
		height:45px;
		width:204px;
		background-size: 204px 45px;
		background-repeat: no-repeat;
        padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

add_theme_support( 'custom-logo' );

function postali_custom_logo_setup() {
    $defaults = array(
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

/**
 * Register the site favicon, if it exists
 *
 * @uses get_template_directory_uri()
 */
function postali_register_favicon() {
  printf( '<link href="%s/favicon.ico" rel="shortcut icon" />' . PHP_EOL, get_template_directory_uri() );
}
add_action( 'wp_head', 'postali_register_favicon' );


// Add ability to add SVG to Wordpress Media Library
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Widget Logic Conditionals
function is_child($parent) {
global $post;
return $post->post_parent == $parent;
}

// Widget Logic Conditionals (ancestor) 
function is_tree( $pid ) {
global $post;

if ( is_page($pid) )
return true;

$anc = get_post_ancestors( $post->ID );
foreach ( $anc as $ancestor ) {
if( is_page() && $ancestor == $pid ) {
return true;
}
}
return false;
}

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// Add shortcode for embedding custom menus in page content
function print_menu_shortcode($atts, $content = null) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'print_menu_shortcode');

// Latest case results shortcode
if (!function_exists('latest_results')) {
    function latest_results($atts, $content = null) {
      global $qode_options_magnet;
        $html = '';
        extract(shortcode_atts(array("post_type", "post_number"=>"", "order_by" => "", "order" => "", "text_length"=>""), $atts));

        $q = new WP_Query(
           array( 'post_type' => 'results', 'orderby' => $order_by, 'order' => $order, 'posts_per_page' => '2')
           // Adjust the post_per_page number for display amount
        );

          while($q->have_posts()) : $q->the_post();
        
            $permalink = get_permalink();
            $title = get_the_title();
            $excerpt = get_the_excerpt();

            if ( $text_length > 0){
              $html .= '<div class="recent-case-result"><h2><a href="' . $permalink . '" title="' . $title . '">' . $title . '</a></h2><p>' . $excerpt . '</p></div>';
            } else {
              $html .= '<div class="recent-case-result"><span>' . $title . '</span><p>' . $excerpt . '</p></div>';
            }
            $html .= "</article>";
          endwhile;

          wp_reset_query();

      return $html;
    }
}
add_shortcode( 'latest_results', 'latest_results' );

// Shortcode for Yoast breadcrumbs 
function surbma_yoast_breadcrumb_shortcode_init() {
    load_plugin_textdomain( 'surbma-yoast-breadcrumb-shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'surbma_yoast_breadcrumb_shortcode_init' );

function surbma_yoast_breadcrumb_shortcode_shortcode( $atts ) {
    extract( shortcode_atts( array(
        "before" => '<p id="breadcrumbs">',
        "after" => '</p>'
    ), $atts ) );

    $wpseo_internallinks = get_option( 'wpseo_internallinks' );

    if ( class_exists( 'WPSEO_Breadcrumbs' ) && $wpseo_internallinks['breadcrumbs-enable'] == 1 ) {
        return yoast_breadcrumb( $before, $after, false );
    }
    elseif ( class_exists( 'WPSEO_Breadcrumbs' ) && $wpseo_internallinks['breadcrumbs-enable'] != 1 ) {
        return __( '<p>Please enable the breadcrumb option to use this shortcode!</p>', 'surbma-yoast-breadcrumb-shortcode' );
    }
    else {
        return __( '<p>Please install <a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">WordPress SEO by Yoast</a> plugin and enable the breadcrumb option to use this shortcode!</p>', 'surbma-yoast-breadcrumb-shortcode' );
    }
}
add_shortcode( 'yoast-breadcrumb', 'surbma_yoast_breadcrumb_shortcode_shortcode' );

function acf_field_special($name) {
    echo call_user_func('acf_field_special_' . $name);
}
// Shortcode to display Awards repeater from Awards Options page
function acf_field_special_awards() {
    $id = ('options');
    $html = '';
    if (have_rows('awards', $id)) {
        $html .= '<div id="awards">';
        while (have_rows('awards', $id)) {
            the_row();
            $html .= '<img src="' . get_sub_field('badge_image') . '" alt="' . get_sub_field('badge_text') .'">';
        }
        $html .= '</div>';
    }
    return $html;
}
add_shortcode('awards', 'acf_field_special_awards');

// ACF Register Block
// add_action('acf/init', 'my_acf_init');
// function my_acf_init() {
	
// 	// check function exists
// 	if( function_exists('acf_register_block') ) {
		
// 		// register a testimonial block
// 		acf_register_block(array(
// 			'name'				=> 'testimonial',
// 			'title'				=> __('Testimonial'),
// 			'description'		=> __('A custom testimonial block.'),
// 			'render_callback'	=> 'my_acf_block_render_callback',
// 			'category'			=> 'formatting',
// 			'icon'				=> 'admin-comments',
// 			'keywords'			=> array( 'testimonial', 'quote' ),
// 		));
// 	}
// }

// ACF Render Registered Block
// function my_acf_block_render_callback( $block ) {
	
// 	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
// 	$slug = str_replace('acf/', '', $block['name']);
	
// 	// include a template part from within the "template-parts/block" folder
// 	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
// 		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
// 	}
// }

// Contact Form 7 Submission Page Redirect
add_action( 'wp_footer', 'mycustom_wp_footer' );
 
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '/form-success/';
}, false );
</script>
<?php
}