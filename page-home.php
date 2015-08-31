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
<div id="home-sub-head" data-type="background" data-speed="3">
  <div class="container">
    <div class="row">
      <div class="col-md-6 overlay">
        <h3 class="handwriting">I believe in one thing, hard work. If you work hard today, tomorrow's always a little easier.</h3>
      </div>
    </div>
  </div>
</div>
<!-- End Home Sub Head -->
<div class="home-blocks">
  <div class="container">
    <div class="row">
    <section class="col-md-3">
    	<h4>Latest Writings</h4>
        <ul>
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=5&paged=".$paged."&posts_per_page=5");
	   while ( have_posts() ) : the_post(); ?>
       <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
       <?php endwhile; ?>
       </ul>
    </section>
      <section class="col-md-3" id="personal-projects">
        <h4>Latest Personal Projects</h4>
        <ul>
          <?php $personal_projects = new WP_Query('posts_per_page=5&cat=7');
							while($personal_projects -> have_posts()) : $personal_projects -> the_post();
						?>
          <li><a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
            </a></>
            <?php endwhile;
						wp_reset_postdata();?>
        </ul>
        <a href="#">View All <i class="fa fa-arrow-circle-right"></i></a> </section>
      <section class="col-md-3" id="professional-projects">
        <h4>Latest Professional Projects</h4>
        <ul>
          <?php $professional_projects = new WP_Query('posts_per_page=5&cat=8');
							while($professional_projects -> have_posts()) : $professional_projects -> the_post();
						?>
          <li><a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
            </a></>
            <?php endwhile;
						wp_reset_postdata();?>
        </ul>
        <a href="#">View All <i class="fa fa-arrow-circle-right"></i></a> </section>
      <section class="col-md-3" id="resume">
        <h4>Download My Resume</h4>
        <p><i class="fa fa-file-pdf-o"></i> Resume in PDF Fromat</p>
        <p><i class="fa fa-file-word-o"></i> Resume in Secure Word Format</p>
        <p><i class="fa fa-linkedin"></i> LinkedIn Resume</p>
      </section>
    </div>
  </div>
</div>
<div class="home-blocks">
  <div class="container">
    <div class="row">
      <div class="col-md-5" id="mozscape">
        <h4>Domain Rank Checker Powered By Mozscape</h4>
        <form method="post" action="" id='moz-form'>
          Enter Domain Name:
          <input type="text" name="domain1" id="domain">
          <br>
          <input type="submit" value="Get Results" name="submit">
          <button id="hide-result" value="Hide Results">Hide Results</button>
        </form>
        <div id="result"></div>
      </div>
      <div class="col-md-5 col-md-offset-2" id="twitch">
        <h4>My Latest Twitch Video, provided by Twitch API</h4>
        <?php
			
			$users = file_get_contents('https://api.twitch.tv/kraken/users/daygon07');
			$streams = file_get_contents('https://api.twitch.tv/kraken/streams/daygon07/');
			$channel = file_get_contents('https://api.twitch.tv/kraken/channels/daygon07/videos?broadcasts=true&');
			
$jsondecode = json_decode($users);
$videocode = json_decode($streams);
$channelcode = json_decode($channel);

if(is_null($videocode->stream)){?>
        <p>I am not streaming online right now</p>
        <p>My Latest Stream: <?php echo $channelcode->videos['0']->title?></p>
        <object bgcolor='#000000' 
        data='//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf' 
        height='300' 
        type='application/x-shockwave-flash' 
        width='400'>
          <param name="allowFullScreen" 
          value="true" />
          <param name="allowNetworking" 
          value="all" />
          <param name="allowScriptAccess" 
          value="always" />
          <param name='movie' 
          value='//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf' />
          <param name='flashvars' 
          value='channel=daygon07&start_volume=50&auto_play=false&videoId=<?php echo $channelcode->videos['0']->_id; ?>&initial_time=0' />
          <param name="play" value="false" />
        </object>
        <?php }else{ ?>
        <p>Currently Streaming: <?php echo $videocode->stream->game ?></p>
        <p>Watch My Stream Live:
          <object bgcolor="#000000" 
        data="//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf" 
        height="300" 
        type="application/x-shockwave-flash" 
        width="400" 
        >
            <param name="allowFullScreen" 
          value="true" />
            <param name="allowNetworking" 
          value="all" />
            <param name="allowScriptAccess" 
          value="always" />
            <param name="movie" 
          value="//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf" />
            <param name="flashvars" 
          value="channel=daygon07&auto_play=false&start_volume=25" />
          </object>
        </p>
        <?php }; ?>
      </div>
    </div>
  </div>
</div>
<!-- End Home Blocks -->
<div id="about-me" data-type="background" data-speed="2">
  <div class="row">
    <div class="container">
      <div class="col-md-6 overlay">
        <h4 class="handwriting">A Little Bit About Myself</h4>
        <p>Web Development and Search Engine Optimization is my passion. I live eat and breath everything web development. I have been developing websites since I was 14 or 2005, however you want to look at it. It's the only thing in the world I know I'm good enough at to brag about. I'm also a father of 2 little boys, and I'm with my my hischool sweetheart and mother of my children. I want to thank you for stopping by personal site and please let me know if your interested in my skill sets. I would love to come talk to your group about web development and SEO.</p>
      </div>
    </div>
  </div>
</div>
<!-- End About Me -->
<div id="home-blog">
  <section class="section-header">
    <div class="container">
      <h4 class="handwriting">My Latest Writings</h4>
    </div>
  </section>
  <div class="container">
    <div class="row">
      <?php $most_recent_post = new WP_Query('posts_per_page=3&cat=2');
							while($most_recent_post -> have_posts()) : $most_recent_post -> the_post();
						?>
      <div class="col-md-4">
        <h5><a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a></h5>
        <?php the_excerpt('(more...)'); ?>
        <a href="<?php the_permalink(); ?>">Read Entire Post <i class="fa fa-arrow-circle-right"></i></a> </div>
      <?php endwhile;
						wp_reset_postdata();?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
