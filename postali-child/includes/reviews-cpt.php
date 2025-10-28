<?php
/**
 * Custom Reviews 
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_reviews() {

// set up labels
	$labels = array(
 		'name' => 'Reviews',
    	'singular_name' => 'Review',
    	'add_new' => 'Add New Reviews',
    	'add_new_item' => 'Add New Review',
    	'edit_item' => 'Edit Review',
    	'new_item' => 'New Review',
    	'all_items' => 'All Reviews',
    	'view_item' => 'View Reviews',
    	'search_items' => 'Search Reviews',
    	'not_found' =>  'No Reviews Found',
    	'not_found_in_trash' => 'No Reviews found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Reviews',
    );
    //register post type
	register_post_type( 'Reviews', array(
		'labels' => $labels,
        'menu_icon' => 'dashicons-star-half',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title' , 'editor'),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'reviews', 'with_front' => false  ),
		)
	);

}
add_action( 'init', 'create_custom_post_type_reviews' );