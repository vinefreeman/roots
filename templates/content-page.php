<div class="innerspace"><!-- white background container -->
	<?php 
		if (!is_home()) { 

			if(get_post_meta( $post->ID, '_nicetitle', true )){

					echo "<span class='nicetitle'>" . get_post_meta( $post->ID, '_nicetitle', true) . "</span>";
				}
		}
	?>
	<?php while (have_posts()) : the_post(); ?>
	  <?php the_content(); ?>
	  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
	<?php endwhile; ?>
</div>