<?php
/**
 * Template for single post
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

			<!-- page category -->
			<div class="category-icon"><i class="icon-magic"></i> Web</div>

			<!-- title -->
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<!-- Source Image -->
			<img src="http://placekitten.com/593/250">

			<!-- Source Link -->
			<h4><a href="#">Source: Smashing Magazine</a></h4>

			<!-- Author Content-->
			<div>
				<div>
					<!-- Gravatar -->
					<a href="#"><img src="http://placekitten.com/49/49"></a>

					<!-- Username -->
					<p>thoraxmcnally007</p>

					<!-- date posted -->
					<p>1 day ago</p>

					<!-- Content -->
					<div class="entry-content">
						<?php the_content(); ?>			
					</div>
				</div>

				<!-- Comments -->
				<div class="">

					<!-- Area icon and header -->
					<h3><i class="icon-magic"></i> Comments</h3>

					<!-- Comment Button -->
					<a class="primary button" href="#">
						<span class="button-text">Comment</span>
					</a>
				</div>

				<div>
					<!-- Gravatar -->
					<a href="#"><img src="http://placekitten.com/49/49"></a>

					<!-- Username -->
					<p>thoraxmcnally007</p>

					<!-- date posted -->
					<p>1 day ago</p>

					<!-- Content -->
					<div class="entry-content">
						<?php the_content(); ?>			
					</div>
				</div>
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