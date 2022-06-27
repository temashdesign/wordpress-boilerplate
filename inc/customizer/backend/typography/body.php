<?php

	/**
	 * MAIN FONT
	 */

$priority = 1;

$sep_id  = 59374;
$section = 'body';

// Replace bundled Jost with Google version
$main_font = get_theme_mod( 'main_font', array() );
$main_font_family = isset($main_font['font-family']) ? $main_font['font-family'] : '';

$second_font = get_theme_mod( 'second_font', array() );
$second_font_family = isset($second_font['font-family']) ? $second_font['font-family'] : '';

if ($main_font_family == 'Jost, sans-serif') {
	set_theme_mod( 'main_font' , array(
		'font-family'    => 'Jost',
		)
	);	
}
if ($second_font_family == 'Jost, sans-serif') {
	set_theme_mod( 'second_font' , array(
		'font-family'    => 'Jost',
		)
	);	
}

if ( get_theme_mod('main_font_source', '1') === '2' && get_theme_mod('main_font_typekit_kit_id', '') != '' ) {
	add_filter( 'kirki/enqueue_google_fonts', '__return_empty_array' );
}

// Google fonts lists
function woodstock_main_font_choices() {
	return apply_filters( 'woodstock_main_font_choices', array(
		'fonts' => array(
			'google'  => array( 'popularity', 700 ),
		),
	) );
}

function woodstock_second_font_choices() {
	return apply_filters( 'woodstock_second_font_choices', array(
		'fonts' => array(
			'google'  => array( 'popularity', 700 ),
		),
	) );
}

Kirki::add_field( 'woodstock', array(
  'type'        => 'radio-buttonset',
  'settings'    => 'main_font_source',
  'label'       => esc_html__( 'Main Font Source', 'woodstock' ),
  'section'     => $section,
  'default'     => '1',
  'priority'    => 10,
  'choices'     => array(
    '1'	=> esc_attr__('Standard + Google Fonts', 'woodstock'),
    '2'	=> esc_attr__('Adobe Typekit', 'woodstock'),
  ),
));

// Main font: Standard + Google Fonts

Kirki::add_field( 'woodstock', array(
	'type'     		=> 'typography',
	'settings' 		=> 'main_font',
	'label'    	  => esc_html__( 'Main Font', 'woodstock' ),
	'description' => esc_html__( 'Default: Jost | 400 | 1.7', 'woodstock' ),
	'transport'   => 'auto',
	'section'     => $section,
	'priority' 		=> 10,
	'choices' => woodstock_main_font_choices(),
	'default'     => array(
		'font-family'    => 'Jost',
		'variant'        => 'regular',
		'line-height'    => '1.7',
	),
	'output'      => array(
		array(
			'element' => 'body, blockquote cite',
		),
		array(
			'element'  => '.edit-post-visual-editor.editor-styles-wrapper,.wp-block h1,.wp-block h2,.wp-block h3,.wp-block h4,.wp-block h5,.wp-block h6,.editor-post-title__block .editor-post-title__input,.wp-block-quote p,.wp-block-pullquote p,.wp-block-cover .wp-block-cover-text',
			'context'  => array( 'editor' ),
		),
	),
	'required' => array(
		array(
			'setting' => 'main_font_source', 
			'operator' => '==', 
			'value' => '1'
		)
	),
));

// Main font: Adobe Typekit

Kirki::add_field( 'woodstock', array(
	'type'        => 'text',
	'settings'    => 'main_font_typekit_kit_id',
	'label'       => esc_html__( 'Project ID', 'woodstock' ),
	'section'     => $section,
	'default'     => '',
	'priority'    => 10,
	'required' => array(
		array(
			'setting' => 'main_font_source', 
			'operator' => '==', 
			'value' => '2'
		)
	),
));

Kirki::add_field( 'woodstock', array(
	'type'        => 'text',
	'settings'    => 'main_typekit_font',
	'label'       => esc_html__( 'font-family', 'woodstock' ),
	'description'	=> esc_html__( 'The font name used in the CSS output. Example: futura-pt', 'woodstock' ),
	'section'     => $section,
	'default'     => '',
	'priority'    => 10,
	'required' => array(
		array(
			'setting' => 'main_font_source', 
			'operator' => '==', 
			'value' => '2'
		)
	),
));