<?php get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>
<div class="innerspace">
  <?php 
  $round = 1; //loopcount for toggle on vacancies in the template below?>
  <?php while (have_posts()) : the_post(); ?>
        
          <article <?php post_class(); ?>>
       
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $round;?>">
                <?php the_title() ?>
              </a>
            </div>
            <div id="collapse<?php echo $round; ?>" class="panel-collapse collapse">
              <div class="panel-body">
                 <div class="entry-summary">
                  <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <?php get_template_part('templates/entry-meta'); ?>
                <?php the_excerpt(); ?>
              </div>
              </div>
            </div>
          </div>
        </div>
 
 <!-- 
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> Archive?</h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
   <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
-->
 <!--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">-->
</article>
<?php $round ++ ;?>


  <?php endwhile; ?>
  <?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav">
      <ul class="pager">
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      </ul>
    </nav>
  <?php endif; ?>
</div>
