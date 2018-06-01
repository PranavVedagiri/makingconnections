<?php
/**
 * The template for displaying Archive pages.
 * @package artifact
 */
get_header(); ?>
<div id="inside">
	
		<div class="container">

			<?php if ( have_posts() ) : ?>
			
					<h2 class="archive-title">
						<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'artifact' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'artifact' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'artifact' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'artifact' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'artifact' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'artifact' ) ) . '</span>' );
						else :
							_e( 'Archives', 'artifact' );

						endif;
						?>
					</h2>
					<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( !empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
					?>
			

				<div id="posts">
		<div class="container">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'content' );
				endwhile;
			else:
				get_template_part( 'no-results', 'index' );
			endif;
			?> <?php themefurnace_pagination(); ?>
		</div>
	</div>

			<?php
			else :
				get_template_part( 'content', 'none' );
			endif;
			?>
            
		</div><!-- .container -->
</div><!-- inside -->
<?php
get_footer();