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

		<?php if ( have_posts() ) : ?>
			
				
				<?php while ( have_posts() ) : the_post(); ?>
				<article>					
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h1>

					<div class="entry-content">
						<?php the_content(); ?>			
					</div>
					<?php if ( is_user_logged_in() ) { ?>
					<?php var_dump( $_POST ); ?>
					<form action="#" method="POST">
						<label for="resource_title">Title</label>
						<input id="resource_title" name="resource_title" required="" type="text" placeholder="Descriptive title">
						
						<label for="resource_link">Link</label>
						<input id="resource_link" name="resource_link" required="" type="text" placeholder="http://">
						
						<div class="form_left">
							<label>Sort under...</label>
							<?php
							// Grab all the terms for our filter taxonomy 
							$filters = get_terms('filters', array('hide_empty' => false));
							foreach( $filters as $f ) {
								// Loop through and show each
								?>
								<label><input type="radio" name="resource_filter" value="<?php echo $f->slug; ?>" /> <?php echo $f->name; ?></label>
								<?php
							}
							?>
						</div>
						
						<input type="submit" name="submit_resource" value="Submit Resource" id="submit_resource">
					</form>
					<?php } else { ?> 
						<div class="alert"><i class="icon-info-sign"></i> You must be logged in to submit a new resource.</div>
					<?php } ?>
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

	<?php get_sidebar(); ?>

 

<?php get_footer(); ?>