<?php
/*
Plugin Name: Resources for Anthill
Plugin URI: http://github.com/codefest/anthill
Description: This plugin supports the Resource custom post type.
Version: 0.1
Author: Anne Dorko
Author URI: http://www.annedorko.com/
License: GPL2
*/

require_once('classes/types.class.php');

// Args for Resources post type
$resources_options = array( 
	'label' => 'anthill-resources',
	'labels' => array(
			'name' => 'Resources',
			'singular_name' => 'Resource'
		)
);
// Multiple taxonomies can be stored in the following using label => args as key/value pairs
$resources_taxonomies = array(
	'filters' => array(
			'labels' => array(
				'name' => 'Filters',
				'singuler_name' => 'Filter',
			),
			'show_admin_column' => true,
			'hierarchical' => true
		)
);

$resources = new PostType( $resources_options );
$resources->taxonomies( $resources_taxonomies );
$resources->register();