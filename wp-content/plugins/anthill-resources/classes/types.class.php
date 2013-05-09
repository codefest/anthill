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
	
	/** 
	 * Custom meta boxes for the post type
	 * @var array
	 */
	protected $metaboxes;
	
	function __construct() {
		$grab = func_get_args();
		$this->post_args = array_merge( $this->post_args, $grab[0] );
		// First argument should be the post type name
		$this->post_type = $this->post_args['label'];
		$this->post_args['labels'] = $this->better_labels( $this->post_args['labels'] );
		// Allow for optionally sending in taxonomies to begin with
		if( isset( $this->post_args['taxonomies'] ) ) {
			$this->taxonomies = $this->post_args['taxonomies'];
			unset( $this->post_args['taxonomies'] );
		}
	}
	
	function register() {
		// Run the registration
		add_action('init', array( $this, 'create_post_type') );
		add_action('admin_head', array( $this, 'post_type_icons' ));
		if( !empty( $this->taxonomies ) ) {
			// Add the action if taxonomies have been set
			add_action( 'init', array( $this, 'create_taxonomies' ) );
		}
		// If the meta boxes are succesfully added, add the save for metaboxes if they're here
		if( !empty( $this->metaboxes ) ) {
			add_action( 'save_post', array( &$this, 'save_metabox' ), 10, 2 );
		}
	}
	
	function create_post_type() {
		if ( !empty(  $this->metaboxes ) ) {
			$this->post_args['register_meta_box_cb'] = array( &$this, 'create_metaboxes' );
		}
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
		$taxonomies = $grab[0];
		foreach( $taxonomies as $current => $args ) {
			// Clean the taxonomies
			$label = $args['label'];
			unset( $args['label'] );
			// Update new taxonomy with better values and labels
			$this->taxonomies[$label] = $args;
			$this->taxonomies[$label]['labels'] = $this->better_labels( $args['labels'] );
		}
	}
	
	function better_labels( $override ) {
		extract( $override );
		unset( $override['single'] ); unset( $override['plural'] );
		// Generate a basic label set that should match the new post type or taxonomy
		$labels = array(
			'name' => $plural,
			'singular_name' => $plural,
			'all_items' => 'All ' . $plural,
			'add_new_item' => 'Add New ' . $single,
			'edit_item' => 'Edit ' . $single,
			'new_item' => 'New ' . $single,
			'view_item' => 'View ' . $single,
			'search_items' => 'Search ' . $plural,
			'not_found' => 'No ' . strtolower( $plural ) . ' found',
			'not_found_in_trash' => 'No ' , strtolower( $plural ) . ' found in trash',
			'parent_item' => 'Parent ' . $single,
			'parent_item_colon' => 'Parent ' . $single . ':',
			'add_or_remove_items' => 'Add or remove ' . strtolower( $plural ),
			'popular_items' => 'Popular ' . $plural
		);
		return array_merge( $labels, $override );
	}
	
	function post_type_icons() {
		$plugin_directory = dirname(__FILE__);
		?>
		<style type="text/css" media="screen">
			#adminmenu #menu-posts-<?php echo $this->post_type; ?>.menu-icon-post div.wp-menu-image {
	      background: url(<?php echo plugins_url( 'images/menu-icon.png', $plugin_directory ); ?>) 4px -32px no-repeat;
	    }
	    #adminmenu #menu-posts-<?php echo $this->post_type; ?>.menu-icon-post:hover div.wp-menu-image, #adminmenu #menu-posts-dictionary.menu-icon-post.wp-has-current-submenu div.wp-menu-image {
        background: url(<?php echo plugins_url( 'images/menu-icon.png', $plugin_directory ); ?>) 4px 0px no-repeat;
      }
      #icon-edit.icon32-posts-<?php echo $this->post_type; ?> {
        background: url(<?php echo plugins_url( 'images/page-icon.png', $plugin_directory ); ?>);
      }
		</style>
		<?php
	}
	
	function enqueue( $eq ) {
		# Be sure to only attempt if the incoming scripts have something in them
		if( !empty( $eq ) && is_array( $eq ) ) {
			$this->scripts = $eq;
		}
		add_action( 'admin_enqueue_scripts', array( $this, 'add_scripts' ) );
	}
	
	function add_scripts( $hook ) {
		$screen = get_current_screen();
		foreach( $this->scripts as $e ) {
			extract( $e );
			# Catch the hooks first!
			if( $screen->id == $this->post_type AND ( in_array( $hook, $hooks) ) ) {
				if( $type == 'styles' ) {
					wp_register_style( $name, $location );
					wp_enqueue_style( $name );
				}
				if ( $type == 'script' ) {
					wp_register_script( $name, $location );
					wp_enqueue_script( $name );
				}
			}
		}
	}
	
	/*
	 * Meta Box Functions
	 *
	*/
	function create_metaboxes() {
		// Look for all possible meta boxes and register it to the post type
		foreach( $this->metaboxes as $metabox ) {
			// Grab the data
			extract( $metabox );
			$context = isset( $context ) ? $context : 'normal';
			$priority = isset( $priority ) ? $priority : 'default';
			$args = isset( $args ) ? $args : array();
			// Add the box!
			add_meta_box( $unique_key, $title, array( &$this, 'metabox_callback' ), $this->post_type, $context, $priority, $args );
		}
	}
	
	function save_metabox( $post_id, $args ) {
			// Is this an autosave?
		  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		    return;
		  // Is this coming from the right place?
		  if ( empty( $_POST[$this->post_type] ) ||  !wp_verify_nonce( $_POST[$this->post_type], plugin_basename( __FILE__ ) ) )
		    return;
		  // Does the user have permissions to edit this?
		  if ( 'page' == $_POST['post_type'] ) {
		    if ( !current_use_can( 'edit_page', $post_id ) )
		      return;
		  } else {
		    if ( !current_user_can( 'edit_post', $post_id ) )
		      return;
		  }

	  # Authentication a go! Save the data!

		### Loop through each metabox to save its data
		foreach( $this->metaboxes as $metabox ) {
			$key = $metabox['unique_key']; // Grab the key for this metabox
			$incoming_data = $_POST[$key];
			// Save the incoming data to this post
			update_post_meta( $post_id, $key, $incoming_data );
		}
	}
	
	function metaboxes() {
		// Accept all incoming data and add it to the Object
		$grab = func_get_args();
		$this->metaboxes = $grab[0];
	}
	
	function metabox_callback( $post, $box ) {
		// First, get nonce
		wp_nonce_field( plugin_basename(__FILE__), $this->post_type );
		// Go ahead...
		extract( $box );
		// First pass for field_id
		$prepared = str_replace( '%field%', $id, $args['content'] );
		// Check for option fulfilled data, and use it it needed
		if ( strpos( $prepared, '%meta%' ) ) {
			$meta = get_post_meta( $post->ID, $id, 1 );
			// Put the new value in
			$prepared = str_replace( '%meta%', $meta, $prepared );
		}
		echo $prepared;
	}
	
}