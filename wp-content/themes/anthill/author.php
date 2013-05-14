<?php
/**
 *  template for user Profile and activity feed
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */
?>
<?php get_header(); ?>

		
		<h1>Resources by <?php echo get_query_var('author_name'); ?></h1>
		<div class="search cf">
		<?php if ( have_posts() ) : ?>
			
				
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'loop','wide' ); ?>

				<?php endwhile; ?>				

			<?php else : ?>

				<?php get_template_part( 'loop', 'empty' ); ?>

			<?php endif; ?>		
		</div>
	</main>

	<?php get_sidebar(); ?>

 

<?php get_footer(); ?>