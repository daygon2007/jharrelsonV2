<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package VersaTech Marketing Base Theme
 */

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="page-title">
  <h2 class="container">
    <?php the_title(); ?>
  </h2>
</div>
<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<div id="breadcrumbs"><div class="container"','</div></div>');} ?>
<div id="content-main">
  <div class="container">
    <?php the_content(); ?>
  </div>
</div>
<?php endwhile; endif ?>
<?php get_footer(); ?>
