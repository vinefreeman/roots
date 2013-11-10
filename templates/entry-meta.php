<?php
if (is_single()){
$postdate = mysql2date('j M Y', $post->post_date);?>
	<span class="meta"><?php echo $postdate; ?> in <?php the_category('&raquo; '); ?></span>
<?php } else { ?>
		<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
<?php } ?>

