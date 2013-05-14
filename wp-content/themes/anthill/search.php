<?php
/**
 * Template for search results page
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<?php get_header(); ?>

		<h1>Results for <?php the_search_query(); ?></h1>
		<div class="search cf">
		<?php if ( have_posts() ) : ?>
			
				
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'loop', 'wide' ); ?>
					
				<?php endwhile; ?>				

			<?php else : ?>

				<?php get_template_part( 'loop', 'empty' ); ?>

			<?php endif; ?>		

		</div>	
	</main>

	<?php get_sidebar(); ?>

 

<?php get_footer(); ?>