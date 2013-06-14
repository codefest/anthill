<?php
/**
 * Submit Resource Form.  Applies to a wordpress page with a slug of 'submit'
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 */

$resource_errors = anthill_process_new_resource();
?>
<?php get_header(); ?>
	
	<main>
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
						if ( $resource_errors ) { ?>
							<div class="alert error"><i class="icon-remove-sign"></i> 
								<p>
							<?php
							foreach( $resource_errors as $er ) {
								?>
								<?php echo $er; ?>
								<br />
								<?php
							} ?>
								</p>
							</div>
						<?php } ?>
						
						<?php get_template_part('submit', 'form' ); ?>
						
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

<?php get_footer(); ?>