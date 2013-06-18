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
					// If the content is a submission form, trigger the new resource function for AJAX capabilities
					if( content.substr(1) == 'submit' ) {
						submitNewResource();
					}
				},
				'html' 
			);
			$('#dialog, #mask').toggleClass('hideModal','showModal');
		});
	}
	modalLinks();
	
	
	/**
	* Resource submission as AJAX
	*/
	
	function submitNewResource() {

		// Default global var errors to "true" for required elements
		errors = {
			title: 'Please enter a title.',
			link: 'Please enter a link to your resource.',
			filter: 'Please select a filter for your resource.'
		};
		
		// Validify the title
		$('#resource_title').on( 'blur change keydown', function(){
			var title = $(this).val().length;
			if ( title == 0 ) {
				errors.title = 'Please enter a title.';
			} else if ( title < 3 ) {
				// Bad length, provide error message
				errors.title = 'Please use a longer title.';
			} else {
				// Good length, remove error
				delete errors.title;
			}
			// If there's an error, write it on the page immediately as a hint
			if( errors.title ) {
				if ( !$('#title_error').length ) {
					$(this).after('<p id="title_error" class="hint"></p>');
				}
				$('#title_error').html( '<i class="icon-exclamation-sign"></i> ' + errors.title);
			} else {
				$('#title_error').remove();
			}
		});
		
		// Validify the link
		$('#resource_link').on( 'blur change keydown', function(){
			var link = $(this).val();
			if( !link.length || link.length < 4 ) {
				// It's too short
				errors.link = 'Please enter a link to your resource.';
			} else {
				// There is a link, lets check it for its values...
				// Has HTTP? 
				if( link.substr(4) != 'http' ) {
					link = 'http://' + link;
				}
				// Use AJAX to check whether URL is real
				var data = {
					action: 'anthill_check_url',
					url: link
				}
				link_input = $(this);
				$.post(
					ajaxurl,
					data,
					function(results){
						if( results == 'false' ) {
							errors.link = 'Please enter a valid link for your resource.';
						} else {
							delete errors.link;
						}
						// If there's an error, write it to the page immediately as a hint
						if( errors.link ) {
							if ( !$('#link_error').length ) {
								link_input.after('<p id="link_error" class="hint"></p>');
							}
							$('#link_error').html( '<i class="icon-exclamation-sign"></i> ' + errors.link);
						} else {
							$('#link_error').remove();
						}
					} // Close success function
				); // Close $.post
			} // Close if/else
		});
		
		$('#submit_resource').click(function(e){
			// Don't do the usual behavior, which would refresh the page
			e.preventDefault();
			// Process data and return errors OR save new post
			
		});
	}
	
	
} );