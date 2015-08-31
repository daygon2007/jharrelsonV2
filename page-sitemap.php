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
    <article id="main" class="site-main col-md-12" role="main">
      <h2 id="authors">Authors</h2>
<ul>
<?php
wp_list_authors(
  array(
    'exclude_admin' => false,
  )
);
?>
</ul>

<h2 id="pages">Pages</h2>
<ul>
<?php
// Add pages you'd like to exclude in the exclude here
wp_list_pages(
  array(
    'exclude' => '',
    'title_li' => '',
  )
);
?>
</ul>

<h2 id="posts">Posts</h2>
<ul>
<?php
// Add categories you'd like to exclude in the exclude here
$cats = get_categories('exclude=');
foreach ($cats as $cat) {
  echo "<li><h3>".$cat->cat_name."</h3>";
  echo "<ul>";
  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
  while(have_posts()) {
    the_post();
    $category = get_the_category();
    // Only display a post link once, even if it's in multiple categories
    if ($category[0]->cat_ID == $cat->cat_ID) {
		if (is_category('7')){
		echo '<li><a href="' .get_post_meta($post->ID, 'title_url', true).'">'.get_the_title().'</a></li>';
		} else {
      echo '<li><a href="' .get_permalink().'">'.get_the_title().'</a></li>';
		}
    }
  }
  echo "</ul>";
  echo "</li>";
}
foreach( get_post_types( array('public' => true) ) as $post_type ) {
  if ( in_array( $post_type, array('post','page','attachment') ) )
    continue;

  $pt = get_post_type_object( $post_type );

  echo '<h2>'.$pt->labels->name.'</h2>';
  echo '<ul>';

  query_posts('post_type='.$post_type.'&posts_per_page=-1');
  while( have_posts() ) {
    the_post();
    echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
  }

  echo '</ul>';
}
?>
</ul>
    </article>
  </div>
</div>
<?php get_footer(); ?>
