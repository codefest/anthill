<?php
/**
 * Loop Template Part for full width/text page.
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<article <?php post_class(); ?>>
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php resource_image(); ?>
	<div class="entry-meta">
		<?php
		$source = get_post_meta( get_the_ID(), 'resource_url', true );
		echo "<a href='$source'>View Resource</a>";
		?>
	</div>
	<h4>Source: <?php resource_link_source(true); ?></h4>
	<div class="entry-content"><?php the_content(); ?></div>
	<div class="postmeta"> 
		<?php resource_keyword_list(); ?>
		<span class="username"><?php the_author_posts_link(); ?></span> |
		<time datetime="<?php the_date('Y-m-d'); ?>" class="time-ago"><?php echo human_time_diff( get_the_date('U') ) ?> ago</time>
	</div>
</article>