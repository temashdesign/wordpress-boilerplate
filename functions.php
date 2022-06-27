<?php
/**
 * Theme functions
 *
 * @package Woodstock
 */

if (!defined("WOODSTOCK_DIR_PATH")) {
    define("WOODSTOCK_DIR_PATH", untrailingslashit(get_template_directory()));
}

if (!defined("WOODSTOCK_DIR_URI")) {
    define(
        "WOODSTOCK_DIR_URI",
        untrailingslashit(get_template_directory_uri())
    );
}

#-----------------------------------------------------------------#
# Vendor Plugins
#-----------------------------------------------------------------#

define("WOODSTOCK_KIRKI_IS_ACTIVE", class_exists("Kirki"));

// Autoloader
require_once WOODSTOCK_DIR_PATH . "/inc/helpers/autoloader.php";

function woodstock_get_theme_instance()
{
    \WOODSTOCK_THEME\Inc\WOODSTOCK_THEME::get_instance();
}

woodstock_get_theme_instance();

#-----------------------------------------------------------------#
# Customizer
#-----------------------------------------------------------------#
require_once WOODSTOCK_DIR_PATH . "/inc/customizer/frontend.php";
require_once WOODSTOCK_DIR_PATH . "/inc/customizer/backend.php";
// require_once( WOODSTOCK_DIR_PATH . '/inc/customizer/options.php' );
// require_once( WOODSTOCK_DIR_PATH . '/inc/customizer/customizer.php' );
