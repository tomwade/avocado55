<?php
function avocado55_partner() {

	$labels = array(
		'name'                  => _x( 'Partners', 'Post Type General Name', 'avocado55' ),
		'singular_name'         => _x( 'Partner', 'Post Type Singular Name', 'avocado55' ),
		'menu_name'             => __( 'Partners', 'avocado55' ),
		'name_admin_bar'        => __( 'Partner', 'avocado55' ),
		'archives'              => __( 'Partner Archives', 'avocado55' ),
		'attributes'            => __( 'Partner Attributes', 'avocado55' ),
		'parent_item_colon'     => __( 'Parent Partner:', 'avocado55' ),
		'all_items'             => __( 'All Partners', 'avocado55' ),
		'add_new_item'          => __( 'Add New Partner', 'avocado55' ),
		'add_new'               => __( 'Add New', 'avocado55' ),
		'new_item'              => __( 'New Partner', 'avocado55' ),
		'edit_item'             => __( 'Edit Partner', 'avocado55' ),
		'update_item'           => __( 'Update Partner', 'avocado55' ),
		'view_item'             => __( 'View Partner', 'avocado55' ),
		'view_items'            => __( 'View Partners', 'avocado55' ),
		'search_items'          => __( 'Search Partner', 'avocado55' ),
		'not_found'             => __( 'Not found', 'avocado55' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'avocado55' ),
		'featured_image'        => __( 'Featured Image', 'avocado55' ),
		'set_featured_image'    => __( 'Set featured image', 'avocado55' ),
		'remove_featured_image' => __( 'Remove featured image', 'avocado55' ),
		'use_featured_image'    => __( 'Use as featured image', 'avocado55' ),
		'insert_into_item'      => __( 'Insert into partner', 'avocado55' ),
		'uploaded_to_this_item' => __( 'Uploaded to this partner', 'avocado55' ),
		'items_list'            => __( 'Partners list', 'avocado55' ),
		'items_list_navigation' => __( 'Partners list navigation', 'avocado55' ),
		'filter_items_list'     => __( 'Filter partners list', 'avocado55' ),
	);
	$args = array(
		'label'                 => __( 'Partner', 'avocado55' ),
		'description'           => __( 'A collection of Partners', 'avocado55' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'partner', $args );

}
add_action( 'init', 'avocado55_partner', 0 );
