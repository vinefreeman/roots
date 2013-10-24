<?php
/**
 * Register sidebars and widgets
 */
function roots_widgets_init() {
  // Sidebars
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

   register_sidebar(array(
    'name'          => __('Blog Sidebar', 'roots'),
    'id'            => 'sidebar-blog',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

register_sidebar(array(
    'name'          => __('Inner Page Sidebar', 'roots'),
    'id'            => 'sidebar-inner',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));  

  
  register_sidebar(array(
    'name'          => __('Footer - Ask a question', 'roots'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
  

  register_sidebar(array(
    'name'          => __('Footer Email and Telephone', 'roots'),
    'id'            => 'sidebar-footer2',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  
  // Widgets
  register_widget('Roots_Vcard_Widget');
}
add_action('widgets_init', 'roots_widgets_init');

/**
 * Example vCard widget
 */
class Roots_Vcard_Widget extends WP_Widget {
  private $fields = array(
    'title'          => 'Title (optional)',
    'street_address' => 'Street Address',
    'locality'       => 'City/Locality',
    'region'         => 'State/Region',
    'postal_code'    => 'Zipcode/Postal Code',
    'tel'            => 'Telephone',
    'email'          => 'Email'
  );

  function __construct() {
    $widget_ops = array('classname' => 'widget_roots_vcard', 'description' => __('Use this widget to add a vCard', 'roots'));

    $this->WP_Widget('widget_roots_vcard', __('Roots: vCard', 'roots'), $widget_ops);
    $this->alt_option_name = 'widget_roots_vcard';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_roots_vcard', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('vCard', 'roots') : $instance['title'], $instance, $this->id_base);

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
  ?>
    <p class="vcard">
      <a class="fn org url" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a><br>
      <span class="adr">
        <span class="street-address"><?php echo $instance['street_address']; ?></span><br>
        <span class="locality"><?php echo $instance['locality']; ?></span>,
        <span class="region"><?php echo $instance['region']; ?></span>
        <span class="postal-code"><?php echo $instance['postal_code']; ?></span><br>
      </span>
      <span class="tel"><span class="value"><?php echo $instance['tel']; ?></span></span><br>
      <a class="email" href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a>
    </p>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_roots_vcard', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_roots_vcard'])) {
      delete_option('widget_roots_vcard');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_roots_vcard', 'widget');
  }

  function form($instance) {
    foreach($this->fields as $name => $label) {
      ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'roots'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
  }
} ?>
<?php
/**
 * Plugin Name: Simple Widget
 * Description: A widget that displays authors name.
 * Version: 0.1
 * Author: Bilal Shaheen
 * Author URI: http://gearaffiti.com/about
 * Orig link: http://wp.tutsplus.com/tutorials/creative-coding/building-custom-wordpress-widgets/
 * Use this link too http://justintadlock.com/archives/2009/05/26/the-complete-guide-to-creating-widgets-in-wordpress-28
 */


add_action( 'widgets_init', 'my_widget' );


function my_widget() {
  register_widget( 'MY_Widget' );
}

class MY_Widget extends WP_Widget {

  function MY_Widget() {
    $widget_ops = array( 'classname' => 'example', 'description' => __('A widget that displays the authors name ', 'example') );
    
    $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'example-widget' );
    
    $this->WP_Widget( 'example-widget', __('Example Widget', 'example'), $widget_ops, $control_ops );
  }
  
  function widget( $args, $instance ) {
    extract( $args );

    //Our variables from the widget settings.
    $title = apply_filters('widget_title', $instance['title'] );
    $name = $instance['name'];
    $show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

    echo $before_widget;

    // Display the widget title 
    if ( $title )
      echo $before_title . $title . $after_title;

    //Display the name 
    if ( $name )
      printf( '<p>' . __('Hey their Sailor! My name is %1$s.', 'example') . '</p>', $name );

    
    if ( $show_info )
      printf( $name );

    
    echo $after_widget;
  }

  //Update the widget 
   
  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    //Strip tags from title and name to remove HTML 
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['name'] = strip_tags( $new_instance['name'] );
    $instance['show_info'] = $new_instance['show_info'];

    return $instance;
  }

  
  function form( $instance ) {

    //Set up some default widget settings.
    $defaults = array( 'title' => __('Example', 'example'), 'name' => __('Bilal Shaheen', 'example'), 'show_info' => true );
    $instance = wp_parse_args( (array) $instance, $defaults ); ?>

    <!--Widget Title: Text Input.-->
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'example'); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
    </p>

    <!--Text Input-->
    <p>
      <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Your Name:', 'example'); ?></label>
      <input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
    </p>

    
    <!--Checkbox-->
    <p>
      <input class="checkbox" type="checkbox" <?php checked( isset( $instance['show_info']), true ); ?> id="<?php echo $this->get_field_id( 'show_info' ); ?>" name="<?php echo $this->get_field_name( 'show_info' ); ?>" /> 
      <label for="<?php echo $this->get_field_id( 'show_info' ); ?>"><?php _e('Display info publicly?', 'example'); ?></label>
    </p>

  <?php
  }
}
?>
