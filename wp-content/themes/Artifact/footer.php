<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 *
 * @package artifact
 */
?>
	<div id="footer">
		<div class="container">
			<div id="footerwidgets">
				<?php /* Widgetised Area */
				if (!function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer' )) ?>
			</div>
		</div>
	</div>

	<div id="footercredits">
		<div class="container">
			<?php
			$footer_logo = get_theme_mod( 'artifact_footer_logo' );
			if ( $footer_logo !== '' ):
				?>
				<img class="footerlogo"
					 src='<?php echo esc_url( get_theme_mod( 'artifact_footer_logo', get_bloginfo( 'template_url' ) . '/img/logo-footer.png' ) ); ?>'
					 alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
			<?php
			endif;
			do_action( 'themefurnace_credits' ); ?>

			<div class="footertext">
				<p><?php echo esc_html( get_theme_mod( 'artifact_footer_text' ) ); ?>
					<a href="http://wordpress.org/"
					   rel="generator"><?php printf( __( 'Proudly powered by %s', 'themefurnace' ), 'WordPress' ); ?></a>
					<?php printf( __( 'Theme: %1$s by %2$s', 'themefurnace' ), 'Artifact', '<a href="http://themefurnace.com" rel="designer">ThemeFurnace</a>', '' ); ?>
				</p>
			</div>
		</div>
		<!-- End .Container -->
	</div><!-- End Footer Credits -->

	<?php wp_footer(); ?>
</body>
</html>