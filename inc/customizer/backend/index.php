<?php

/* Configs */

Kirki::add_config( 'woodstock', array(
  'gutenberg_support' => true,
  'capability'        => 'edit_theme_options',
  'option_type'       => 'theme_mod',
) );

function woodstock_kirki_config_style( $config ) {
	return wp_parse_args( array(
		'disable_loader' => true,
	), $config );
}
add_filter( 'kirki_config', 'woodstock_kirki_config_style' );

// ==================================================================
// Remove Customize Pages
// ==================================================================

add_action('admin_menu', 'remove_customize_pages');
function remove_customize_pages(){
    global $submenu;
    //echo "<pre>";
    //print_r($submenu);
    //echo "</pre>";
    unset($submenu['themes.php'][15]); // remove Header link
    unset($submenu['themes.php'][20]); // remove Background link
}


//==============================================================================
//  Remove Section
//==============================================================================
add_action( 'customize_register', 'woodstock_remove_css_section', 15 );
/**
 * Remove the additional CSS section, introduced in 4.7, from the Customizer.
 * @param $wp_customize WP_Customize_Manager
 */
function woodstock_remove_css_section( $wp_customize ) {
    $wp_customize->remove_section( 'custom_css' );
}