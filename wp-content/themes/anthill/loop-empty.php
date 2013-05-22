<?php
/**
 * Loop Template Part for when no results are found
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<article id="post-0" class="<?php post_class(); ?>">
	
	<h2 class="entry-title">Well, we'll be darned.</h2>
	
 	<div class="alert error">
		<i class="icon-remove-sign"></i> 
		Sorry, mate! Nothing is here yet. Perhaps searching will help you find something better?
	</div>

	<?php get_search_form(); ?>
</article><!-- #post-0 -->
