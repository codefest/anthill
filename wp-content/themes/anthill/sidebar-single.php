<?php
/**
 * The Right-hand Sidebar for our theme, where meta data about a resource is contained. 
 * Used on singular views.
 * 
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<aside>
		<!-- Likes of single post -->
		<div class="popularity">
			<a href="#">
				<i class="icon-magic"></i>
			</a>
			9999
		</div>

		<!-- change class for number of comments -->
		<div class="popularity">
			<a href="#">
				<i class="icon-magic"></i>
			</a>
			42
		</div>

		<!-- Tag Cloud -->
	<div class="">

	</div>

		<!-- Related resources widget -->
	<div class="">
		<span><?php the_title(); ?></span>
		<span><?php the_author(); ?></span>

		<!-- Likes of single post -->
		<div class="popularity">
			<a href="#">
				<i class="icon-magic"></i>
			</a>
			42
		</div>
	</div>
</aside>