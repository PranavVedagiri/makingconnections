<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 
 *
 * @package Greenr
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses greenr_header_style()
 * @uses greenr_admin_header_style()
 * @uses greenr_admin_header_image()
 */
function greenr_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'greenr_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'video'                  => true,
		'wp-head-callback'       => 'greenr_header_style',
		'admin-head-callback'    => 'greenr_admin_header_style',
		'admin-preview-callback' => 'greenr_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'greenr_custom_header_setup' );

if ( ! function_exists( 'greenr_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see greenr_custom_header_setup().
 */
function greenr_header_style() {
	if ( get_header_image() ) {
	?>
	<style type="text/css">    
		.header-image {
			background-image: url(<?php echo get_header_image(); ?>);
			display: block;
		}
        .header-inner {
        	
        }
        .custom-header-media img {
				display: none;
		}
	</style>
	<?php
	}
	 /* Header Video Settings */
    if(function_exists('is_header_video_active') ) {
		if ( is_header_video_active() ) { ?>
			<style type="text/css">    
				#wp-custom-header-video-button {
				    position: absolute;
				    z-index:1;
				    top:20px;
				    right: 20px;
				    background:rgba(34, 34, 34, 0.5);
				    border: 1px solid rgba(255,255,255,0.5);
				}
				.wp-custom-header iframe,
				.wp-custom-header video {
				      display: block;
				      //height: auto;
				      max-width: 100%;
				      height: 100vh;
				      width: 100vw;
				      overflow: hidden;
				}

		    </style><?php
		}
    }
}
endif; // greenr_header_style
	/*$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}*/

if ( ! function_exists( 'greenr_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see greenr_custom_header_setup().
 */
function greenr_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // greenr_admin_header_style

if ( ! function_exists( 'greenr_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see greenr_custom_header_setup().
 */
function greenr_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // greenr_admin_header_image


/**
 * Customize video play/pause button in the custom header.
 */
if(!function_exists('greenr_video_controls') ) {
	function greenr_video_controls( $settings ) {
		$settings['l10n']['play'] = '<span class="screen-reader-text">' . __( 'Play background video', 'greenr' ) . '</span><i class="fa fa-play"></i>';
		$settings['l10n']['pause'] = '<span class="screen-reader-text">' . __( 'Pause background video', 'greenr' ) . '</span><i class="fa fa-pause"></i>';
		return $settings;
	}
}
add_filter( 'header_video_settings', 'greenr_video_controls' );