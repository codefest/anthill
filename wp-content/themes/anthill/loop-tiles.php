<article <?php post_class('tile cf graphic-design'); ?>>
	<div class="resource-image thumbnail">
			<a href="<?php the_permalink(); ?>">
				<img src="http://placekitten.com/352/198" alt="Featured image for <?php the_title(); ?>" />
			</a>
			<div class="popularity"><a href="#"><i class="icon-heart"></i></a> 9999</div>
			<?php
			if ( !is_archive() ) {
				/** 
				 * Get one of the terms and use it to define the icon
				*/
				$term_slug = '3d';
				$filters = get_the_terms( get_the_ID(), 'filters' );
				if( !empty( $filters ) )
					$only_one = current( $filters );
			
				if ( $only_one )
					$term_slug = $only_one->slug;
			
				echo '<a href="' . get_term_link( $only_one ) . '">' . get_filter_icon( $term_slug ) . '</a>';
			}
			?>

		</div>
		<h3 class="entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<div class="postmeta"> 
			<span class="username"><?php the_author_link(); ?></span> |
			<time datetime="<?php the_date('Y-m-d'); ?>" class="time-ago"><?php echo human_time_diff( get_the_date('U') ) ?> ago</time>
		</div>
</article>