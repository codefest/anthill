<?php
/* 
The following class allows easy creation of new custom post types with minimal configuration from the front end. Includes support for custom taxonomies and will eventually also support easily configured meta boxes.
*/
class PostType {
	/** 
	 * Name of the post type
	 * @var string
	 */
	protected $post_type;
	/** 
	 * Args for the post type
	 * @var array
	 */
	protected $post_args = array(
		'public' => true
	);
	/** 
	 * Custom taxonomies for the post type
	 * @var array
	 */
	protected $taxonomies;
	
	function __construct() {
		$grab = func_get_args();
		$this->post_args = array_merge( $this->post_args, $grab[0] );
		// First argument should be the post type name
		$this->post_type = $this->post_args['label'];
		// Allow for optionally sending in taxonomies to begin with
		if( isset( $this->post_args['taxonomies'] ) ) {
			$this->taxonomies = $this->post_args['taxonomies'];
			unset( $this->post_args['taxonomies'] );
		}
	}
	
	function register() {
		// Run the registration
		add_action('init', array( $this, 'create_post_type') );
		if( !empty( $this->taxonomies ) ) {
			// Add the action if taxonomies have been set
			add_action( 'init', array( $this, 'create_taxonomies' ) );
		}
	}
	
	function create_post_type() {
		register_post_type( $this->post_type, $this->post_args );		
	}
	
	function create_taxonomies() {
		// Loop through all possible taxonomies for this custom post type
		foreach( $this->taxonomies as $label => $args ) {
			register_taxonomy( $label, $this->post_type, $args );
		}
	}
	
	function taxonomies() {
		// Set incoming taxonomies to $this->taxonomies for future reference
		$grab = func_get_args();
		$this->taxonomies = $grab[0];
	}
	
	function metaboxes() {
		// TODO: Add easy support for new meta boxes
		
	}
	
}