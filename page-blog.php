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
      <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=5&paged=".$paged."&posts_per_page=5");
   if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="blog-post">
	<?php the_post_thumbnail(); ?>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="read-more">Read More <i class="fa fa-arrow-circle-right"></i></a> </div>
      <?php endwhile; endif ?>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
