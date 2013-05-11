<article <?php post_class('tile cf graphic-design'); ?>>
	<div class="resource-image thumbnail">
			<a href="<?php the_permalink(); ?>">
				<img src="http://placekitten.com/352/198" alt="Featured image for <?php the_title(); ?>" />
			</a>
			<div class="popularity"><a href="#"><i class="icon-heart"></i></a> 9999</div>
			<?php show_loop_icon(); ?>
		</div>
		<h3 class="entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<div class="postmeta"> 
			<span class="username"><?php the_author_posts_link(); ?></span> |
			<time datetime="<?php the_date('Y-m-d'); ?>" class="time-ago"><?php echo human_time_diff( get_the_date('U') ) ?> ago</time>
		</div>
</article>