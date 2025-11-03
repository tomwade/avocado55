<?php
function avocado55_client() {

	$labels = array(
		'name'                  => _x( 'Clients', 'Post Type General Name', 'avocado55' ),
		'singular_name'         => _x( 'Client', 'Post Type Singular Name', 'avocado55' ),
		'menu_name'             => __( 'Clients', 'avocado55' ),
		'name_admin_bar'        => __( 'Client', 'avocado55' ),
		'archives'              => __( 'Client Archives', 'avocado55' ),
		'attributes'            => __( 'Client Attributes', 'avocado55' ),
		'parent_item_colon'     => __( 'Parent Client:', 'avocado55' ),
		'all_items'             => __( 'All Clients', 'avocado55' ),
		'add_new_item'          => __( 'Add New Client', 'avocado55' ),
		'add_new'               => __( 'Add New', 'avocado55' ),
		'new_item'              => __( 'New Client', 'avocado55' ),
		'edit_item'             => __( 'Edit Client', 'avocado55' ),
		'update_item'           => __( 'Update Client', 'avocado55' ),
		'view_item'             => __( 'View Client', 'avocado55' ),
		'view_items'            => __( 'View Clients', 'avocado55' ),
		'search_items'          => __( 'Search Client', 'avocado55' ),
		'not_found'             => __( 'Not found', 'avocado55' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'avocado55' ),
		'featured_image'        => __( 'Featured Image', 'avocado55' ),
		'set_featured_image'    => __( 'Set featured image', 'avocado55' ),
		'remove_featured_image' => __( 'Remove featured image', 'avocado55' ),
		'use_featured_image'    => __( 'Use as featured image', 'avocado55' ),
		'insert_into_item'      => __( 'Insert into client', 'avocado55' ),
		'uploaded_to_this_item' => __( 'Uploaded to this client', 'avocado55' ),
		'items_list'            => __( 'Clients list', 'avocado55' ),
		'items_list_navigation' => __( 'Clients list navigation', 'avocado55' ),
		'filter_items_list'     => __( 'Filter clients list', 'avocado55' ),
	);
	$args = array(
		'label'                 => __( 'Client', 'avocado55' ),
		'description'           => __( 'A collection of Clients', 'avocado55' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => ['slug' => 'clients'],
		'capability_type'       => 'page',
	);
	register_post_type( 'client', $args );

}
add_action( 'init', 'avocado55_client', 0 );
