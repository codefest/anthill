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
} );