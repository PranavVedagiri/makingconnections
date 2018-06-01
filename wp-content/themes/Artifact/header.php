<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta http-equiv="content-type"
		  content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

	<?php
	load_theme_fonts();
	wp_head();
	load_theme_colors();
	?>
</head>
<body <?php body_class(); ?>>
<div id="header">
	<div class="container">
		<h1 class="site-title">
			<?php
			$image = get_header_image();
			if ( empty( $image ) ):    ?>
				<a href="<?php echo home_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
			<?php
			else: ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>"
					 width="<?php echo get_custom_header()->width; ?>" alt=""/>
			<?php
			endif;
			?>
		</h1>

		<p class="tagline"><?php echo get_bloginfo( 'description' ); ?></p>

		<div id="cssmenu">
			<?php
			wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '<ul>%3$s</ul>',
					'depth'          => 0,
					'fallback_cb' => 'artifact_fallback_menu',
				)
			);
			?>
		</div>
		<!-- End #CSSMenu -->
	</div>
	<!-- End .Container -->
</div>
<!-- End #Header -->