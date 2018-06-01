<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package artifact
 */
get_header(); ?>

<div id="inside">
  <div class="container">
    <h2 class="archive-title">
      <?php _e( 'Oops! That page can&rsquo;t be found.', 'artifact' ); ?>
    </h2>
    <p>
      <?php _e( 'It looks like nothing was found at this location. Please try a search', 'artifact' ); ?>
    </p>
    <?php
					get_search_form();
					
					
						?>
  </div>
</div>
<?php
get_footer();
