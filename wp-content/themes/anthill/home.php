<?php
/**
 * default template for our theme.
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
	<main>		
		<div class="tiles-list cf masonry">
		<?php anthill_submit_resource_button('tile'); ?>
		<?php 
		/** Customize the loop to show Resource post types
		 *
		*/
		$args = array(
			'post_type' => 'anthill-resources'
		);
		query_posts( $args );
		
		if ( have_posts() ) : ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
				
				
					<?php get_template_part( 'loop', 'tiles' ); //This will go and get the file loop-tiles.php ?>
					
				<?php endwhile; ?>				

			<?php else : ?>

				<?php get_template_part( 'loop', 'empty' ); //This will go and get the gile loop-empty.php ?>

			<?php endif; ?>		
		</div>
	</main>

<?php get_footer(); ?>