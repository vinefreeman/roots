<?php if (is_front_page() ): else: ;?>
<div class="page-header">
  	<h1>
	    <?php echo roots_title(); ?>
	</h1>
	<?php if (is_home()){
				
				if(get_post_meta( 16, '_nicetitle', true )){
					echo "<span class='nicetitle'>" . get_post_meta( 16, '_nicetitle', true) . "</span>";
				}
			
	} ?>
</div>
<?php endif; ?>