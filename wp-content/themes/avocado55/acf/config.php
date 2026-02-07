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

}

new ACF_Config;