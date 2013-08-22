<div class="innerspace"><!-- white background container -->
	<div class="row">
		<div class="col-sm-12 col-md-8 col-lg-9">
			<?php 
				if(get_post_meta( $post->ID, '_nicetitle', true )){
					echo "<span class='nicetitle'>" . get_post_meta( $post->ID, '_nicetitle', true) . "</span>";
				}
			?>
			<?php while (have_posts()) : the_post(); ?>
			  <?php the_content(); ?>
			  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
			<?php endwhile; ?>
		</div>
		<div class="col-sm-12 col-md-4 col-lg-3">
			<?php dynamic_sidebar('sidebar-inner'); ?>
		</div>
	</div>
</div>