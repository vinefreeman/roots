<footer class="content-info container" role="contentinfo">
<div class="row visible-xs" id="sch">
	<div class="col-xs-12">
		<?php get_template_part('templates/searchform'); ?>
	</div>
</div>	
  <div class="row">
    <div class="col-lg-12">
      <?php dynamic_sidebar('sidebar-footer'); ?>
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>