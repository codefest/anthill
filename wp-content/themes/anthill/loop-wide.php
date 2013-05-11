<?php
/**
 * Loop Template Part for full width/text page.
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<article <?php post_class('tile cf graphic-design hentry'); ?>>
	<div class="resource-image thumbnail"> <img src="http://placekitten.com/352/198" alt="TITLE"/>
		<?php show_loop_icon(); ?>
		<div class="popularity"><a href="#"><i class="icon-heart"></i></a> 9999</div>
	</div>
	<h3 class="entry-title"><?php echo strtoupper( get_the_title() ); ?></h3>
	<div class="entry-content"><?php the_excerpt(); ?></div>
	<div class="postmeta"> 
		<?php echo get_the_term_list( get_the_ID(), 'keywords' ); ?>
		<span class="username"><?php the_author_posts_link(); ?></span> |
		<time datetime="<?php the_date('Y-m-d'); ?>" class="time-ago"><?php echo human_time_diff( get_the_date('U') ) ?> ago</time>
	</div>
</article>