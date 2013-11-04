<div class="innerspace"><!-- white background container -->
	<div class="row">
		<?php 
				if(get_post_meta( $post->ID, '_nicetitle', true )){
					echo "<span class='nicetitle'>" . get_post_meta( $post->ID, '_nicetitle', true) . "</span>";
				}
			?>
		<div class="col-sm-12 col-md-9 col-lg-9">
			
			<?php while (have_posts()) : the_post(); ?>
			  <?php the_content(); ?>
			  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
			<?php endwhile; ?>
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3">

			<!-- Sub page list -->
			<ul class="clearfix">
			    <?php wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) ); ?>
			    <?php wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>get_post_top_ancestor_id()) ); ?>
			</ul>

			<?php dynamic_sidebar('sidebar-inner'); ?>
			
		</div>
	</div>
</div>