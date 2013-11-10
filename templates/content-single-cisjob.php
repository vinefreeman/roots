<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
   
    <div class="innerspace">
    <div class="entry-content">
      <?php the_content(); ?>
      <?php  // Custom job fields 
        $client = get_post_meta( $post->ID, 'job_client', true ); 
       $pay = get_post_meta(  $post->ID, 'job_pay', true ); 
        $shift = get_post_meta(  $post->ID, 'job_shift', true ); 
        $ref = get_post_meta(  $post->ID, 'job_ref', true );
     
     if ( ! empty( $client )){ echo "<p>Client/Location: " . $client . "</p>" ;}
      if ( ! empty( $pay )){ echo "<p>Pay: " . $pay . "</p>" ;}
       if ( ! empty( $shift )){ echo "<p>Shift Information: " . $shift . "</p>" ;}
        if ( ! empty( $ref )){ echo "<p>Job Ref: " . $ref . "</p>" ;}



      ?>

      

    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
   </div>
  </article>
<?php endwhile; ?>
