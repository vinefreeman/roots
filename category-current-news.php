<?php // get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

  <?php 
  //================================================
  // Cat template includes the cat buttons above 
  // above innerspace container then featured boxes
  // then post list and year archive.
  //================================================
  ?>
  <?php
  $round = 0; //loop count for toggle #ids on vacancies in the template below   
  ?>

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
 <!-- innerspace was here --> 
        <div class="row newspanels show-grid">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <!-- 3 featured posts with images -->
               <h2 class="yel">Featured</h2>
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
                        <div class="mteam-info"> <!-- div closed in php below -->
                            <a href="<?php echo $link; ?>" title="<?php echo $title; ?>">
                            <?php echo "<span class='jperson'>" . $news->post_title . "</span>"; ?>
                            <?php echo "</a></div></li>"; ?>
                        <?php $round ++ ;?>
                        <?php //endwhile; 
                        endforeach; ?> 
                        <?php wp_reset_query(); ?>
                </ul>
            </div><!-- end main column from  line 40 -->
        </div> <!-- row -->
        <div class="innerspace"> 
        <div class="row newspanelitems">
        <?php
                $curr_cat = single_cat_title("", false);  
                $cat = get_cat_ID($curr_cat); 
                $args = array(
                'posts_per_page'   => 12,
                'offset'           => 0,
                'category'         => $cat,
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
          <div class="col-lg-9 col-md-9 col-sm-9">
              <h2>Also See</h2>
                <?php 
                foreach ($cisnewslist as $news) : setup_postdata( $news );   ?>
                <?php //vars 
                $title = $news->post_title;
                $link = get_permalink($news->ID);
                $snip = $news->post_excerpt;
                ?>
                     <article <?php post_class(); ?>>
                        <header>
                        <h2 class="entry-title"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
                         <?php $postdate = mysql2date('j M Y', $news->post_date);?>
                            <span class="meta<?php if (is_archive()){echo " archive";} ?>"><?php echo $postdate; ?></span>
                        </header>
                        <div class="entry-summary">
                        <?php the_excerpt(); ?>
                        </div>
                     </article>
                <?php endforeach; ?>
          </div><!-- cols -->
          <div class="col-lg-3 col-md-3 col-sm-3">   
                <h2>News Archive</h2>
                <?php $args = array(
                  'type'            => 'yearly',
                  'limit'           => '',
                  'format'          => 'html', 
                  'before'          => '',
                  'after'           => '',
                  'show_post_count' => false,
                  'echo'            => 1,
                  'order'           => 'DESC'
                ); ?>
                <?php // wp_get_archives( $args ); ?> 

                <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
                  <option value=""><?php echo esc_attr( __( 'Select Year' ) ); ?></option> 
                  <?php wp_get_archives( array( 'type' => 'yearly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
                </select>
          </div><!-- end colums -->

      </div> <!-- end row -->
</div><!-- inner space -->