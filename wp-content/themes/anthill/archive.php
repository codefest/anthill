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


		<h1><?php single_term_title(); ?> Resources</h1>
		<div class="tiles-list cf masonry">
		<?php if ( have_posts() ) : ?>
			
				
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'loop', 'tiles' ); //This goes and gets the file loop-tiles.php ?>
					
				<?php endwhile; ?>				

			<?php else : ?>

				<?php get_template_part( 'loop', 'empty' ); //This goes and gets the file loop-empty.php ?>
				
			<?php endif; ?>		

		</div> <!-- Close tiles list div -->
		
	</main> <!-- Close main sectioning element -->

	<?php get_sidebar(); ?>

 

<?php get_footer(); ?>