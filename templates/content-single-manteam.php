<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
        <!--<div class="innerspace">-->
    <!--<div class="entry-content">-->
    <div class="row">
    <div class="col-lg-3 col-md-4 col-sm-4">
<!-- featured image-->
       <?php $attr = array(
            'class' => "img-responsive",
            'alt' => trim(strip_tags( $attachment->post_excerpt )),
            'title' => trim(strip_tags( $attachment->post_title )),
    );
            if (has_post_thumbnail()){
            the_post_thumbnail( 'full', $attr) ; 
          } ?>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-5">
<!-- content-->
    <?php the_content(); ?>
    </div>
    <div class="col-lg-3 col-lg-offset-1 col-md-3 cold-sm-3">
<!-- featured image-->
<p>Staff list</p>
    </div>
    
     
      
    <!--</div>-->
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
   <!-- </div> -->
 </div> <!-- row -->
  </article>

<?php endwhile; ?>
