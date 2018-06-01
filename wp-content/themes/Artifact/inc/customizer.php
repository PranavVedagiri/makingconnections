<?php
/**
 * artifact Theme Customizer
 *
 * @package artifact
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function artifact_customize_register( $wp_customize )
{
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->remove_section( 'colors' );

	// custom handler - textarea
	class themefurnace_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
		<?php
		}
	}

}

add_action( 'customize_register', 'artifact_customize_register' );

function artifact_sanitize_color_hex( $value )
{
	if ( !preg_match( '/\#[a-fA-F0-9]{6}/', $value ) ) {
		$value = '#ffffff';
	}

	return $value;
}

/**
 * Custom Background
 */
add_theme_support( 'custom-background' );

function artifact_customizer( $wp_customize )
{
	$wp_customize->add_section( 'artifact_footer', array(
		'title'       => 'Footer', // The title of section
		'priority'    => 50,
	) );

	$wp_customize->add_setting( 'artifact_footer_text', array(
		'default'           => 'Hello world',
		'sanitize_callback' => 'esc_html',
		// Let everything else default
	) );
	$wp_customize->add_control( 'artifact_footer_text', array(
		// wptuts_welcome_text is a id of setting that this control handles
		'label'   => 'Footer Text',
		// 'type' =>, // Default is "text", define the content type of setting rendering.
		'section' => 'artifact_footer', // id of section to which the setting belongs
		// Let everything else default
	) );

	// $font_choices array from php file
	require_once( dirname( __FILE__ ) . '/google-fonts/fonts.php' );


	$wp_customize->add_section( 'artifact_google_fonts', array(
		'title'    => __( 'Fonts', 'artifact' ),
		'priority' => 50,
	) );

	$wp_customize->add_setting( 'artifact_google_fonts_heading_font', array(
		'default'           => 'none',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'artifact_google_fonts_heading_font', array(
		'label'    => __( 'Header Font', 'artifact' ),
		'section'  => 'artifact_google_fonts',
		'settings' => 'artifact_google_fonts_heading_font',
		'type'     => 'select',
		'choices'  => $font_choices,
	) );

	$wp_customize->add_setting( 'artifact_google_fonts_body_font', array(
		'default'           => 'none',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'artifact_google_fonts_body_font', array(
		'label'    => __( 'Body Font', 'artifact' ),
		'section'  => 'artifact_google_fonts',
		'settings' => 'artifact_google_fonts_body_font',
		'type'     => 'select',
		'choices'  => $font_choices,
	) );


	$wp_customize->add_section( 'artifact_colors', array(
			'title'    => __( 'Colors', 'artifact' ),
			'priority' => 35,
		)
	);

	$wp_customize->add_setting( 'artifact_body_background_color', array(
			'default'           => '#ffffff',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background', array(
		'label'    => __( 'Body background color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_body_background_color',
	) ) );

	$wp_customize->add_setting( 'artifact_header_color', array(
			'default'           => '#292e32',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header', array(
		'label'    => __( 'Header color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_header_color',
	) ) );

	$wp_customize->add_setting( 'artifact_header_text_color', array(
			'default'           => '#bfbfb8',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text', array(
		'label'    => __( 'Header text color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_header_text_color',
	) ) );



	$wp_customize->add_setting( 'artifact_topbar_color', array(
			'default'           => '#f3f4f5',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar', array(
		'label'    => __( 'Top bar color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_topbar_color',
	) ) );

	$wp_customize->add_setting( 'artifact_topbar_text_color', array(
			'default'           => '#8b8989',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_text', array(
		'label'    => __( 'Top bar text color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_topbar_text_color',
	) ) );



	$wp_customize->add_setting( 'artifact_text_color', array(
			'default'           => '#8b8989',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text', array(
		'label'    => __( 'Text color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_text_color',
	) ) );


	$wp_customize->add_setting( 'artifact_headings_color', array(
			'default'           => '#292e32',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headings', array(
		'label'    => __( 'Headings color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_headings_color',
	) ) );


	$wp_customize->add_setting( 'artifact_link_color', array(
			'default'           => '#a6a6a6',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link', array(
		'label'    => __( 'Link color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_link_color',
	) ) );


	$wp_customize->add_setting( 'artifact_footer_color', array(
			'default'           => '#292e32',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer', array(
		'label'    => __( 'Footer color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_footer_color',
	) ) );

	$wp_customize->add_setting( 'artifact_widget_text_color', array(
			'default'           => '#8b8989',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_text', array(
		'label'    => __( 'Footer Widget text color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_widget_text_color',
	) ) );

	$wp_customize->add_setting( 'artifact_widget_headings_color', array(
			'default'           => '#8b8989',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'artifact_sanitize_color_hex',
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_headings', array(
		'label'    => __( 'Footer Widget headings color', 'artifact' ),
		'section'  => 'artifact_colors',
		'settings' => 'artifact_widget_headings_color',
	) ) );


	$wp_customize->add_setting( 'artifact_footer_logo', array(
		// Let everything else default
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'artifact_footer_logo',
			array(
				'label'      => __( 'Footer logo', 'artifact' ),
				'section'    => 'artifact_footer',
				'settings'   => 'artifact_footer_logo',
			)
		)
	);

	$wp_customize->add_section( 'artifact_front_page_top_text', array(
		'title'       => 'Front Page Top Text', // The title of section
		'priority'    => 50,
	) );

	$wp_customize->add_setting( 'artifact_front_page_top_text_title', array(
		'default' => 'Photography Portfolio',
		'sanitize_callback' => 'sanitize_text_field',
		// Let everything else default
	) );
	$wp_customize->add_control( 'artifact_front_page_top_text_title', array(
		// wptuts_welcome_text is a id of setting that this control handles
		'label'   => 'Title',
		// 'type' =>, // Default is "text", define the content type of setting rendering.
		'section' => 'artifact_front_page_top_text', // id of section to which the setting belongs
		// Let everything else default
	) );

	$wp_customize->add_setting( 'artifact_front_page_top_text_body', array(
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed iaculis, dui condimentum faucibus tempor, risus urna porta lorem, vel bibendum mi dolor ac neque.',
		'sanitize_callback' => 'sanitize_text_field',
		// Let everything else default
	) );

	$wp_customize->add_control( new themefurnace_Textarea_Control( $wp_customize, 'artifact_front_page_top_text_body', array(
		'label'   => 'Body',
		'section' => 'artifact_front_page_top_text',
		'settings'   => 'artifact_front_page_top_text_body',
	) ) );
}

add_action( 'customize_register', 'artifact_customizer', 11 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function artifact_customize_preview_js()
{
	wp_enqueue_script( 'artifact_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130528', true );
}

add_action( 'customize_preview_init', 'artifact_customize_preview_js' );