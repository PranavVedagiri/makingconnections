<?php
/**
 * Home template file.
 * @package artifact
 */
get_header(); ?>
	<div id="topbar">
		<div class="container">
			<h2 class="sub-title"><?php echo get_theme_mod( 'artifact_front_page_top_text_title', __( 'Photography Portfolio', 'artifact' ) ); ?></h2>

			<p class="subline"><?php echo get_theme_mod( 'artifact_front_page_top_text_body', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed iaculis, dui condimentum faucibus tempor, risus urna porta lorem, vel bibendum mi dolor ac neque.' ); ?></p>
		</div>
		<!-- End .Container -->
	</div><!-- End #Topbar -->

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
get_footer();