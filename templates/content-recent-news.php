 <?php //while (have_posts()) : the_post();
  global $single; // variable from main post - post ID to exclude from list
      		$sideargs = array(
				'posts_per_page'   => 5,
				'offset'           => 0,
				'category'         => '',
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
        		'tag'              => '', 
				'exclude'		   => $single,
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => '',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'suppress_filters' => true );

      		$sidestories = get_posts( $sideargs);

   ?><h3 class="first">Also see</h3>
   <div class="sidenews">

   	   <ul>	
		     	<?php 
		     	$colourgrad = 0;
		     	foreach ($sidestories as $item) : setup_postdata( $item );
		     	$link = get_permalink($item->ID);
		     	$itemdate = mysql2date('j M Y', $item->post_date);?>
		     		<li<?php if ($colourgrad % 2){ echo " class='grad-alt'";} ?>>
		     		<a href="<?php echo $link; ?>" title="<?php echo $item->post_title; ?>"><?php echo $item->post_title; ?></a>	
		     		<span class="post-date"><?php echo $itemdate; ?></a>
		     		</li>
		     	<?php $colourgrad ++;	
		  		 endforeach;?>
			</ul>
	</div>