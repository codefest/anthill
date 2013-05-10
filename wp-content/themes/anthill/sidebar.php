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
				?>
				<li class="<?php echo $f->slug; ?>"><a href="<?php echo get_term_link( $f ); ?>"><?php echo get_filter_icon($f->slug); ?> <?php echo $f->name; ?></a></li>
				<?php
			}
			?>
		</ul>
	</nav>
</aside>