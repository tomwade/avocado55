<?php
function e12_team_member() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'e12' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'e12' ),
		'menu_name'             => __( 'Team Members', 'e12' ),
		'name_admin_bar'        => __( 'Team Member', 'e12' ),
		'archives'              => __( 'Team Member Archives', 'e12' ),
		'attributes'            => __( 'Team Member Attributes', 'e12' ),
		'parent_item_colon'     => __( 'Parent Team Member:', 'e12' ),
		'all_items'             => __( 'All Team Members', 'e12' ),
		'add_new_item'          => __( 'Add New Team Member', 'e12' ),
		'add_new'               => __( 'Add New', 'e12' ),
		'new_item'              => __( 'New Team Member', 'e12' ),
		'edit_item'             => __( 'Edit Team Member', 'e12' ),
		'update_item'           => __( 'Update Team Member', 'e12' ),
		'view_item'             => __( 'View Team Member', 'e12' ),
		'view_items'            => __( 'View Team Members', 'e12' ),
		'search_items'          => __( 'Search Team Member', 'e12' ),
		'not_found'             => __( 'Not found', 'e12' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'e12' ),
		'featured_image'        => __( 'Featured Image', 'e12' ),
		'set_featured_image'    => __( 'Set featured image', 'e12' ),
		'remove_featured_image' => __( 'Remove featured image', 'e12' ),
		'use_featured_image'    => __( 'Use as featured image', 'e12' ),
		'insert_into_item'      => __( 'Insert into team member', 'e12' ),
		'uploaded_to_this_item' => __( 'Uploaded to this team member', 'e12' ),
		'items_list'            => __( 'Team Members list', 'e12' ),
		'items_list_navigation' => __( 'Team Members list navigation', 'e12' ),
		'filter_items_list'     => __( 'Filter team members list', 'e12' ),
	);
	$args = array(
		'label'                 => __( 'Team Member', 'e12' ),
		'description'           => __( 'A collection of Team Members', 'e12' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'page-attributes' ),
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
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'query_var' 			   => false,
		'rewrite'               => ['slug' => 'team'],
		'capability_type'       => 'page',
	);
	register_post_type( 'team_member', $args );

}
add_action( 'init', 'e12_team_member', 0 );