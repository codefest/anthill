<?php
/**
 * page for single post.
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

		<?php if ( have_posts() ) : ?>


			<?php while ( have_posts() ) : the_post(); ?>
	
				<?php get_template_part( 'loop', 'full' ); ?>

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

<?php get_sidebar(); ?>

</div> <!-- close .wrapper -->

<?php get_footer(); ?>