<?php 

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
		true
	);
	 

}

add_action( 'wp_enqueue_scripts', 'anthill_js_activation' ); 
?>
