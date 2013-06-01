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

		<?php if ( have_posts() ) : ?>			
				
				<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<?php //@TODO  beef up these loop contents! ?>
					
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h1>

					<div class="entry-content">
						<?php the_content(); ?>			
					</div>
				</article>

				<?php endwhile; ?>				

			<?php else : ?>

				<article id="post-0" class="post no-results not-found hentry">
					
					<h1 class="entry-title">Nothing Found</h1>					

					<div class="entry-content">
						<p>no results were found for the requested archive. Perhaps searching will help find a related post.</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>	

	</main>

<?php get_footer(); ?>