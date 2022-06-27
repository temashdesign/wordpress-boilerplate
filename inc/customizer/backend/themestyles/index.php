<?php

// ============================================
// Panel
// ============================================

Kirki::add_panel( 'panel_themestyles', array(
    'title'         => esc_attr__( 'Theme Styles', 'barberry' ),
    'priority'      => 35,
) );


// ============================================
// Sections
// ============================================

Kirki::add_section( 'global', array(
    'title'          => esc_attr__( 'Global', 'barberry' ),
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_themestyles',
) );

Kirki::add_section( 'header', array(
    'title'          => esc_attr__( 'Header', 'barberry' ),
    'priority'       => 34,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_themestyles',
) );




// ============================================
// Controls
// ============================================

require_once( get_template_directory() . '/inc/customizer/backend/themestyles/global.php');
// require_once( get_template_directory() . '/inc/customizer/backend/themestyles/heading.php');