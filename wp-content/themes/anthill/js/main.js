/**
 *	Activate Masonry on the visual tiles
 *  @Since 0.1
 */
jQuery( document ).ready( function( $ ) {
    $( '.tiles-list' ).masonry( { 
		itemSelector: '.tile',
  		// set columnWidth a fraction of the container width
 		columnWidth: function( containerWidth ) {
    		return containerWidth / 3;
 		 }
	} );
	
	$( document ).scroll(function(){
		var top = $(this).scrollTop();
		var categories = $('.category-nav');
		if( top >= 130 ) {
			categories.css({
				position: 'fixed',
				top: '20px'
			});
		} else {
			categories.css({
				position: 'static'
			});
		}
	});
} );