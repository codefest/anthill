<?php 
/**
 * Turn on JavaScripts
 * @since 0.1
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
		true //footer
	);
}

/**
 * Returns a <div> with the appropriate <i class="icon-{which}">
 * 
 * @var	string	$slug	Expects the slug value of the filter
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

?>
