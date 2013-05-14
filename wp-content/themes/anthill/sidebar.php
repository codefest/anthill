<?php
/**
 * The left Sidebar for our theme, where main navigation is contained
 *
 * 
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<aside class="nomargin">
	<nav>
		<ul class="category-nav">
			<?php
			// Grab all the terms for our filter taxonomy 
			$filters = get_terms('filters', array('hide_empty' => false));
			foreach( $filters as $f ) {
				// Loop through and show each
				$term = single_term_title( null, false );
				$current = get_term_by( 'name', $term, 'filters' );
				$class = $f->slug;
				if ( $class == $current->slug )
					$class .= ' current';
				?>
				<li class="<?php echo $class; ?>"><a href="<?php echo get_term_link( $f ); ?>"><?php echo get_filter_icon($f->slug); ?> <?php echo $f->name; ?></a></li>
				<?php
			}
			?>
		</ul>
		<div class="submit-resource">
			<a href="#" class="primary button">
				<i class="icon-plus"></i><span class="button-text">Submit resource</span>
			</a>
		</div>
		
	</nav>
</aside>