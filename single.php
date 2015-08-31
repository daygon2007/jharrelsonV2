<?php
/**
 * The template for displaying all single posts.
 *
 * @package VersaTech Marketing Base Theme
 */

get_header(); ?>

<div id="page-title">
  <h2 class="container">
    <?php the_title(); ?>
  </h2>
</div>
<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<div id="breadcrumbs"><div class="container"','</div></div>');} ?>
<div id="content-main">
  <div class="container">
    <div class="col-md-8">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_post_thumbnail(); ?>
      <?php the_content(); ?>
      <?php endwhile; endif ?>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
