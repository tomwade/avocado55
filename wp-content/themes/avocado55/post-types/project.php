<?php
function e12_project() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'e12' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'e12' ),
		'menu_name'             => __( 'Projects', 'e12' ),
		'name_admin_bar'        => __( 'Project', 'e12' ),
		'archives'              => __( 'Project Archives', 'e12' ),
		'attributes'            => __( 'Project Attributes', 'e12' ),
		'parent_item_colon'     => __( 'Parent Project:', 'e12' ),
		'all_items'             => __( 'All Projects', 'e12' ),
		'add_new_item'          => __( 'Add New Project', 'e12' ),
		'add_new'               => __( 'Add New', 'e12' ),
		'new_item'              => __( 'New Project', 'e12' ),
		'edit_item'             => __( 'Edit Project', 'e12' ),
		'update_item'           => __( 'Update Project', 'e12' ),
		'view_item'             => __( 'View Project', 'e12' ),
		'view_items'            => __( 'View Projects', 'e12' ),
		'search_items'          => __( 'Search Project', 'e12' ),
		'not_found'             => __( 'Not found', 'e12' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'e12' ),
		'featured_image'        => __( 'Featured Image', 'e12' ),
		'set_featured_image'    => __( 'Set featured image', 'e12' ),
		'remove_featured_image' => __( 'Remove featured image', 'e12' ),
		'use_featured_image'    => __( 'Use as featured image', 'e12' ),
		'insert_into_item'      => __( 'Insert into project', 'e12' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'e12' ),
		'items_list'            => __( 'Projects list', 'e12' ),
		'items_list_navigation' => __( 'Projects list navigation', 'e12' ),
		'filter_items_list'     => __( 'Filter projects list', 'e12' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'e12' ),
		'description'           => __( 'A collection of Projects', 'e12' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'            => array( ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => ['slug' => 'projects'],
		'capability_type'       => 'page',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'e12_project', 0 );


// Register Custom Taxonomy
function e12_project_service() {

  $labels = array(
    'name'                       => _x( 'Project Services', 'Taxonomy General Name', 'e12' ),
    'singular_name'              => _x( 'Project Service', 'Taxonomy Singular Name', 'e12' ),
    'menu_name'                  => __( 'Project Service', 'e12' ),
    'all_items'                  => __( 'All Items', 'e12' ),
    'parent_item'                => __( 'Parent Item', 'e12' ),
    'parent_item_colon'          => __( 'Parent Item:', 'e12' ),
    'new_item_name'              => __( 'New Item Name', 'e12' ),
    'add_new_item'               => __( 'Add New Item', 'e12' ),
    'edit_item'                  => __( 'Edit Item', 'e12' ),
    'update_item'                => __( 'Update Item', 'e12' ),
    'view_item'                  => __( 'View Item', 'e12' ),
    'separate_items_with_commas' => __( 'Separate items with commas', 'e12' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'e12' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'e12' ),
    'popular_items'              => __( 'Popular Items', 'e12' ),
    'search_items'               => __( 'Search Items', 'e12' ),
    'not_found'                  => __( 'Not Found', 'e12' ),
    'no_terms'                   => __( 'No items', 'e12' ),
    'items_list'                 => __( 'Items list', 'e12' ),
    'items_list_navigation'      => __( 'Items list navigation', 'e12' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'rewrite'                    => [
      'slug'       => 'service',
      'with_front' => false,
    ],
  );
  register_taxonomy( 'project_service', array( 'project' ), $args );

}
add_action( 'init', 'e12_project_service', 0 );


// Register Custom Taxonomy
function e12_project_industry() {

  $labels = array(
    'name'                       => _x( 'Project Industries', 'Taxonomy General Name', 'e12' ),
    'singular_name'              => _x( 'Project Industry', 'Taxonomy Singular Name', 'e12' ),
    'menu_name'                  => __( 'Project Industry', 'e12' ),
    'all_items'                  => __( 'All Items', 'e12' ),
    'parent_item'                => __( 'Parent Item', 'e12' ),
    'parent_item_colon'          => __( 'Parent Item:', 'e12' ),
    'new_item_name'              => __( 'New Item Name', 'e12' ),
    'add_new_item'               => __( 'Add New Item', 'e12' ),
    'edit_item'                  => __( 'Edit Item', 'e12' ),
    'update_item'                => __( 'Update Item', 'e12' ),
    'view_item'                  => __( 'View Item', 'e12' ),
    'separate_items_with_commas' => __( 'Separate items with commas', 'e12' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'e12' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'e12' ),
    'popular_items'              => __( 'Popular Items', 'e12' ),
    'search_items'               => __( 'Search Items', 'e12' ),
    'not_found'                  => __( 'Not Found', 'e12' ),
    'no_terms'                   => __( 'No items', 'e12' ),
    'items_list'                 => __( 'Items list', 'e12' ),
    'items_list_navigation'      => __( 'Items list navigation', 'e12' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
    'rewrite'                    => [
      'slug'       => 'industry',
      'with_front' => false,
    ],
  );
  register_taxonomy( 'project_industry', array( 'project' ), $args );

}
add_action( 'init', 'e12_project_industry', 0 );
