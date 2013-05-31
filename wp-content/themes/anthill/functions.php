<?php
/**
 * Anthill Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */


/** 
 * Turn on basic theme support, and menus
 * @since Anthill 0.5
 */
add_action( 'after_setup_theme', 'anthill_setup' );
function anthill_setup() {
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails', array( 'anthill-resources' ) );
	
	//image sizes
	add_image_size( 'anthill-small-tile', 300, 193, true );
	add_image_size( 'anthill-full', 550, 1000, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'=> 'Primary Menu',
		'footer' =>'Footer Menu' 
		));	
}

/**
 * Enqueues scripts and styles for front-end
 * anthill_js_activation function is used to activate and register all of the Java Script used as well as activating css styles. -JJ
 * 
 * @since Anthill 0.1
 */
add_action( 'wp_enqueue_scripts', 'anthill_js_activation' ); 
function anthill_js_activation() {
    wp_enqueue_script( 'jquery' );
	$modernizr_path = get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js';
    wp_register_script( 'modernizrjs', $modernizr_path );
    wp_enqueue_script( 'modernizrjs' );
    wp_enqueue_script( 'jquery-masonry' );
    wp_enqueue_script(
		'jquery-simplemodal',
		get_template_directory_uri() . '/js/vendor/jquery.simplemodal.js',
		array( 'jquery' ),
		false,
		true // This script is loaded in the footer
	);
    wp_enqueue_script(
		'main-js',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery' ),
		false,
		true // This script is loaded in the footer
	);
	wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.min.css' );
	wp_enqueue_style( 'normalize' );
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'font-awesome' );
}

/** 
 * Makes <title> pretty, more logical and SEO friendlier
 * @since Anthill 0.1
 *
 * Based on http://perishablepress.com/how-to-generate-perfect-wordpress-title-tags-without-a-plugin/
 * This gets called on header.php
 */
function anthill_header_titles() {
	if (function_exists('is_tag') && is_tag()) { 
		echo 'Tag Archive for &quot;'.$tag.'&quot; - '; 
	} elseif (is_archive()) { 
		wp_title(''); echo ' Archive - '; 
	} elseif (is_search()) { 
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; 
	} elseif (!(is_404()) && (is_single()) || (is_page())) { 
		wp_title(''); echo ' - '; 
	} elseif (is_404()) { 
		echo 'Not Found - '; 
	} if (is_home()) { 
		bloginfo('name'); 
		echo ' - '; 
		bloginfo('description'); 
	} else {
		bloginfo('name'); 
	}
}
/** 
 * Forces author (profile) pages to query resource post-types instead of default posts
 *
 * Based on http://wordpress.stackexchange.com/questions/11210/including-post-type-wiki-in-author-archives
 * Function causes author pages to query resource custom post types. (Displays posts by author)
 */
function set_resources_for_author( &$query ) {
	if( $query->is_author )
		$query->set( 'post_type', 'anthill-resources' );
	remove_action( 'pre_get_posts', 'set_resources_for_author' ); // Run once
}
add_action( 'pre_get_posts', 'set_resources_for_author' );
/**
 * Returns a <div> with the appropriate <i class="icon-{which}">
 * 
 * @var	string	$slug	pass the slug value of the filter
 * @todo make the css class output match up with the custom icon solution
 * @todo incorporate new custom font icons.
 */
function anne_get_filter_icon( $slug = '' ) {
	/**
	 * @var	string	$icon	Sets an appropriate icon-name based on the Font Awesome project
	*/
	switch( $slug ) {
		case 'web':
			$icon = 'chevron';
			break;
		case '3d':
			$icon = 'magic';
			break;
		case 'typography':
			$icon = 'font';
			break;
		case 'design':
			$icon = 'picture';
			break;
		case 'photography':
			$icon = 'camera';
			break;
		case 'video':
			$icon = 'facetime-video';
			break;
		default:
			$icon = 'magic';
	}
	/**
	 * @var	string	$class	Sets a valid class for the wrapping DIV
	*/
	switch( $slug ) {
		case '3d':
			$class = 'three-d';
			break;
		default:
			$class = $slug;
	}
	/**
	 * @var	string	$i	Sets an appropriate number of Font Awesome <i> tags
	*/
	switch( $slug ) {
		case 'web':
			$i = '<i class="icon-' . $icon . '-left"></i><i class="icon-' . $icon . '-right"></i>';
			break;
		default:
			$i = '<i class="icon-' . $icon . '"></i>';
	}
	return '<div class="category-icon ' . $class . '">' . $i . '</div>';
}
/**
 * Melissa's attempt at integrating brian's icons
 */
function get_filter_icon( $slug = '' ) {
	/**
	 * @var	string	$icon	Sets an appropriate icon-name based on the Font Awesome project
	*/
	switch( $slug ) {
		case 'web':
			$class = 'web';
			$icon = '&#xe003;';
		break;
		case '3d':
			$class = 'threed';
			$icon = '&#xe005;';
		break;
		case 'typography':
			$class = 'typography';
			$icon = '&#xe001;';
		break;
		case 'design':
			$class = 'graphicdesign';
			$icon = '&#xe004;';
		break;
		case 'photography':
			$class = 'photography';
			$icon = '&#xe002;';
		break;
		case 'video':
			$class = 'video';
			$icon = '&#xe000;';
		break;
		default:
			$class = 'graphicdesign'; //TODO : come up with 'generic' icon
			$icon = '&#xe004;';
	}
	/**
	 * @var	string	$class	Sets a valid class for the wrapping DIV
	*/
	switch( $slug ) {
		case '3d':
			$class = 'three-d';
			break;
		default:
			$class = $slug;
	}
	
	$i = '<i data-icon="'.$icon.'" class="'.$class.'"></i>';
	
	return '<div class="category-icon ' . $class . '">' . $i . '</div>';
}
/** 
 * Show the appropriate category icon for a resource. Use within the loop. Calls on get_filter_icon()
 *
 * Only displays icons on non-archive pages. 
 * This helps to avoid visually repetitive icons when all results on a page are in the same category.
 * @todo Make the above true only on Filter archive pages, as icons will vary on Keyword search and Author 
 * archive pages
*/
function show_loop_icon() {
	global $post;
	$the_post_type = get_post_type( $post );
	//don't show icon if we are displaying a page of only one taxonomy... looks crappy and repetitive
	if ( !is_tax('filters') && $the_post_type == 'anthill-resources' ) {
		
		//Get one of the terms based on ID and use it to define the correct icon that corrisponds with the term		
		$term_slug = '3d';
		$filters = get_the_terms( get_the_ID(), 'filters' );
		if( !empty( $filters ) ) {
			$only_one = current( $filters );
			$term_slug = $only_one->slug;
			echo '<a href="' . get_term_link( $only_one ) . '">' . get_filter_icon( $term_slug ) . '</a>';
		}
	}
}
/**
 * The purpose of this function is to connect all the generated HTML and CSS 
 * for the keyword tags into one place.
 * @function	resource_keyword_list	Returns a list for the taxonomy "keywords", used in the loop
 * 
 */
function resource_keyword_list() {
	global $post;
	echo get_the_term_list( get_the_ID(), 
		'keywords', 
		'<span class="keywords">', 
		'</span><span class="keywords">', 
		'</span>' );
}
/**
 * @function	resource_image	Returns meta data about the resource, with varying HTML based on whether there is a post thumbnail
 * 
 * The purpose of this function is to connect all the generated HTML and CSS 
 * for the post thumbnail and meta data into one place.
 */
function resource_image() {
	global $post;
	$size = 'anthill-small-tile';
	if ( is_single() )
		$size = 'anthill-full';
	
	if ( has_post_thumbnail() ) { ?>
	<?php show_loop_icon(); ?>
	<div class="resource-image thumbnail">
		<a href="<?php the_permalink(); ?>">
			 <?php the_post_thumbnail( $size ); ?> 
		</a>
	<?php } ?>
		<!-- @TODO Make the popularity legit -->
		<div class="popularity"><a href="#"><i class="icon-heart"></i></a> 9999</div>
		
	<?php if ( has_post_thumbnail() ) { ?>
	</div>
	<?php }
}
/**
 * dissect the resource_url meta and return the host name
 * @param $perma boolean - true = make it return a link, false = no link, just return the host name
 */
function resource_link_source( $perma = false ) {
	global $post;
	$link = get_post_meta( get_the_ID(), 'resource_url', true );
	$breakdown = parse_url( $link );
	extract( $breakdown );
	if ( $perma == true ) {
		echo '<a href="' . $link . '">' . $host . '</a>';
	} else {
		echo $host;
	}
}
/**
 * Filter to category nicenames and featured image status in post_class
 *  
 * @param $classes mixed - An array of classes that will be applied to a post
 */
add_filter('post_class', 'anthill_category_id_class');
function anthill_category_id_class($classes) {
    global $post;
    //every post gets a clearfix
    $classes[] = 'cf';
    //if it's a resource, put it in a tile
    if('anthill-resources' == get_post_type($post->ID))
   		$classes[] = 'tile';

   	//if it does not have a featured image, add the class  no-image
    if(!has_post_thumbnail($post->ID))
		$classes[] = "no-image";
	
	//for convenience, add the categories to the class
	
    foreach(get_the_terms($post->ID, 'filters') as $category)
        $classes[] = $category->slug;
    //all done!
    return $classes;
}
/**
 * Omit standard Posts & Pages from standard search
 * 
 */
add_filter('pre_get_posts','anthill_search_filter');
function anthill_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'anthill-resources');
	}
	return $query;
}

/**
 * Login Pop-up
 * works with anthill_loginout()
 */
add_action('wp_footer', 'anthill_login_popup');
function anthill_login_popup(){ ?>
	<div id="dialog" class="window">
		<h3>Login to anthill!</h3>
		<?php wp_login_form(); ?>
		<a href="#" class="close"><i class="icon-remove-sign icon-large"></i><span class="screen-reader-text"> Close</span></a>
	</div>
	<div id="mask"></div>
<?php }
/**
 * login button with context logic
 * use anywhere a login/logout button that triggers the modal popup is desired
 */
function anthill_loginout(){
	if(!is_user_logged_in()){
		echo '<a href="#dialog" role="pop-trigger">Login</a>';
	}else{
		echo '<a href="'. wp_logout_url( get_permalink() ).'" title="Logout">Logout</a>';
	}
}


/**
 * Callback for accepting and saving new resources from anywhere
 * @TODO Convert for AJAX
 * 
 * Returns
 * 	- false, if nothing was submitted
 * 	- true, if successfully created
 * 	- errors array, if problems are found
 */

function anthill_process_new_resource() {
	global $_POST;
	# Return as false if there is no POST information OR if there is no resource title (meaning it's likely not even a POST for a resource submission)
	if ( empty( $_POST ) || !isset( $_POST['resource_title'] ) )
		return false;
	
	# Convert all of the POST indexes to variable names
	extract( $_POST );
	
	# Security check! Check nonce to make sure that this is a valid incoming submission, and make sure the user is logged in
	if( !wp_verify_nonce( $_wpnonce, 'new_resource') || !is_user_logged_in() )
		die( 'Security check' );
	
	# Okay we made it through, let's run some basic validations and then create the new resource
	if( strlen( $resource_title ) < 3 )
		$errors[] = 'Please add a valid title.';
	
	$url = parse_url( $resource_link );
	if ( empty($resource_link) || !$url )
		$errors[] = 'Please provide a valid URL';

	if ( $url['scheme'] != 'http' && $url['scheme'] != 'https' )
		$resource_link = 'http://' . $resource_link;
	
	if( !anthill_check_url( $resource_link ) )
		$errors[] = 'Please provide a URL currently available online';
	
	if( !$resource_filter )
		$errors[] = 'Please select a filter for your resource';
	
	# Check for general errors
	if( $errors )
		return $errors;
	
	
	# Create keywords taxonomy array
	$keywords = array();
	if( !empty( $resource_keywords ) ) {
		/*
			Separate by commas
			Clean whitespace surrounding each phrase or keyword
			Strip any code
		*/
		$keys = explode( ',', $resource_keywords );
		foreach( $keys as $k ) {
			$clean = wp_strip_all_tags( trim( $k ) );
			$keywords[] = $clean;
		}
	}
	
	# Create the array of unique data about this resource
	$the_resource = array(
		'post_title'  => wp_strip_all_tags( $resource_title ),
		'post_status' => 'publish',
		'post_type'   => 'anthill-resources',
		'tax_input' => array( 'keywords' => $keywords )
	);
	
	if ( !empty( $resource_description ) )
		$the_resource['post_content'] = $resource_description;
	
	# Add the resource and get the ID so that we can also save the meta data which is the link
	$r_id = wp_insert_post( $the_resource, true );
	
	# Add the filter
	wp_set_object_terms( $r_id, $resource_filter, 'filters' );
	
	# Save the resource link
	add_post_meta( $r_id, 'resource_url', $resource_link );
	
	# Redirect to view the new resource link
	$link = get_permalink( $r_id );
    wp_redirect( $link );
}

/**
 * Quick function to ping a URL to check whether it is a valid webpage
 * @TODO create a way to return redirected urls rather than allowing for them outright... this will also help avoid people offering up redirected affiliate links (won't work for all, but those of which are redirects anyways!)
 *
 * Based on http://www.wrichards.com/blog/2009/05/php-check-if-a-url-exists-with-curl/
 */

function anthill_check_url( $url = null ) {
	# Return false if no URL provided
	if ( $url == null )
		return false;
	

	# Let's curl! 
	$ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_TIMEOUT, 5 );
	curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	$data = curl_exec( $ch );
    $httpcode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
    curl_close( $ch );
	
	# Check our http responses... allow for URLs that redirect (for now)
	if( $httpcode >= 200 && $httpcode < 400 ) {
		return true;
	} else {
		return false;
	}
}