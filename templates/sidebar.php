<?php if(is_single() || is_archive() || is_home()) {
get_template_part('templates/content', 'recent-news'); 
dynamic_sidebar('sidebar-blog');
  } else {
 dynamic_sidebar('sidebar-primary');} ?>
<?php // dynamic_sidebar('sidebar-primary'); ?>
