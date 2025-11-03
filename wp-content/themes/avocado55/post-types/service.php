<?php
function e12_service() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'e12' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'e12' ),
		'menu_name'             => __( 'Services', 'e12' ),
		'name_admin_bar'        => __( 'Service', 'e12' ),
		'archives'              => __( 'Service Archives', 'e12' ),
		'attributes'            => __( 'Service Attributes', 'e12' ),
		'parent_item_colon'     => __( 'Parent Service:', 'e12' ),
		'all_items'             => __( 'All Services', 'e12' ),
		'add_new_item'          => __( 'Add New Service', 'e12' ),
		'add_new'               => __( 'Add New', 'e12' ),
		'new_item'              => __( 'New Service', 'e12' ),
		'edit_item'             => __( 'Edit Service', 'e12' ),
		'update_item'           => __( 'Update Service', 'e12' ),
		'view_item'             => __( 'View Service', 'e12' ),
		'view_items'            => __( 'View Services', 'e12' ),
		'search_items'          => __( 'Search Service', 'e12' ),
		'not_found'             => __( 'Not found', 'e12' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'e12' ),
		'featured_image'        => __( 'Featured Image', 'e12' ),
		'set_featured_image'    => __( 'Set featured image', 'e12' ),
		'remove_featured_image' => __( 'Remove featured image', 'e12' ),
		'use_featured_image'    => __( 'Use as featured image', 'e12' ),
		'insert_into_item'      => __( 'Insert into service', 'e12' ),
		'uploaded_to_this_item' => __( 'Uploaded to this service', 'e12' ),
		'items_list'            => __( 'Services list', 'e12' ),
		'items_list_navigation' => __( 'Services list navigation', 'e12' ),
		'filter_items_list'     => __( 'Filter services list', 'e12' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'e12' ),
		'description'           => __( 'A collection of Services', 'e12' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => ['slug' => 'services'],
		'capability_type'       => 'page',
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'e12_service', 0 );
