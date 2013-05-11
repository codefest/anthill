<?php
/**
 * Loop Template Part for full width/text page.
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<article <?php post_class('cf hentry'); ?>>
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<div class="resource-image thumbnail"> <img src="http://placekitten.com/352/198" alt="TITLE"/>
		<?php show_loop_icon(); ?>
		<div class="popularity"><a href="#"><i class="icon-heart"></i></a> 9999</div>
	</div>
	<div class="entry-meta">
		<?php
		$source = get_post_meta( get_the_ID(), 'resource_url', true );
		echo "<a href='$source'>View Resource</a>";
		?>
	</div>
	<div class="entry-content"><?php the_content(); ?></div>
	<div class="postmeta"> 
		<?php echo get_the_term_list( get_the_ID(), 'keywords' ); ?>
		<span class="username"><?php the_author_posts_link(); ?></span> |
		<time datetime="<?php the_date('Y-m-d'); ?>" class="time-ago"><?php echo human_time_diff( get_the_date('U') ) ?> ago</time>
	</div>
</article>