<?php
function avocado55_team() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'avocado55' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'avocado55' ),
		'menu_name'             => __( 'Team', 'avocado55' ),
		'name_admin_bar'        => __( 'Team Member', 'avocado55' ),
		'archives'              => __( 'Team Archives', 'avocado55' ),
		'attributes'            => __( 'Team Member Attributes', 'avocado55' ),
		'parent_item_colon'     => __( 'Parent Team Member:', 'avocado55' ),
		'all_items'             => __( 'All Team Members', 'avocado55' ),
		'add_new_item'          => __( 'Add New Team Member', 'avocado55' ),
		'add_new'               => __( 'Add New', 'avocado55' ),
		'new_item'              => __( 'New Team Member', 'avocado55' ),
		'edit_item'             => __( 'Edit Team Member', 'avocado55' ),
		'update_item'           => __( 'Update Team Member', 'avocado55' ),
		'view_item'             => __( 'View Team Member', 'avocado55' ),
		'view_items'            => __( 'View Team Members', 'avocado55' ),
		'search_items'          => __( 'Search Team Member', 'avocado55' ),
		'not_found'             => __( 'Not found', 'avocado55' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'avocado55' ),
		'featured_image'        => __( 'Featured Image', 'avocado55' ),
		'set_featured_image'    => __( 'Set featured image', 'avocado55' ),
		'remove_featured_image' => __( 'Remove featured image', 'avocado55' ),
		'use_featured_image'    => __( 'Use as featured image', 'avocado55' ),
		'insert_into_item'      => __( 'Insert into team member', 'avocado55' ),
		'uploaded_to_this_item' => __( 'Uploaded to this team member', 'avocado55' ),
		'items_list'            => __( 'Team members list', 'avocado55' ),
		'items_list_navigation' => __( 'Team members list navigation', 'avocado55' ),
		'filter_items_list'     => __( 'Filter team members list', 'avocado55' ),
	);
	$args = array(
		'label'                 => __( 'Team Member', 'avocado55' ),
		'description'           => __( 'A collection of Team Members', 'avocado55' ),
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
		'rewrite'               => ['slug' => 'team'],
		'capability_type'       => 'page',
	);
	register_post_type( 'team_member', $args );

}
add_action( 'init', 'avocado55_team', 0 );

