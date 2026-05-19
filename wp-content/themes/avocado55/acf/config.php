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

		// Dynamically add a "Archive Scripts" tab + per-CPT textarea fields to the
		// Theme Options field group for each public custom post type with an archive.
		add_action( 'acf/init', array( $this, 'add_archive_scripts_fields' ) );
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

	/**
	 * Return the public custom post types that expose an archive.
	 *
	 * Built-in post types (e.g. `post`) are skipped because the blog index is
	 * driven by the page selected in Settings → Reading and uses the per-page
	 * `custom_head_scripts` field instead.
	 *
	 * @return WP_Post_Type[] Keyed by post type slug.
	 */
	public static function get_archive_post_types() {
		$post_types = get_post_types( array(
			'public'   => true,
			'_builtin' => false,
		), 'objects' );

		$archives = array();
		foreach ( $post_types as $post_type ) {
			if ( empty( $post_type->has_archive ) ) {
				continue;
			}
			$archives[ $post_type->name ] = $post_type;
		}

		return $archives;
	}

	/**
	 * Inject the "Archive Scripts" tab + a textarea per archive CPT into the
	 * Theme Options field group. Runs on `acf/init` so CPTs registered on the
	 * `init` action at priority 0 are already available.
	 */
	public function add_archive_scripts_fields() {
		if ( ! function_exists( 'acf_add_local_field' ) ) {
			return;
		}

		$archive_post_types = self::get_archive_post_types();
		if ( empty( $archive_post_types ) ) {
			return;
		}

		acf_add_local_field( array(
			'key'        => 'field_options_archive_scripts_tab',
			'label'      => 'Archive Scripts',
			'name'       => '',
			'type'       => 'tab',
			'parent'     => 'group_options',
			'placement'  => 'top',
			'endpoint'   => 0,
		) );

		foreach ( $archive_post_types as $post_type => $object ) {
			$plural = isset( $object->labels->name ) ? $object->labels->name : ucfirst( $post_type );

			acf_add_local_field( array(
				'key'          => 'field_options_archive_custom_head_scripts_' . $post_type,
				'label'        => $plural . ' archive — Custom Head Scripts / Schema',
				'name'         => 'archive_custom_head_scripts_' . $post_type,
				'type'         => 'textarea',
				'parent'       => 'group_options',
				'instructions' => sprintf(
					'Paste any HTML, <script> tags, or JSON-LD schema you want injected inside the <head> on the %s archive. Output is rendered as-is so only paste content you trust.',
					esc_html( $plural )
				),
				'required'     => 0,
				'rows'         => 8,
				'new_lines'    => '',
			) );
		}
	}

}

new ACF_Config;