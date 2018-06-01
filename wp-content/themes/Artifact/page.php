<?php
/**
 * The template for displaying all pages.
 *
 * @package artifact
 */

get_header(); ?>

	<div id="inside">
		<div class="container">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'content', 'page' );
				get_sidebar();
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) {
					comments_template();
				}
			endwhile; // end of the loop.
			?>
		</div>
	</div>
<?php
get_footer();