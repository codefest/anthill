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
	* Basic modal events
	* 
	* USAGE: Add role="pop-trigger" to any <a> tag to trigger dialog boxes - toggles between 'hideModal' and 'showModal' classes to CSS display: none; or display: block;
	* TODO: Add better handling for dialog content to change if needed down the line, right now it always exists at the bottom as a login box
	*/
	
	function modalLinks() {
		$('a[role="pop-trigger"],#mask').click(function(e){
			e.preventDefault(); // Prevents change in URI
			// Grab the HREF attribtue to determine which content to display
			var content = $(this).attr('href');
			// Create AJAX data to send
			var data = {
				action: 'anthill_modal',
				show: content.substr(1)
			}
			// Send the AJAX for the right HTML
			$.post(
				ajaxurl,
				data,
				function(response){
					// Write it to the page
					$('#dialog .content').html(response);
				},
				'html' 
			);
			$('#dialog, #mask').toggleClass('hideModal','showModal');
		});
	}
	modalLinks();
	
} );