<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package artifact
 */
?>

<div id="sidebar">
	<?php
	do_action( 'before_sidebar' );
	if ( !dynamic_sidebar( 'artifact-sidebar' ) );
	?>
</div>
<!-- End Sidebar -->