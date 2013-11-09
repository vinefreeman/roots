<?php // get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

  <?php 
   $round = 0; //loop count for toggle #ids on vacancies in the template below   
  ?>
  
<div class="row newspanels">
  
            
      <?php //while (have_posts()) : the_post();
      		$args = array(
				'posts_per_page'   => 6,
				'offset'           => 0,
				'category'         => '',
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
        'tag'              => 'featured', 
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => '',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'suppress_filters' => true );

      		$cisnews = get_posts( $args);?>
      		<div class="col-lg-12 col-md-12 col-sm-12">
      		<ul class="manteam">
      		<?php foreach ($cisnews as $news) : setup_postdata( $news );
			   $title = $news->post_title;
         $link = get_permalink($news->ID);
				echo "<li>";?>
        <a href="<?php echo $link; ?>" title="<?php echo $title; ?>">
        <span class="golink">+</span>
        <?php $attr = array(
            'class' => "img-responsive",
            'alt' => trim(strip_tags( $attachment->post_excerpt )),
            'title' => trim(strip_tags( $attachment->post_title )),
    );
       			if (has_post_thumbnail($news->ID)){
            echo "<div class='newspic'>";
            echo get_the_post_thumbnail( $news->ID, 'full', $attr);
            echo "</div>"; 
          } else { ?>
          <div class='newspic'>
           <img src="<?php bloginfo('template_url'); ?>/assets/img/cis-security-news.jpg" class="img-responsive" /><br /></a>
          </div>
        <?php } ?>
        <div class="mteam-info">
        <a href="<?php echo $link; ?>" title="<?php echo $person; ?>">
				<?php echo "<span class='jperson'>" . $news->post_title . "</span>"; ?>
        <?php echo "</a></div></li>"; ?>
			  <?php $round ++ ;?>
 		    <?php //endwhile; 
     		endforeach; ?> 
        <?php wp_reset_query(); ?>
     		</ul>
      	</div><!-- end main column from  line 40 -->
</div> <!-- row -->
<div class="row newspanelitems">
<?php $args = array(
        'posts_per_page'   => 12,
        'offset'           => 0,
        'category'         => '',
        'tag__not_in'      => array('featured'),  
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => '',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true );

          $cisnewslist = get_posts( $args);?>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <ul class="manteam">
          <?php foreach ($cisnewslist as $news) : setup_postdata( $news );
         $title = $news->post_title;
         $link = get_permalink($news->ID);
        echo "<li>";?>
        <span class="golink">+</span>
        <div class="mteam-info">
        <a href="<?php echo $link; ?>" title="<?php echo $person; ?>">
        <?php echo "<span class='jperson'>" . $news->post_title . "</span>"; ?>
        <?php echo "</a></div></li>"; ?>
        <?php $round ++ ;?>
        <?php //endwhile; 
        endforeach; ?> 
        <?php wp_reset_query(); ?>
        </ul>
      </div><!-- end colums -->

</div> 