<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package artifact
 */
get_header(); ?>
<div id="inside">
		<div class="container">
			<?php
			if ( have_posts() ) : ?>
					<h2 class="archive-title">
						<?php printf( __( 'Search Results for: %s', 'artifact' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h2>
				<!-- .page-header -->
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'content', 'search' );
				endwhile;
				artifact_content_nav( 'nav-below' );
			else :
				get_template_part( 'no-results', 'search' );
			endif;
			?>
	</div>
</div>
<?php
get_footer();