<?php 
/**
 * Enqueues scripts and styles for front-end
 * @since Anthill 0.1
 *
 *anthill_js_activation function is used to activate and register all of the Java Script used as well as activating css styles. 
 *
 */
add_action( 'wp_enqueue_scripts', 'anthill_js_activation' ); 
function anthill_js_activation() {
    wp_enqueue_script( 'jquery' );
	$modernizr_path = get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js';
    wp_register_script( 'modernizrjs', $modernizr_path );
    wp_enqueue_script( 'modernizrjs' );
    wp_enqueue_script( 'jquery-masonry' );
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
 * Enables featured images
 * @since Anthill 0.1
 */
add_theme_support( 'post-thumbnails', array( 'anthill-resources' ) );
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
 * @function	get_filter_icon	Returns a <div> with the appropriate <i class="icon-{which}">
 * 
 * @var	string	$slug	Expects the slug value of the filter
 * @todo make the css class output match up with the custom icon solution
 * @todo incorporate new custom font icons.
 */
function get_filter_icon( $slug = '' ) {
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
	if ( !is_tax('filters') && $the_post_type == 'anthill-resources' ) {
		/** 
		 * Get one of the terms baised on ID and use it to define the correct icon that corrisponds with the term
		*/
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
 * @function	resource_keyword_list	Returns a list for the taxonomy "keywords", used in the loop
 * 
 * The purpose of this function is to connect all the generated HTML and CSS 
 * for the keyword tags into one place.
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
	$size = 'medium';
	if ( is_single() )
		$size = 'large';
	
	if ( has_post_thumbnail() ) { ?>
	<div class="resource-image thumbnail">
		<a href="<?php the_permalink(); ?>">
			 <?php the_post_thumbnail( $size ); ?> 
		</a>
	<?php } ?>
		<!-- @TODO Make the popularity relevant -->
		<div class="popularity"><a href="#"><i class="icon-heart"></i></a> 9999</div>
		<?php show_loop_icon(); ?>
	<?php if ( has_post_thumbnail() ) { ?>
	</div>
	<?php }
}

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
 * add category nicenames and featured image status in post_class 
 * @author mc
 */
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
	    foreach((get_the_category($post->ID)) as $category)
	        $classes[] = $category->category_nicename;
	        return $classes;
	}
	add_filter('post_class', 'anthill_category_id_class');