<?php
/**
 * The main template file.
 * @package artifact
 */
get_header();
?>

	<div id="posts">
		<div class="container">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					/* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'content', get_post_format() );

				endwhile;
				artifact_content_nav( 'nav-below' );
			else :
				get_template_part( 'no-results', 'index' );
			endif;
			?>
		</div>
	</div>
<?php
get_footer();