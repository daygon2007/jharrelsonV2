<nav class="navbar" role="navigation">
  <div class="container-fluid wrapper">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="background-color:#fff;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="social-nav">
    	<ul>
        	<li class="col-xs-1"><a href="https://www.facebook.com/jonathon.harrelson" target="_blank" title="My Facebook Page"><i class="fa fa-facebook"></i></a></li>
            <li class="col-xs-1"><a href="http://www.twitter.com/MrJHarrelson" target="_blank" title="My Twitter Feed"><i class="fa fa-twitter"></i></a></li>
            <li class="col-xs-1"><a href="https://plus.google.com/+JonathonHarrelson" target="_blank" title="My Google Plus Page"><i class="fa fa-google-plus"></i></a></li>
            <li class="col-xs-1"><a href="https://www.linkedin.com/in/jonathonharrelson" target="_blank" title="My LinkedIn Profile"><i class="fa fa-linkedin"></i></a></li>
            <li class="col-xs-1"><a href="https://instagram.com/daygon2007/" target="_blank" title="My Instagram Pictures"><i class="fa fa-instagram"></i></a></li>
            <li class="col-xs-1"><a href="http://codepen.io/jharrelson/" target="_blank" title="My Playground"><i class="fa fa-codepen"></i></a></li>
            <li class="col-xs-1"><a href="https://github.com/daygon2007" target="_blank" title="My Repository"><i class="fa fa-github"></i></a></li>
        </ul>
    </div>
        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        <div class="clear"></div>
    </div>
</nav>