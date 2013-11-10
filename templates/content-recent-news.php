 <?php //while (have_posts()) : the_post();
      		$sideargs = array(
				'posts_per_page'   => 5,
				'offset'           => 0,
				'category'         => '',
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
        		'tag'              => '', 
				'exclude'          => $singlepost,
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => '',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'suppress_filters' => true );

      		$sidestories = get_posts( $sideargs);

   ?>
   <div class="sidenews">
   	<?php 
   	echo $singlepost;?>
   	   <ul>	
		     	<?php foreach ($sidestories as $item) : setup_postdata( $item );
		     	$link = get_permalink($item->ID);
		     	$itemdate = mysql2date('j M Y', $item->post_date);?>
		     		<li>
		     		<a href="<?php echo $link; ?>" title="<?php echo $item->post_title; ?>"><?php echo $item->post_title; ?></a>	
		     		<span class="post-date"><?php echo $itemdate; ?></a>
		     		</li>
		  		<?php endforeach;?>
			</ul>
	</div>