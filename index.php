<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Woodstock
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <h1>Heading H1</h1>
    <p class="grid grid-cols-3 testclass relative px-5 sm:px-8">Lorem ipsum dolor sit amet consectetur, adipisicing
      elit. Laboriosam
      porro ea
      incidunt, earum, veniam natus iusto
      blanditiis iste labore aperiam voluptatum. Provident maxime, quod minus fugit at labore voluptatem officiis!</p>

    <h2>Heading H2</h2>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam porro ea incidunt, earum, veniam natus iusto
      blanditiis iste labore aperiam voluptatum. Provident maxime, quod minus fugit at labore voluptatem officiis!</p>

    <h3>Heading H3</h3>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam porro ea incidunt, earum, veniam natus iusto
      blanditiis iste labore aperiam voluptatum. Provident maxime, quod minus fugit at labore voluptatem officiis!</p>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
