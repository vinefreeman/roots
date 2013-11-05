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
  
    <div class="row staffpanels">
  
      <?php
        $post_man = get_post(106); 
        $content = $post_man->post_content;
        $nice_content = apply_filters( 'the_content', $content );
              echo "<div class='col-lg-12 col-md-12 col-sm-12 show-grid'>" . $nice_content . "</div>";
      ?> 
      
      <?php //while (have_posts()) : the_post();
      		$args = array(
				//'posts_per_page'   => -1,
				'offset'           => 0,
				'category'         => '',
				'orderby'          => 'menu_order',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'manteam',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'suppress_filters' => true );

      		$cisstaff = get_posts( $args);?>
      		<div class="col-lg-12 col-md-12 col-sm-12">
      		<ul>
      		<?php foreach ($cisstaff as $staff) : setup_postdata( $staff );
			$content = $staff->post_content;
      		$title = get_post_meta( $staff->ID, 'job_title', true );
				echo "<li>";       			
       			echo get_the_post_thumbnail( $staff->ID, array(100,200)) . "<br />"; ?>
       			get_the	
       			<button data-title="Tracy Plant" type="button" data-container="body" data-trigger="click" data-toggle="popover" data-placement="bottom" data-content="<?php echo $content ?> ?>" class="osc_popover btn btn-sm btn-default " data-original-title="" title=""> Click </button>
	

				<?php echo $staff->post_title; ?>&nbsp;-&nbsp;<?php if ($title) {echo $title;} ?><span>+</span>;
				echo "</li>";
			    
            <?php $round ++ ;?>
 		    <?php //endwhile; 
     		endforeach; ?>
     		</ul>
     		</div><!-- end main column from  line 40 -->
     		
  
  </div> <!-- row -->

  <?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav">
      <ul class="pager">
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      </ul>
    </nav>
  <?php endif; ?>

<!-- pop code.
<button data-title="Tracy Plant" type="button" data-container="body" data-trigger="click" data-toggle="popover" data-placement="bottom" data-content="Tracy Plant joined CIS Security Ltd in 2000 as the Human Resources (HR) Manager, managing recruitment, employee relations, welfare, and policies and procedures for the company. In 2007, Tracy was promoted to the position of Strategic HR Manager and, most recently, to HR Director, responsible for the compliance to the Approved Contractor Scheme, SIA Licensing of all licensable staff, policies and procedures, compliance management, and strategic HRM. Tracy also manages TUPE processes and overseas the management of the HR operational team. Tracy is a Chartered Fellow with the Chartered Institute of Personnel and Development (CIPD)." class="osc_popover btn btn-sm btn-default " data-original-title="" title=""> Click </button>
-->