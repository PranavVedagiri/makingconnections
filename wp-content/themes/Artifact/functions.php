<?php

// artifact functions and definitions
function artifact_setup()
{
	load_theme_textdomain( 'artifact', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );

	$defaults = array(
		'width'   => 111,
		'height'  => 20,
		'uploads' => true,
	);
	add_theme_support( 'custom-header', $defaults );
	add_theme_support( 'site-logo', array(
		'header-text' => array(
			'sitetitle',
			'tagline',
		),
		'size'        => 'artifact-logo',
	) );

	// Add nav menu
	register_nav_menu( 'primary', 'Primary menu' );
	register_nav_menu( 'social', __( 'Social', 'artifact' ) );

	// Check if the menu exists
	if ( !has_nav_menu( 'primary' ) ) {
		if ( !wp_get_nav_menu_object( 'artifact-primary' ) ) {
			$menu_id = wp_create_nav_menu( 'artifact-primary' );

			// Set up default menu items
			wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-title'   => __( 'Home' ),
				'menu-item-classes' => 'home',
				'menu-item-url'     => home_url( '/' ),
				'menu-item-status'  => 'publish' ) );
		}
	}
}

add_action( 'after_setup_theme', 'artifact_setup' );

function artifact_fallback_menu()
{
	wp_nav_menu( array(
			'menu'       => 'artifact-primary',
			'container'  => false,
			'items_wrap' => '<ul>%3$s</ul>',
			'depth'      => 0,
		)
	);
}

// Pagination

function themefurnace_pagination($pages = '', $range = 2)
{
    global $paged;
    $showitems = ($range * 2) + 1;

    if (empty($paged)) {
        $paged = 1;
    }
    if ('' == $pages) {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<div class="pagination">';
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo '<a href="' . get_pagenum_link(1) . '">&laquo;</a>';
        }

        if ($paged > 1 && $showitems < $pages) {
            echo '<a href="' . get_pagenum_link($paged - 1) . '">&lsaquo;</a>';
        }

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? '<span class="current">' . $i . '</span>' : '<a href="' . get_pagenum_link($i) . '" class="inactive">' . $i . '</a>';
            }
        }

        if ($paged < $pages && $showitems < $pages) {
            echo '<a href="' . get_pagenum_link($paged + 1) . '">&rsaquo;</a>';
        }
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
            echo '<a href="' . get_pagenum_link($pages) . '">&raquo;</a>';
        }
        echo "</div>\n";
    }
}

// Content Width
if ( !isset( $content_width ) )
	$content_width = 990; /* pixels */

// Post formats
//add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

// Post Thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'post-page', 870, 441, true );
add_image_size( 'artifact-thumb', 270, 270, true );
add_image_size( 'artifact-logo', 118, 68, true );
set_post_thumbnail_size( 270, 270, true );


// Widgetized Areas
function artifact_widgets_init()
{
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'artifact' ),
		'id'            => 'artifact-sidebar',
		'before_widget' => '<div class="sidebarwidget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="sidebarheading">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'artifact-footer',
		'before_widget' => '<div class="footerwidget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footerheading">',
		'after_title'   => '</h4>',
	) );
}

add_action( 'widgets_init', 'artifact_widgets_init' );

// Load Roboto Font
function artifact_fonts_url()
{
	$fonts_url = '';
	$roboto = _x( 'on', 'Roboto font: on or off', 'artifact' );

	if ( 'off' !== $roboto ) {
		$font_families = array();
		$font_families[] = 'Roboto:300,400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

//Enqueue scripts and styles
function artifact_scripts()
{
	wp_enqueue_style( 'artifact-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/font-awesome-4.0.3/css/font-awesome.min.css', 'style' );
	wp_enqueue_style( 'artifact-fonts', artifact_fonts_url(), array(), null );
	wp_enqueue_script( 'artifact-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'artifact-top-menu', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'artifact-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}

add_action( 'wp_enqueue_scripts', 'artifact_scripts' );

// Style the Tag Cloud
function custom_tag_cloud_widget( $args )
{
	$args['largest'] = 12; //largest tag
	$args['smallest'] = 12; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
}

add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );

// Style the WordPress.com Tag Cloud
function custom_wp_tag_cloud_widget( $args )
{
	$args['largest'] = 12; //largest tag
	$args['smallest'] = 12; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
}

add_filter( 'wp_widget_tag_cloud_args', 'custom_wp_tag_cloud_widget' );

/* This code filters the Categories archive widget to include the post count inside the link */
add_filter( 'wp_list_categories', 'cat_count_span' );
function cat_count_span( $links )
{
	$links = str_replace( '</a> (', ' (', $links );
	$links = str_replace( ')', ')</a>', $links );

	return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter( 'get_archives_link', 'archive_count_span' );
function archive_count_span( $links )
{
	$links = str_replace( '</a>&nbsp;(', ' (', $links );
	$links = str_replace( ')', ')</a>', $links );

	return $links;
}

// Load Extra Functions
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/themesetup.php';