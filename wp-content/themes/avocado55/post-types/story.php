<?php
function avocado55_story() {

	$labels = array(
		'name'                  => _x( 'Stories', 'Post Type General Name', 'avocado55' ),
		'singular_name'         => _x( 'Story', 'Post Type Singular Name', 'avocado55' ),
		'menu_name'             => __( 'Stories', 'avocado55' ),
		'name_admin_bar'        => __( 'Story', 'avocado55' ),
		'archives'              => __( 'Story Archives', 'avocado55' ),
		'attributes'            => __( 'Story Attributes', 'avocado55' ),
		'parent_item_colon'     => __( 'Parent Story:', 'avocado55' ),
		'all_items'             => __( 'All Stories', 'avocado55' ),
		'add_new_item'          => __( 'Add New Story', 'avocado55' ),
		'add_new'               => __( 'Add New', 'avocado55' ),
		'new_item'              => __( 'New Story', 'avocado55' ),
		'edit_item'             => __( 'Edit Story', 'avocado55' ),
		'update_item'           => __( 'Update Story', 'avocado55' ),
		'view_item'             => __( 'View Story', 'avocado55' ),
		'view_items'            => __( 'View Stories', 'avocado55' ),
		'search_items'          => __( 'Search Story', 'avocado55' ),
		'not_found'             => __( 'Not found', 'avocado55' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'avocado55' ),
		'featured_image'        => __( 'Featured Image', 'avocado55' ),
		'set_featured_image'    => __( 'Set featured image', 'avocado55' ),
		'remove_featured_image' => __( 'Remove featured image', 'avocado55' ),
		'use_featured_image'    => __( 'Use as featured image', 'avocado55' ),
		'insert_into_item'      => __( 'Insert into story', 'avocado55' ),
		'uploaded_to_this_item' => __( 'Uploaded to this story', 'avocado55' ),
		'items_list'            => __( 'Stories list', 'avocado55' ),
		'items_list_navigation' => __( 'Stories list navigation', 'avocado55' ),
		'filter_items_list'     => __( 'Filter stories list', 'avocado55' ),
	);
	$args = array(
		'label'                 => __( 'Story', 'avocado55' ),
		'description'           => __( 'A collection of Stories', 'avocado55' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'rewrite'               => ['slug' => 'stories'],
		'capability_type'       => 'page',
	);
	register_post_type( 'story', $args );

}
add_action( 'init', 'avocado55_story', 0 );

