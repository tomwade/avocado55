<?php
function e12_sector() {

	$labels = array(
		'name'                  => _x( 'Sectors', 'Post Type General Name', 'e12' ),
		'singular_name'         => _x( 'Sector', 'Post Type Singular Name', 'e12' ),
		'menu_name'             => __( 'Sectors', 'e12' ),
		'name_admin_bar'        => __( 'Sector', 'e12' ),
		'archives'              => __( 'Sector Archives', 'e12' ),
		'attributes'            => __( 'Sector Attributes', 'e12' ),
		'parent_item_colon'     => __( 'Parent Sector:', 'e12' ),
		'all_items'             => __( 'All Sectors', 'e12' ),
		'add_new_item'          => __( 'Add New Sector', 'e12' ),
		'add_new'               => __( 'Add New', 'e12' ),
		'new_item'              => __( 'New Sector', 'e12' ),
		'edit_item'             => __( 'Edit Sector', 'e12' ),
		'update_item'           => __( 'Update Sector', 'e12' ),
		'view_item'             => __( 'View Sector', 'e12' ),
		'view_items'            => __( 'View Sectors', 'e12' ),
		'search_items'          => __( 'Search Sector', 'e12' ),
		'not_found'             => __( 'Not found', 'e12' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'e12' ),
		'featured_image'        => __( 'Featured Image', 'e12' ),
		'set_featured_image'    => __( 'Set featured image', 'e12' ),
		'remove_featured_image' => __( 'Remove featured image', 'e12' ),
		'use_featured_image'    => __( 'Use as featured image', 'e12' ),
		'insert_into_item'      => __( 'Insert into sector', 'e12' ),
		'uploaded_to_this_item' => __( 'Uploaded to this sector', 'e12' ),
		'items_list'            => __( 'Sectors list', 'e12' ),
		'items_list_navigation' => __( 'Sectors list navigation', 'e12' ),
		'filter_items_list'     => __( 'Filter sectors list', 'e12' ),
	);
	$args = array(
		'label'                 => __( 'Sector', 'e12' ),
		'description'           => __( 'A collection of Sectors', 'e12' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-chart-pie',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => ['slug' => 'sectors'],
		'capability_type'       => 'page',
	);
	register_post_type( 'sector', $args );

}
add_action( 'init', 'e12_sector', 0 );
