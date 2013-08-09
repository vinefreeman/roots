 <div class="topBanner">
      <div class="container">
          <div class="content row">
              <div class="col-lg-3 col-offset-1">
                <a href="">Home</a>
              </div>
              <div class="col-lg-3 col-offset-2">
               
              </div>
          </div>
      </div>    
  </div>
<header class="banner navbar navbar-static-top" role="banner">
   <div class="container">
        <a class="mob-contact visible-sm" href="#">Contact Us</a>
        <a class="navbar-brand hidden-sm" href="<?php echo home_url(); ?>/">
      <?php bloginfo('description'); ?>
     </a>
     <button data-target=".nav-main" data-toggle="collapse" type="button" class="navbar-toggle">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <nav class="nav-main nav-collapse collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
  </header>
  <div class="container mobhead">
     
        
            <a class="navbar-brand visible-sm" href="<?php echo home_url(); ?>/">
            <?php bloginfo('description'); ?>
           </a>
      
        
              <img class="visible-sm mob-social" src="<?php bloginfo('stylesheet_directory');?>/assets/img/mobile-passion.gif" width="" height="" />
              <ul class="social-icons visible-sm">
                <li class="in"><a href="#in">Linkedin</a></li>
                <li class="fb"><a href="#fb">Facebook</a></li>
                <li class="tweet"><a href="#tw">Twitter</a></li>
                <li class="mail"><a href="#e">eMail</a></li>
                <li class="rss"><a href="#rss">Feed</a></li>
              </ul> 
     </div>
  
  <?php if (is_front_page()) : get_template_part('templates/page', 'hero'); endif; //VF hero placement?>
