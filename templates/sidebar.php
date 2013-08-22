<?php if(is_single() || is_archive() || is_home()) {
 dynamic_sidebar('sidebar-blog');
  } else {
 dynamic_sidebar('sidebar-primary');} ?>
<?php // dynamic_sidebar('sidebar-primary'); ?>
