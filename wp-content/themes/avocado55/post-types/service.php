<?php
function avocado55_service() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'avocado55' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'avocado55' ),
		'menu_name'             => __( 'Services', 'avocado55' ),
		'name_admin_bar'        => __( 'Service', 'avocado55' ),
		'archives'              => __( 'Service Archives', 'avocado55' ),
		'attributes'            => __( 'Service Attributes', 'avocado55' ),
		'parent_item_colon'     => __( 'Parent Service:', 'avocado55' ),
		'all_items'             => __( 'All Services', 'avocado55' ),
		'add_new_item'          => __( 'Add New Service', 'avocado55' ),
		'add_new'               => __( 'Add New', 'avocado55' ),
		'new_item'              => __( 'New Service', 'avocado55' ),
		'edit_item'             => __( 'Edit Service', 'avocado55' ),
		'update_item'           => __( 'Update Service', 'avocado55' ),
		'view_item'             => __( 'View Service', 'avocado55' ),
		'view_items'            => __( 'View Services', 'avocado55' ),
		'search_items'          => __( 'Search Service', 'avocado55' ),
		'not_found'             => __( 'Not found', 'avocado55' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'avocado55' ),
		'featured_image'        => __( 'Featured Image', 'avocado55' ),
		'set_featured_image'    => __( 'Set featured image', 'avocado55' ),
		'remove_featured_image' => __( 'Remove featured image', 'avocado55' ),
		'use_featured_image'    => __( 'Use as featured image', 'avocado55' ),
		'insert_into_item'      => __( 'Insert into service', 'avocado55' ),
		'uploaded_to_this_item' => __( 'Uploaded to this service', 'avocado55' ),
		'items_list'            => __( 'Services list', 'avocado55' ),
		'items_list_navigation' => __( 'Services list navigation', 'avocado55' ),
		'filter_items_list'     => __( 'Filter services list', 'avocado55' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'avocado55' ),
		'description'           => __( 'A collection of Services', 'avocado55' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'rewrite'               => ['slug' => 'services'],
		'capability_type'       => 'page',
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'avocado55_service', 0 );
