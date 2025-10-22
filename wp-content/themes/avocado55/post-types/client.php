<?php
function e12_client() {

	$labels = array(
		'name'                  => _x( 'Clients', 'Post Type General Name', 'e12' ),
		'singular_name'         => _x( 'Client', 'Post Type Singular Name', 'e12' ),
		'menu_name'             => __( 'Clients', 'e12' ),
		'name_admin_bar'        => __( 'Client', 'e12' ),
		'archives'              => __( 'Client Archives', 'e12' ),
		'attributes'            => __( 'Client Attributes', 'e12' ),
		'parent_item_colon'     => __( 'Parent Client:', 'e12' ),
		'all_items'             => __( 'All Clients', 'e12' ),
		'add_new_item'          => __( 'Add New Client', 'e12' ),
		'add_new'               => __( 'Add New', 'e12' ),
		'new_item'              => __( 'New Client', 'e12' ),
		'edit_item'             => __( 'Edit Client', 'e12' ),
		'update_item'           => __( 'Update Client', 'e12' ),
		'view_item'             => __( 'View Client', 'e12' ),
		'view_items'            => __( 'View Clients', 'e12' ),
		'search_items'          => __( 'Search Client', 'e12' ),
		'not_found'             => __( 'Not found', 'e12' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'e12' ),
		'featured_image'        => __( 'Featured Image', 'e12' ),
		'set_featured_image'    => __( 'Set featured image', 'e12' ),
		'remove_featured_image' => __( 'Remove featured image', 'e12' ),
		'use_featured_image'    => __( 'Use as featured image', 'e12' ),
		'insert_into_item'      => __( 'Insert into client', 'e12' ),
		'uploaded_to_this_item' => __( 'Uploaded to this client', 'e12' ),
		'items_list'            => __( 'Clients list', 'e12' ),
		'items_list_navigation' => __( 'Clients list navigation', 'e12' ),
		'filter_items_list'     => __( 'Filter clients list', 'e12' ),
	);
	$args = array(
		'label'                 => __( 'Client', 'e12' ),
		'description'           => __( 'A collection of Clients', 'e12' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'query_var' 			   => false,
		'rewrite'               => ['slug' => 'clients'],
		'capability_type'       => 'page',
	);
	register_post_type( 'client', $args );

}
add_action( 'init', 'e12_client', 0 );
