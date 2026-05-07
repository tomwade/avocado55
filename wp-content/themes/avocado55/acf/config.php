<?php
class ACF_Config {

	public function __construct() {
		// Handle flat-file JSON storage for ACF fields
		add_filter( 'acf/settings/save_json', array( $this, 'my_acf_json_save_point' ) );
		add_filter( 'acf/settings/load_json', array( $this, 'my_acf_json_load_point' ) );

		// Disable ACF settings on production servers
		add_filter('acf/settings/show_admin', array( $this, 'my_acf_show_admin' ) );

		// Add our options page
		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page();
		}

		// Inject custom layouts into the main flexible content field.
		add_filter( 'acf/load_field/name=page_content', array( $this, 'add_page_content_layouts' ) );
	}

	public function my_acf_json_load_point( $paths ) {
	    
	    // Remove default path to prevent conflicts
	    unset($paths[0]);
	    
	    // Load from theme's acf folder only
	    $paths[] = get_template_directory() . '/acf';
	    
	    return $paths;
	}
	 
	public function my_acf_json_save_point( $path ) {

	    // update path
	    $path = get_template_directory() . '/acf';
	    
	    // return
	    return $path;
	}

	public function my_acf_show_admin( $show ) {

		return true;

		if( defined( 'WP_DEBUG' ) && WP_DEBUG === true ) {
	    	return true;
	    }

	    return false;
	}

	/**
	 * Append custom flexible layouts to the page_content field.
	 *
	 * @param array $field ACF field settings.
	 * @return array
	 */
	public function add_page_content_layouts( $field ) {
		if ( ! isset( $field['layouts'] ) || ! is_array( $field['layouts'] ) ) {
			return $field;
		}

		if ( isset( $field['layouts']['layout_avocado55_featured_clients'] ) ) {
			return $field;
		}

		$field['layouts']['layout_avocado55_featured_clients'] = array(
			'key' => 'layout_avocado55_featured_clients',
			'name' => 'featured_clients',
			'label' => 'Featured Clients',
			'display' => 'row',
			'sub_fields' => array(
				array(
					'key' => 'field_avocado55_featured_clients_title',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'instructions' => 'Section heading displayed above the marquee.',
					'required' => 0,
				),
				array(
					'key' => 'field_avocado55_featured_clients_items',
					'label' => 'Clients',
					'name' => 'clients',
					'type' => 'repeater',
					'layout' => 'row',
					'button_label' => 'Add Client',
					'min' => 0,
					'sub_fields' => array(
						array(
							'key' => 'field_avocado55_featured_client_image',
							'label' => 'Image',
							'name' => 'image',
							'type' => 'image',
							'required' => 1,
							'return_format' => 'array',
							'preview_size' => 'medium',
							'library' => 'all',
						),
					array(
						'key' => 'field_avocado55_featured_client_title',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_avocado55_featured_client_link',
						'label' => 'Link (Optional)',
						'name' => 'link',
						'type' => 'url',
						'instructions' => 'Optional URL to wrap this client logo. Internal links open in the same tab; external links open in a new tab.',
						'required' => 0,
						'placeholder' => 'https://example.com',
					),
				),
			),
			),
		);

		return $field;
	}

}

new ACF_Config;