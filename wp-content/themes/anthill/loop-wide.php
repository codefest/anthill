<?php
/**
 * Loop Template Part for full width/text page.
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<?php
//@TODO: add logic for category class.. check to see if this is necessary
if(!has_post_thumbnail()){
	$class="tile no-image cf";
}else{
	$class="tile cf";
}

 ?>
<article <?php post_class($class); ?>>
	<?php resource_image(); ?>
	<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo strtoupper( get_the_title() ); ?></a></h3>
	<div class="entry-content"><?php the_excerpt(); ?></div>
	<div class="postmeta"> 
		<?php resource_keyword_list(); ?>
		<span class="username"><?php the_author_posts_link(); ?></span> |
		<time datetime="<?php the_date('Y-m-d'); ?>" class="time-ago"><?php echo human_time_diff( get_the_date('U') ) ?> ago</time>
	</div>
</article>