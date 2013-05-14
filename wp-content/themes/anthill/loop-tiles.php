<?php
/**
 * Loop Template Part for an archive-view (grid layout) tile with or without a featured image
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>

<?php
/**
 * Adds no-image class for a post without a Featured Image
 */
$classes = 'tile cf graphic-design';
if ( !has_post_thumbnail() )
	$classes .= ' no-image';
?>
<article <?php post_class( $classes ); ?>>
	<?php resource_image(); ?>
	<h3 class="entry-title">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
	<div class="postmeta"> 
		<span class="username"><?php the_author_posts_link(); ?></span> |
		<time datetime="<?php the_date('Y-m-d'); ?>" class="time-ago"><?php echo human_time_diff( get_the_date('U') ) ?> ago</time>
	</div>
</article>