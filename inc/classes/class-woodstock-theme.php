<?php

/**
 * Tailwind to theme
 *
 * @package Woodstock
 */

namespace WOODSTOCK_THEME\Inc;

use WOODSTOCK_THEME\Inc\Traits\Singleton;

class WOODSTOCK_THEME
{
    use Singleton;

    protected function __construct()
    {
        // Load class
        Assets::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions
         */
        add_action("after_setup_theme", [$this, "setup_theme"]);
    }

    /**
     * Setup theme.
     *
     * @return void
     */
    public function setup_theme()
    {
        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support("title-tag");

        /**
         * Custom logo.
         *
         * @see Adding custom logo
         * @link https://developer.wordpress.org/themes/functionality/custom-logo/#adding-custom-logo-support-to-your-theme
         */
        add_theme_support("custom-logo", [
            "header-text" => ["site-title", "site-description"],
            "height" => 100,
            "width" => 400,
            "flex-height" => true,
            "flex-width" => true,
        ]);


        add_theme_support("post-thumbnails");

        add_theme_support("customize-selective-refresh-widgets");

        add_theme_support("automatic-feed-links");

        add_theme_support("html5", [
            "comment-list",
            "comment-form",
            "search-form",
            "gallery",
            "caption",
            "style",
            "script",
        ]);

        add_editor_style();

        add_theme_support("wp-block-styles");

        add_theme_support("align-wide");

        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1240;
        }

        // Localisation support
        load_theme_textdomain(
            "woodstock",
            get_template_directory() . "/languages"
        );
    }



}