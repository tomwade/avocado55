<?php
function e12_partner() {

	$labels = array(
		'name'                  => _x( 'Partners', 'Post Type General Name', 'e12' ),
		'singular_name'         => _x( 'Partner', 'Post Type Singular Name', 'e12' ),
		'menu_name'             => __( 'Partners', 'e12' ),
		'name_admin_bar'        => __( 'Partner', 'e12' ),
		'archives'              => __( 'Partner Archives', 'e12' ),
		'attributes'            => __( 'Partner Attributes', 'e12' ),
		'parent_item_colon'     => __( 'Parent Partner:', 'e12' ),
		'all_items'             => __( 'All Partners', 'e12' ),
		'add_new_item'          => __( 'Add New Partner', 'e12' ),
		'add_new'               => __( 'Add New', 'e12' ),
		'new_item'              => __( 'New Partner', 'e12' ),
		'edit_item'             => __( 'Edit Partner', 'e12' ),
		'update_item'           => __( 'Update Partner', 'e12' ),
		'view_item'             => __( 'View Partner', 'e12' ),
		'view_items'            => __( 'View Partners', 'e12' ),
		'search_items'          => __( 'Search Partner', 'e12' ),
		'not_found'             => __( 'Not found', 'e12' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'e12' ),
		'featured_image'        => __( 'Featured Image', 'e12' ),
		'set_featured_image'    => __( 'Set featured image', 'e12' ),
		'remove_featured_image' => __( 'Remove featured image', 'e12' ),
		'use_featured_image'    => __( 'Use as featured image', 'e12' ),
		'insert_into_item'      => __( 'Insert into partner', 'e12' ),
		'uploaded_to_this_item' => __( 'Uploaded to this partner', 'e12' ),
		'items_list'            => __( 'Partners list', 'e12' ),
		'items_list_navigation' => __( 'Partners list navigation', 'e12' ),
		'filter_items_list'     => __( 'Filter partners list', 'e12' ),
	);
	$args = array(
		'label'                 => __( 'Partner', 'e12' ),
		'description'           => __( 'A collection of Partners', 'e12' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => ['slug' => 'partners'],
		'capability_type'       => 'page',
	);
	register_post_type( 'partner', $args );

}
add_action( 'init', 'e12_partner', 0 );
