<div class="topBanner hidden-sm">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <?php wp_nav_menu(array('menu' => 'Header Menu', 'menu_class' => 'nav nav-pills')); ?>
      </div>
    <div class="col-3 top10 pull-right">
      <?php get_template_part('templates/searchform'); ?>
    </div>
      <div class="col-3 top10 pull-right">
        <?php get_template_part('templates/social'); ?>
      </div>
    </div>
  </div>    
</div>
<header class="banner navbar navbar-static-top" role="banner">
   <div class="container">
      <a class="mob-contact visible-sm" href="#">Contact Us</a>
      <a class="navbar-brand hidden-sm" href="<?php echo home_url(); ?>/"><?php bloginfo('description'); ?></a>
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
      <img class="hidden-sm strap img-responsive" src="<?php bloginfo('stylesheet_directory');?>/assets/img/strapline.gif" width="" height="" />
    </div>
</header>
<div class="container mobhead">
  <a class="navbar-brand visible-sm" href="<?php echo home_url(); ?>/"><?php bloginfo('description'); ?></a>
  <div class="pull-right visible-sm">
    <img class="mob-social" src="<?php bloginfo('stylesheet_directory');?>/assets/img/mobile-passion.gif" width="" height="" class="img-responsive"
   />
    <?php get_template_part('templates/social'); ?>        
  </div>  
</div>
<?php if (is_front_page()) : get_template_part('templates/page', 'hero'); endif; //VF hero placement?>
