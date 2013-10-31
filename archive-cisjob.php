<?php get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>
<!-- <div class="innerspace">   remove for job page - white back -->
  <?php 
   $round = 0; //loop count for toggle #ids on vacancies in the template below   
  ?>
    <div class="row">
  <!--<div class="panel-group" id="accordion"> accordion outside loop if needed -->
      
      <?php while (have_posts()) : the_post(); ?>
            
            <!--<article <?php post_class(); ?>>-->
           <!-- Column Code -->

            <?php   
                  if ($round == 0) {echo '<div class="col-lg-6 col-md-6 col-sm-6"><div class="panel-group" id="accordion">';}
                  if ($round == (round($wp_query->post_count / 2))) { $acc = 1; echo "</div></div><div class='clearfix visible-xs' style='margin-top: 5px'></div><div class='col-lg-6 col-md-6 col-sm-6'><div class='panel-group' id='accordion$acc'>"; }
            ?>
                        
              <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php if (isset($acc)){echo $acc;} ?>" href="#collapse<?php echo $round;?>">
                    <?php the_title() ?>
                  </a>            
                </div>
                <div id="collapse<?php echo $round; ?>" class="panel-collapse collapse<?php if ( $round == '0' ) { echo " in"; } ?>">
                  <div class="panel-body">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                      <?php get_template_part('templates/entry-meta'); ?>
                      <?php the_excerpt(); ?>
                  </div>
                </div>
              </div>
           
            <!-- </article> -->
             <?php if ($round == (round($wp_query->post_count) - 1)) {echo '</div></div>'; } ?>
            <?php $round ++ ;?>
     <?php endwhile; ?>
  <!--</div> end of accordion old accordion -->
  </div> <!-- row -->

  <?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav">
      <ul class="pager">
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      </ul>
    </nav>
  <?php endif; ?>



<!-- </div> white space inner div-->
