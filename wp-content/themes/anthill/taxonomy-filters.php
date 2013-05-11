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
<div class="wrapper">
	<main>
		<!-- PRIMARY ACTION BUTTON -->
		<div class="submit-resource">
			<a href="#" class="primary button">
				<i class="icon-plus"></i><span class="button-text">Submit resource</span>
			</a>
		</div>
		<h1><?php single_term_title(); ?> Resources</h1>
		<div class="tiles-list cf masonry">
		<?php if ( have_posts() ) : ?>
			
				
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'loop', 'tiles' ); ?>
					
				<?php endwhile; ?>				

			<?php else : ?>

				<?php get_template_part( 'loop', 'empty' ); ?>
				
			<?php endif; ?>		

		</div> <!-- Close tiles list div -->
		
	</main>

	<?php get_sidebar(); ?>

</div> <!-- close .wrapper -->

<?php get_footer(); ?>