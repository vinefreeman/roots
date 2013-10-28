<?php
/**
 * Custom functions
 */
/* Define the custom box */

add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );

// backwards compatible (before WP 3.0)
// add_action( 'admin_init', 'myplugin_add_custom_box', 1 );

/* Do something with the data entered */
add_action( 'save_post', 'myplugin_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function myplugin_add_custom_box() {
    $screens = array( 'post', 'page' );
    foreach ($screens as $screen) {
        add_meta_box(
            'myplugin_sectionid',
            __( 'Nice large summary or description', 'myplugin_textdomain' ),
            'myplugin_inner_custom_box',
            $screen
        );
    }
}

/* Prints the box content */
function myplugin_inner_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

  // The actual fields for data entry
  // Use get_post_meta to retrieve an existing value from the database and use the value for the form
  $value = get_post_meta( $post->ID, '_nicetitle', true );
  echo '<label for="myplugin_new_field">';
  echo  _e("Text", 'myplugin_textdomain' ); //2 5/10/13 VF added the echo line at the start as this was causing an error adding and removing categories, and adding cats on the post pages.
  echo '</label> ';
  echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="'.esc_attr($value).'" size="100" style="width: 100%" />';
}

/* When the post is saved, saves our custom data */
function myplugin_save_postdata( $post_id ) {

  // First we need to check if the current user is authorised to do this action. 
  if ( 'page' == $_REQUEST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return;
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // Secondly we need to check if the user intended to change this value.
  if ( ! isset( $_POST['myplugin_noncename'] ) || ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  // Thirdly we can save the value to the database

  //if saving in a custom table, get post_ID
  $post_ID = $_POST['post_ID'];
  //sanitize user input
  $mydata = sanitize_text_field( $_POST['myplugin_new_field'] );

  // Do something with $mydata 
  // either using 
  add_post_meta($post_ID, '_nicetitle', $mydata, true) or
    update_post_meta($post_ID, '_nicetitle', $mydata);
  // or a custom table (see Further Reading section below)
}


  /*Google Fonts*/
    function load_google_fonts() {
                wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Oxygen');
                wp_enqueue_style( 'googleFonts');
            }
     
        add_action('wp_print_styles', 'load_google_fonts');
  
   #allow adding of shortcodes to text     
   add_filter('widget_text', 'do_shortcode');


  #Custom post type test

  #first create custom post type with labels and related info 
  function _custom_post_job() {
    $labels = array(
      'name'               => _x( 'Vacancies', 'post type general name' ),
      'singular_name'      => _x( 'Job', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'book' ),
      'add_new_item'       => __( 'Add New Position' ),
      'edit_item'          => __( 'Edit Position' ),
      'new_item'           => __( 'New Position' ),
      'all_items'          => __( 'All Positions' ),
      'view_item'          => __( 'View Position' ),
      'search_items'       => __( 'Search positions' ),
      'not_found'          => __( 'No positions found' ),
      'not_found_in_trash' => __( 'No positions found in the Trash' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'CIS Vacancies'
    );
        $args = array(
      'labels'        => $labels,
      'description'   => 'Holds CIS job positions and related data',
      'public'        => true,
      'menu_position' => 5,
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
      'has_archive'   => true,
      'rewrite' => array( 'slug' => 'security-jobs', 'with_front' => false ),
      'capability_type' => 'cisjob',
      'capabilities' => array(
        'publish_posts' => 'publish_cisjobs',
        'edit_posts' => 'edit_cisjobs',
        'edit_others_posts' => 'edit_others_cisjobs',
        'delete_posts' => 'delete_cisjobs',
        'delete_others_posts' => 'delete_others_cisjobs',
        'read_private_posts' => 'read_private_cisjobs',
        'edit_post' => 'edit_cisjob',
        'delete_post' => 'delete_cisjob',
        'read_post' => 'read_cisjob',
      ),
          );

    register_post_type( 'cisjob', $args ); 
  }
add_action( 'init', '_custom_post_job' );

#add custom interaction messages  
function my_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['product'] = array(
    0 => '', 
    1 => sprintf( __('Position upated. <a href="%s">View position</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Job updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Vacancy restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Position published. <a href="%s">View position</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Job saved.'),
    8 => sprintf( __('Job submitted. <a target="_blank" href="%s">Preview job</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Position scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview job</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Job draft updated. <a target="_blank" href="%s">Preview job</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages' );

#change the enter title here text

function change_default_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'cisjob' == $screen->post_type ) {
          $title = 'Enter Job Title Here';
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'change_default_title' );

#taxonomy or categories for the jobs
function my_taxonomies_job() {
  $labels = array(
    'name'              => _x( 'Job Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Job Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Job Categories' ),
    'all_items'         => __( 'All Job Categories' ),
    'parent_item'       => __( 'Parent Job Category' ),
    'parent_item_colon' => __( 'Parent Job Category:' ),
    'edit_item'         => __( 'Edit Job Category' ), 
    'update_item'       => __( 'Update Job Category' ),
    'add_new_item'      => __( 'Add New Job Category' ),
    'new_item_name'     => __( 'New Job Category' ),
    'menu_name'         => __( 'Job Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'job_category', 'cisjob', $args );
}
add_action( 'init', 'my_taxonomies_job', 0 );

#capabilities meta

add_filter( 'map_meta_cap', 'my_map_meta_cap', 10, 4 );

function my_map_meta_cap( $caps, $cap, $user_id, $args ) {

  /* If editing, deleting, or reading a movie, get the post and post type object. */
  if ( 'edit_cisjob' == $cap || 'delete_cisjob' == $cap || 'read_cisjob' == $cap ) {
    $post = get_post( $args[0] );
    $post_type = get_post_type_object( $post->post_type );

    /* Set an empty array for the caps. */
    $caps = array();
  }

  /* If editing a movie, assign the required capability. */
  if ( 'edit_cisjob' == $cap ) {
    if ( $user_id == $post->post_author )
      $caps[] = $post_type->cap->edit_posts;
    else
      $caps[] = $post_type->cap->edit_others_posts;
  }

  /* If deleting a movie, assign the required capability. */
  elseif ( 'delete_cisjob' == $cap ) {
    if ( $user_id == $post->post_author )
      $caps[] = $post_type->cap->delete_posts;
    else
      $caps[] = $post_type->cap->delete_others_posts;
  }

  /* If reading a private cisjob, assign the required capability. */
  elseif ( 'read_cisjob' == $cap ) {

    if ( 'private' != $post->post_status )
      $caps[] = 'read';
    elseif ( $user_id == $post->post_author )
      $caps[] = 'read';
    else
      $caps[] = $post_type->cap->read_private_posts;
  }

  /* Return the capabilities required by the user. */
  return $caps;
}

?>