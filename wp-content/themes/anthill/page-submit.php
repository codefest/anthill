<?php
/**
 * Submit Resource Form
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */

$resource_errors = anthill_process_new_resource();
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
						<?php
						if ( $resource_errors ) {
							foreach( $resource_errors as $er ) {
								?>
								<div class="alert error"><i class="icon-remove-sign"></i> <?php echo $er; ?></div>
								<?php
							}
						}
						?>
					<form action="#" method="POST" name="new_resource" id="new_resource">
						<label for="resource_title">Title</label>
						<input id="resource_title" name="resource_title" required="" type="text" placeholder="Descriptive title" value="<?php echo $_POST['resource_title']; ?>">
						
						<label for="resource_link">Link</label>
						<input id="resource_link" name="resource_link" required="" type="url" placeholder="http://" value="<?php echo $_POST['resource_link']; ?>">
						
						<label for="resource_description">Tell us about this resource</label>
						<textarea name="resource_description"><?php echo $_POST['resource_description']; ?></textarea>
						
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
						
						<div class="form_right">
							<label for="resource_keywords">Keywords (comma separated)</label>
							<input type="text" name="resource_keywords" placeholder="e.g. typography, web, colors" value="<?php echo $_POST['resource_keywords']; ?>">
						</div>
						
						<?php wp_nonce_field( 'new_resource' ); ?>
						
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