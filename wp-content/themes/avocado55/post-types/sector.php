<?php
function avocado55_sector() {

	$labels = array(
		'name'                  => _x( 'Sectors', 'Post Type General Name', 'avocado55' ),
		'singular_name'         => _x( 'Sector', 'Post Type Singular Name', 'avocado55' ),
		'menu_name'             => __( 'Sectors', 'avocado55' ),
		'name_admin_bar'        => __( 'Sector', 'avocado55' ),
		'archives'              => __( 'Sector Archives', 'avocado55' ),
		'attributes'            => __( 'Sector Attributes', 'avocado55' ),
		'parent_item_colon'     => __( 'Parent Sector:', 'avocado55' ),
		'all_items'             => __( 'All Sectors', 'avocado55' ),
		'add_new_item'          => __( 'Add New Sector', 'avocado55' ),
		'add_new'               => __( 'Add New', 'avocado55' ),
		'new_item'              => __( 'New Sector', 'avocado55' ),
		'edit_item'             => __( 'Edit Sector', 'avocado55' ),
		'update_item'           => __( 'Update Sector', 'avocado55' ),
		'view_item'             => __( 'View Sector', 'avocado55' ),
		'view_items'            => __( 'View Sectors', 'avocado55' ),
		'search_items'          => __( 'Search Sector', 'avocado55' ),
		'not_found'             => __( 'Not found', 'avocado55' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'avocado55' ),
		'featured_image'        => __( 'Featured Image', 'avocado55' ),
		'set_featured_image'    => __( 'Set featured image', 'avocado55' ),
		'remove_featured_image' => __( 'Remove featured image', 'avocado55' ),
		'use_featured_image'    => __( 'Use as featured image', 'avocado55' ),
		'insert_into_item'      => __( 'Insert into sector', 'avocado55' ),
		'uploaded_to_this_item' => __( 'Uploaded to this sector', 'avocado55' ),
		'items_list'            => __( 'Sectors list', 'avocado55' ),
		'items_list_navigation' => __( 'Sectors list navigation', 'avocado55' ),
		'filter_items_list'     => __( 'Filter sectors list', 'avocado55' ),
	);
	$args = array(
		'label'                 => __( 'Sector', 'avocado55' ),
		'description'           => __( 'A collection of Sectors', 'avocado55' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-chart-pie',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'sector', $args );

}
add_action( 'init', 'avocado55_sector', 0 );
