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
			'plural' => 'Resources',
			'single' => 'Resource'
		)
);
// Multiple taxonomies can be stored in the following using label => args as key/value pairs
$resources_taxonomies = array(
	'filters' => array(
			'label' => 'filters',
			'labels' => array(
				'plural' => 'Filters',
				'single' => 'Filter',
			),
			'show_admin_column' => true,
			'hierarchical' => true
		)
);
// Meta boxes
$outgoing = array(
	'title' => __( 'Resource Link' ),
	'unique_key' => 'resource_url',
	'priority' => 'high',
	'args' => array(
		'content' => '<input type="text" class="large-text" name="%field%" value="%meta%" style="padding: 3px 8px;font-size: 1.6em;" />'
	)
);

$resources_metaboxes = array( $outgoing );

$resources = new PostType( $resources_options );
$resources->taxonomies( $resources_taxonomies );
$resources->metaboxes( $resources_metaboxes );
$resources->register();

/* Customize the location of the resource_url metabox to be above the Editor 

		Following: http://wordpress.org/support/topic/move-custom-meta-box-above-editor
*/

add_action( 'add_meta_boxes', 'move_url_metabox', 0 );
function move_url_metabox() {
	$posttype = 'anthill-resources';
	global $_wp_post_type_features;
		if (isset($_wp_post_type_features[$posttype]['editor']) && $_wp_post_type_features[$posttype]['editor']) {
			unset($_wp_post_type_features[$posttype]['editor']);
			add_meta_box(
				'description_section',
				__('Description'),
				'inner_custom_box',
				$posttype, 'normal', 'low'
			);
		}
}
function inner_custom_box( $post ) {
	the_editor($post->post_content);
}