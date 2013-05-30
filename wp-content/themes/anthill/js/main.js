jQuery( document ).ready( function( $ ) {
    /**
	 *	Activate Masonry on the visual tiles
	 *  @Since 0.1
	 * responsive additions via http://osvaldas.info/responsive-jquery-masonry-or-pinterest-style-layout
	 */
	var columns = 3,
    setColumns = function() { columns = $( window ).width() > 640 ? 3 : $( window ).width() > 320 ? 2 : 1; };
 
    setColumns();
    $( window ).resize( setColumns );

 	$( '.tiles-list' ).masonry( { 
		itemSelector: '.tile',
		isAnimated: true,
  		// set columnWidth a fraction of the container width
 		columnWidth: function( containerWidth ) {
    		return containerWidth / columns;
 		 }
	} );
	/**
	 *	Sticky Sidebar Navigation
	 *  
	 */
	$( document ).scroll(function(){
		var top = $(this).scrollTop();
		var categories = $('.category-nav');
		if( top >= 130 && $( window ).width() > 640) {
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


	/**
	* Modal login
	* works with anthill_login_popup added to functions.php 
	*/
	//select all the a tag with name equal to modal
	$('a[role=pop-trigger]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		//Get the A tag
		var id = $(this).attr('href');
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set height and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(500); 
	
	});
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		$('#mask, .window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
} );