<?php

/**
 * Enqueue theme assets
 *
 * @package Woodstock
 */

namespace WOODSTOCK_THEME\Inc;

use WOODSTOCK_THEME\Inc\Traits\Singleton;

class Assets
{
    use Singleton;

    protected function __construct()
    {
        // Load class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Actions

        add_action("wp_enqueue_scripts", [$this, "register_styles"]);
        add_action("wp_enqueue_scripts", [$this, "register_scripts"]);
        add_action("wp_footer", [$this, "include_svg_icons"]);

        if (is_admin()):
            add_action("admin_enqueue_scripts", [
                $this,
                "register_admin_styles",
            ]);
        endif;
    }

    public function register_admin_styles()
    {
        // Register Styles
        // wp_register_style( 'woodstock-admin-css', WOODSTOCK_DIR_URI . '/assets/build/styles/admin.css', [], filemtime( WOODSTOCK_DIR_PATH . '/assets/build/styles/admin.css' ), 'all' );

        // Enqueue Styles
        // wp_enqueue_style( 'woodstock-admin-css' );
    }

    public function register_styles()
    {
        // Register Styles
        wp_register_style(
            "style-css",
            get_stylesheet_uri(),
            [],
            filemtime(WOODSTOCK_DIR_PATH . "/style.css"),
            "all"
        );
        wp_register_style(
            "woodstock-css",
            WOODSTOCK_DIR_URI . "/assets/build/styles/app.css",
            [],
            filemtime(WOODSTOCK_DIR_PATH . "/assets/build/styles/app.css"),
            "all"
        );

        // Enqueue Styles

        // Typekit fonts
        if (
            get_theme_mod("main_font_source", "1") === "2" &&
            get_theme_mod("main_font_typekit_kit_id", "") != ""
        ) {
            wp_enqueue_style(
                "woodstock-typekit-main",
                "//use.typekit.net/" .
                    esc_attr(get_theme_mod("main_font_typekit_kit_id", "")) .
                    ".css"
            );
        }

        wp_enqueue_style("style-css");
        wp_enqueue_style("woodstock-css");
    }

    public function register_scripts()
    {
        // Register Scripts
        wp_register_script(
            "app-js",
            WOODSTOCK_DIR_URI . "/assets/build/js/app.js",
            [],
            filemtime(WOODSTOCK_DIR_PATH . "/assets/build/js/app.js"),
            true
        );
        wp_register_script(
            "vendor-js",
            WOODSTOCK_DIR_URI . "/assets/build/js/vendor.js",
            [],
            filemtime(WOODSTOCK_DIR_PATH . "/assets/build/js/vendor.js"),
            true
        );

        // Enqueue Scripts
        wp_enqueue_script("jquery");
        wp_enqueue_script("app-js");
        wp_enqueue_script("vendor-js");

        $wp_js_vars = [
            "ajax_url" => admin_url("admin-ajax.php"),
        ];

        wp_localize_script("vendor-js", "wp_js_var", $wp_js_vars);
    }

    /**
     * Add SVG definitions to footer.
     */
    public function include_svg_icons()
    {
        $svg_icons_path =
            \get_template_directory() .
            "/assets/build/images/svg-sprite/icons.svg";

        if (file_exists($svg_icons_path)) {
            include_once $svg_icons_path;
        }
    }
}