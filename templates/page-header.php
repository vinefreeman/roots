<?php if (is_front_page() ): else: ;?>
<div class="page-header">
	<?php // show job count
	if (is_post_type_archive( 'cisjob' )){
		$count_posts = wp_count_posts('cisjob'); 
		$jobs = $count_posts->publish;
		$showme = true;
	}
	?>
  	<h1><?php echo roots_title(); ?><?php if ($showme){echo "<span class='badge'>".$jobs."</span>";} ?></h1> 
	<?php if (is_home()){
				
				if(get_post_meta( 16, '_nicetitle', true )){
					echo "<span class='nicetitle'>" . get_post_meta( 16, '_nicetitle', true) . "</span>";
				} 
			
		
		} ?>
</div>
<?php endif; ?>