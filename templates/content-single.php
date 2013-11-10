<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <!-- <header>
      <div class="page-header">
      <h1 class="entry-title"><?php the_title(); ?></h1>
      
    </div>
    </header> -->
    <?php get_template_part('templates/entry-meta'); ?>
    <div class="innerspace">
    <div class="entry-content">

     <?php if(get_post_meta( $post->ID, '_nicetitle', true )){
        echo "<span class='nicetitle'>" . get_post_meta( $post->ID, '_nicetitle', true) . "</span>";
      } ?>

      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </div>
  </article>
  <?php 
    global $singlepost;
    $singlepost = $post->ID ; 
    echo $singlepost;
   ?>
<?php endwhile; ?>
