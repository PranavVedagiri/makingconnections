<?php

function load_theme_fonts()
{
	$heading = get_theme_mod( 'artifact_google_fonts_heading_font' );
	$body = get_theme_mod( 'artifact_google_fonts_body_font' );
	if ( ( !empty( $heading ) && $heading != 'none' ) || ( !empty( $body ) && $body != 'none' ) ) {
		echo '<style type="text/css">';
		$imports = array();
		$styles = array();
		if ( !empty( $heading ) && $heading != 'none' ) {
			$imports[] = '@import url(//fonts.googleapis.com/css?family=' . urlencode( $heading ) . ');';
			$styles[] = 'h1, h2, h3, h4, h5, h6 { font-family: "' . $heading . '" !important }';
		}
		if ( !empty( $body ) && $body != 'none' ) {
			$imports[] = '@import url(//fonts.googleapis.com/css?family=' . urlencode( $body ) . ');';
			$styles[] = 'body { font-family: "' . $body . '" !important }';
		}

		echo implode( "\r\n", $imports );
		echo implode( "\r\n", $styles );
		echo '</style>';

	}
}

// load colors
function load_theme_colors()
{

	$bodyBackgroundColor = get_theme_mod( 'artifact_body_background_color', '#ffffff;' );
	$headerColor = get_theme_mod( 'artifact_header_color', '#292e32;' );
	$headerTextColor = get_theme_mod( 'artifact_header_text_color', '#bfbfb8;' );
	$topBarColor = get_theme_mod( 'artifact_topbar_color', '#f3f4f5;' );
	$topBarTextColor = get_theme_mod( 'artifact_topbar_text_color', '#8b8989;' );
	$textColor = get_theme_mod( 'artifact_text_color', '#8b8989;' );
	$headingsColor = get_theme_mod( 'artifact_headings_color', '#292e32;' );
	$linkColor = get_theme_mod( 'artifact_link_color', '#a6a6a6;' );
	$footerColor = get_theme_mod( 'artifact_footer_color', '#292e32;' );
	$widgetTextColor = get_theme_mod( 'artifact_widget_text_color', '#8b8989;' );
	$widgetHeadingsColor = get_theme_mod( 'artifact_widget_headings_color', '#ffffff;' );

	echo '<style type="text/css">';

	if ( !empty( $headerColor ) ) {
		$hash = '';
		if ( strpos( $headerColor, '#' ) === false ) {
			$hash = '#';
		}
		echo '#header, #cssmenu { background-color: ' . $hash . $headerColor . '}';
	}

	if ( !empty( $headerTextColor ) ) {
		$hash = '';
		if ( strpos( $headerTextColor, '#' ) === false ) {
			$hash = '#';
		}
		echo '#cssmenu a { color: ' . $hash . $headerTextColor . '!important}';
		echo '#cssmenu a:before, #cssmenu a:after { background-color: ' . $hash . $headerTextColor . '!important}';
		echo '#header .tagline { color: ' . $hash . $headerTextColor . '}';
	}

	if ( !empty( $bodyBackgroundColor ) ) {
		$hash = '';
		if ( strpos( $bodyBackgroundColor, '#' ) === false ) {
			$hash = '#';
		}
		echo 'body { background-color: ' . $hash . $bodyBackgroundColor . '}';
	}

	if ( !empty( $linkColor ) ) {
		$hash = '';
		if ( strpos( $linkColor, '#' ) === false ) {
			$hash = '#';
		}
		echo ' a, #footerwidgets a, .footertext a { color: ' . $hash . $linkColor . '}';
		echo '.tagcloud a:hover { background-color: ' . $hash . $linkColor . '}';
	}



	if ( !empty( $topBarColor ) ) {
		$hash = '';
		if ( strpos( $topBarColor, '#' ) === false ) {
			$hash = '#';
		}
		echo '#topbar, #footercredits  { background-color: ' . $hash . $topBarColor . '}';
		echo '#inside { border-color: ' . $hash . $topBarColor . '!important}';
	}

	if ( !empty( $topBarTextColor ) ) {
		$hash = '';
		if ( strpos( $topBarTextColor, '#' ) === false ) {
			$hash = '#';
		}
		echo '#topbar { color: ' . $hash . $topBarTextColor . '}';
	}

	if ( !empty( $textColor ) ) {
		$hash = '';
		if ( strpos( $textColor, '#' ) === false ) {
			$hash = '#';
		}
		echo 'body, .tagline { color: ' . $hash . $textColor . '}';
	}

	if ( !empty( $headingsColor ) ) {
		$hash = '';
		if ( strpos( $headingsColor, '#' ) === false ) {
			$hash = '#';
		}
		echo 'h1,h2,h3,h4,h5,h6, #topbar .sub-title, .sidebarheading, #header  .sub-title, #content h1, #content h2, #content h3, #content h4, #content h5, #content h6, blockquote, .posttitle, .posttitle a, .archive-title { color: ' . $hash . $headingsColor . '; text-decoration-color: ' . $hash . $headingsColor . ' }  #header .site-title { border-color: ' . $hash . $headingsColor . '}';
	}

	if ( !empty( $footerColor ) ) {
		$hash = '';
		if ( strpos( $footerColor, '#' ) === false ) {
			$hash = '#';
		}
		echo '#footer { background-color: ' . $hash . $footerColor . '}';
	}

	if ( !empty( $widgetTextColor ) ) {
		$hash = '';
		if ( strpos( $widgetTextColor, '#' ) === false ) {
			$hash = '#';
		}
		echo '#footer { color: ' . $hash . $widgetTextColor . '}';
	}

	if ( !empty( $widgetHeadingsColor ) ) {
		$hash = '';
		if ( strpos( $widgetHeadingsColor, '#' ) === false ) {
			$hash = '#';
		}
		echo '#footer h1, #footer h2, #footer h3, #footer h4, #footer h5 { color: ' . $hash . $widgetHeadingsColor . '}';
	}

	echo '</style>';
}