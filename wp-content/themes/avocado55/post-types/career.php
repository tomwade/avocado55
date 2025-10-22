<?php
function e12_career() {

	$labels = array(
		'name'                  => _x( 'Careers', 'Post Type General Name', 'e12' ),
		'singular_name'         => _x( 'Career', 'Post Type Singular Name', 'e12' ),
		'menu_name'             => __( 'Careers', 'e12' ),
		'name_admin_bar'        => __( 'Career', 'e12' ),
		'archives'              => __( 'Career Archives', 'e12' ),
		'attributes'            => __( 'Career Attributes', 'e12' ),
		'parent_item_colon'     => __( 'Parent Career:', 'e12' ),
		'all_items'             => __( 'All Careers', 'e12' ),
		'add_new_item'          => __( 'Add New Career', 'e12' ),
		'add_new'               => __( 'Add New', 'e12' ),
		'new_item'              => __( 'New Career', 'e12' ),
		'edit_item'             => __( 'Edit Career', 'e12' ),
		'update_item'           => __( 'Update Career', 'e12' ),
		'view_item'             => __( 'View Career', 'e12' ),
		'view_items'            => __( 'View Careers', 'e12' ),
		'search_items'          => __( 'Search Career', 'e12' ),
		'not_found'             => __( 'Not found', 'e12' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'e12' ),
		'featured_image'        => __( 'Featured Image', 'e12' ),
		'set_featured_image'    => __( 'Set featured image', 'e12' ),
		'remove_featured_image' => __( 'Remove featured image', 'e12' ),
		'use_featured_image'    => __( 'Use as featured image', 'e12' ),
		'insert_into_item'      => __( 'Insert into career', 'e12' ),
		'uploaded_to_this_item' => __( 'Uploaded to this career', 'e12' ),
		'items_list'            => __( 'Careers list', 'e12' ),
		'items_list_navigation' => __( 'Careers list navigation', 'e12' ),
		'filter_items_list'     => __( 'Filter careers list', 'e12' ),
	);
	$args = array(
		'label'                 => __( 'Career', 'e12' ),
		'description'           => __( 'A collection of Careers', 'e12' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-networking',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => ['slug' => 'careers'],
		'capability_type'       => 'page',
	);
	register_post_type( 'career', $args );

}
add_action( 'init', 'e12_career', 0 );
