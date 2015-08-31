<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VersaTech Marketing Base Theme
 */

?>

	</div><!-- #content -->
	<div id="pre-footer">
    	<div class="container">
        <div class="col-md-4">
            	<h4>Random Fact About Me</h4>
                <?php $most_recent_post = new WP_Query('posts_per_page=1&cat=9&orderby=rand');
							while($most_recent_post -> have_posts()) : $most_recent_post -> the_post();?>
     
        <blockquote id="fact"><?php the_content(); ?></blockquote>
      
	  <?php endwhile;
						wp_reset_postdata();?>
            </div>
        	<div class="col-md-4">
            	<h4>Latest Tweets</h4>
                <a class="twitter-timeline" href="https://twitter.com/MrJHarrelson" data-widget-id="629824751842668544" data-chrome="noborders transparent" data-tweet-limit="2">Tweets by @MrJHarrelson</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div class="col-md-4">
            	<h4>Useful Links</h4>
                <ul>
                	<li><a href="http://www.moz.com" title="Moz" target="_blank">Moz</a> - My SEO Source</li>
                    <li><a href="http:www.w3schools.com" target="_blank">w3schools</a> - A great source to learn programming</li>
                    <li><a href="http://www.codepen.io" target="_blank">CodePen</a> - A great source for inspiration</li>
                </ul>
            </div>
        </div>
    </div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
        	Site Designed, Built, and Maintained By Jonathon Harrelson. | <a href="<?php bloginfo('url'); ?>/sitemap">Site Map</a>  | <a href="<?php bloginfo('url'); ?>/credits">Credits</a>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60811148-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
