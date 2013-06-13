jQuery( document ).ready( function( $ ) {

	 /**
	  * make placeholder image height the same as the thumbnails - update as the window resizes
	  */
	 function placeholderSize(){
	 	var imgheight = $('.tile .attachment-anthill-small-tile').height();
	 	$('.placeholder').css({
	 		'height': imgheight + 'px'
	 	});
	 }
	 placeholderSize();
	 $( window ).resize(function(){
	 	placeholderSize()
	 });
	/**
	 *	Sticky Sidebar Navigation
	 *  
	 */
	 $( document ).scroll(function(){
	 	var top = $(this).scrollTop();
	 	var categories = $('.category-nav');
	 	if( top >= 130 && $( window ).width() > 880) {
	 		categories.css({
	 			position: 'fixed',
	 			top: '0px'
	 		});
	 	} else {
	 		categories.css({
	 			position: 'static'
	 		});
	 	}
	 });



	/**
	* TODO: add simplemodal
	*/	
} );