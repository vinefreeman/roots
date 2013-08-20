<footer class="content-info foot" role="contentinfo">
<div class="container footclear">	
	<div class="row visible-xs" id="sch">
		<div class="col-xs-12">
			<?php get_template_part('templates/searchform'); ?>
		</div>
	</div>	
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8">
			<h3>CIS on Twitter</h3>
		</div>	
	    <div class="col-lg-4 col-md-4 col-sm-4">
	    	<h3 class="yellow twitter">Stay in touch</h3>
	    	<?php get_template_part('templates/social'); ?>
	      <?php dynamic_sidebar('sidebar-footer'); ?>
	    </div>
	</div>
</div>
<div class="footcontact">
	<div class="container clearfix">
		<div class="row">
			<div class="col-lg-12">
				<?php dynamic_sidebar('sidebar-footer2'); ?>
			</div>
		</div>
	</div>
</div>
<div class="footmenu">
	<div class="container clearfix">
		<div class="row">	
			<div class="col-lg-12">
				<?php dynamic_sidebar('sidebar-footer3'); ?>
				<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
			</div>
		</div>
	</div>
</div
</footer>

<?php wp_footer(); ?>