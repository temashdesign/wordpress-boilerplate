<?php
/**
 * Header file
 * 
 * @package Woodstock
 * 
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php if (function_exists("wp_body_open")) {
      wp_body_open();
  } ?>

  <header id="masterhead" class="site-header" data-ui="site-header" data-site-header>
        <svg
          class="w-4 h-4 2xl:w-5 2xl:h-5 stroke-black ">
          <use xlink:href="#icon-print"></use>
        </svg>

        <svg class="w-4 h-4 2xl:w-5 2xl:h-5 stroke-black ">
          <use xlink:href="#icon-twitter"></use>
        </svg>
  </header>