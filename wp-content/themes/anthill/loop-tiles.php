<?php
/**
 * Loop Template Part for an archive-view (grid layout) tile with or without a featured image
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<article <?php post_class(); ?>>

	<?php resource_image(); ?>
	<h3 class="entry-title">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

		
		<?php show_loop_icon(); ?>
	</h3>
	<div class="postmeta"> 
		<span class="username"><?php the_author_posts_link(); ?></span> |
		<time datetime="<?php the_date('Y-m-d'); ?>" class="time-ago"><?php echo human_time_diff( get_the_date('U') ) ?> ago</time>
	</div>
</article>