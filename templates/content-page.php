<div class="innerspace"><!-- white background container -->
	<?php get_post_meta( $post->ID, '_my_meta_value_key', true )?>
	<?php while (have_posts()) : the_post(); ?>
	  <?php the_content(); ?>
	  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
	<?php endwhile; ?>
</div>