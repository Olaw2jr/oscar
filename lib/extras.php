<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return '</p><p><a href="' . get_permalink() . '" class="btn btn-primary">' . __('Read more', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
  * Display meta information for a specific post.
  */
function sage_post_meta() {
  echo '<ul class="post-meta small">';

  if ( get_post_type() === 'post' ) {
    // If the post is sticky, mark it.
    if ( is_sticky() ) {
      echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'sage' ) . ' </li>';
    }

    // The categories. 
    $category_list = get_the_category_list( ', ' );
    if ( $category_list ) {
      echo '<li><i class="fa fa-folder-open-o"></i> ' . $category_list . ' </li>';
    }

    // Comments link.
    if ( comments_open() ) :
      echo '<li><i class="fa fa-comments-o"></i>';
      comments_popup_link( __( 'Leave a comment', 'sage' ), __( 'One comment', 'sage' ), __( '% comments', 'sage' ) );
      echo '</li>';
    endif;

    //getPostLikeLink();
    echo '<li><i class="fa fa-heart-o"></i><a href="#">84 Likes</a></li>';

    // Edit link.
    if ( is_user_logged_in() ) {
      echo '<li class="">';
      edit_post_link( __( 'Edit', 'sage' ), '<span class="meta-edit">', '</span>' );
      echo '</li></ul>';
    }
  }
}

/**
  * Display navigation to the next/previous set of posts.
  */

function sage_paging_nav($before = '', $after = '') {
  global $wpdb, $wp_query;
  $request = $wp_query->request;
  $posts_per_page = intval(get_query_var('posts_per_page'));
  $paged = intval(get_query_var('paged'));
  $numposts = $wp_query->found_posts;
  $max_page = $wp_query->max_num_pages;
  if ( $numposts <= $posts_per_page ) { return; }
  if(empty($paged) || $paged == 0) {
    $paged = 1;
  }
  $pages_to_show = 7;
  $pages_to_show_minus_1 = $pages_to_show-1;
  $half_page_start = floor($pages_to_show_minus_1/2);
  $half_page_end = ceil($pages_to_show_minus_1/2);
  $start_page = $paged - $half_page_start;
  if($start_page <= 0) {
    $start_page = 1;
  }
  $end_page = $paged + $half_page_end;
  if(($end_page - $start_page) != $pages_to_show_minus_1) {
    $end_page = $start_page + $pages_to_show_minus_1;
  }
  if($end_page > $max_page) {
    $start_page = $max_page - $pages_to_show_minus_1;
    $end_page = $max_page;
  }
  if($start_page <= 0) {
    $start_page = 1;
  }
    
  echo $before.'<ul class="pagination">'."";
  if ($paged > 1) {
    $first_page_text = "&laquo";
    echo '<li class="prev"><a href="'.get_pagenum_link().'" title="First">'.$first_page_text.'</a></li>';
  }
    
  $prevposts = get_previous_posts_link('Prev');
  if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }
  else { echo '<li class="disabled"><a href="#">Prev</a></li>'; }
  
  for($i = $start_page; $i  <= $end_page; $i++) {
    if($i == $paged) {
      echo '<li class="active"><a href="#">'.$i.'</a></li>';
    } else {
      echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
    }
  }
  echo '<li class="">';
  next_posts_link('Next');
  echo '</li>';
  if ($end_page < $max_page) {
    $last_page_text = "&raquo;";
    echo '<li class="next"><a href="'.get_pagenum_link($max_page).'" title="Last">'.$last_page_text.'</a></li>';
  }
  echo '</ul>'.$after."";
}

/**
  * Adds Comment layout
  */
function sage_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
      <div class="avatar">
          <a href="#"><?=get_avatar( $comment, $size='75' ); ?></a>
      </div><!-- /.avatar -->
      
      <div class="commentbody">
          
          <div class="author">
            <?php printf('<h4>%s</h4>', get_comment_author_link()) ?>
            <div class="meta">
              <span class="date"><?=human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
            </div><!-- /.meta -->
          </div><!-- /.author -->
          
          <div class="message">
            <?php if ($comment->comment_approved == '0') : ?>
              <div class="alert-message success">
                <p><?php _e('Your comment is awaiting moderation.','sage') ?></p>
              </div>
            <?php endif; ?>
            
            <?php comment_text() ?>
            
            <ul class="post-meta small">
              <li class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></li>
              <li><?php edit_comment_link(__('Edit','sage'),'<i class="fa fa-pencil-square-o"></i>') ?></li>
              <li class="upvote"><a href="#">24 <i class="fa fa-thumbs-o-up"></i></a></li>
            </ul><!-- /.meta -->
          </div><!-- /.message -->
          
      </div><!-- /.commentbody -->
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><i class="fa fa-share-alt"></i>&nbsp;<?php comment_author_link(); ?></li>
<?php 
}

/**
  * Creating a New Post Type
  */
add_action('init', __NAMESPACE__ . '\\portfolio_register');  
   
function portfolio_register() {  
    $args = array(  
      'label' => __('Portfolio', 'wedesign'),  
      'singular_label' => __('Project', 'wedesign'),  
      'public' => true,  
      'show_ui' => true,  
      'capability_type' => 'post',  
      'hierarchical' => false,  
      'rewrite' => true,  
      'supports' => array('title', 'editor', 'thumbnail')  
    );   
    register_post_type( 'portfolio' , $args );  
}

/**
  * Adding a Custom Taxonomy
  */
register_taxonomy("project-type", 
  array("portfolio"), 
  array(
    "hierarchical" => true, 
    "label" => "Project Types", 
    "singular_label" => "Project Type", 
    "rewrite" => true
  )
);

// Add the Meta Box
function add_custom_meta_box() {
  add_meta_box(
    'custom_meta_box', // $id
    'Portfolio Extra Details', // $title 
     __NAMESPACE__ . '\\show_custom_meta_box', // $callback
    'portfolio', // $page
    'normal', // $context
    'high' // $priority
    );
}
add_action('add_meta_boxes', __NAMESPACE__ . '\\add_custom_meta_box');  
   
// Field Array
$prefix = 'sage_';
$custom_meta_fields = array(
  array(
      'label'=> 'Client Name',
      'desc'  => 'Fill in the Name of the client whos work is done.',
      'id'    => $prefix.'client',
      'type'  => 'text'
  ),
  array(
      'label'=> 'Client Link',
      'desc'  => 'Fill in the link to the clients work if any.',
      'id'    => $prefix.'link',
      'type'  => 'text'
  )
);

// The Callback
function show_custom_meta_box() {
global $custom_meta_fields, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
     
    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
          <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
          <td>';
          switch($field['type']) {
           // case items will go here
            // text
            case 'text':
                echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
                    <br /><span class="description">'.$field['desc'].'</span>';
            break;
            // text
            case 'text':
                echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
                    <br /><span class="description">'.$field['desc'].'</span>';
            break;
          } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_custom_meta($post_id) {
    global $custom_meta_fields;
  
    // verify nonce
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) 
      return $post_id;

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
      return $post_id;

    // check permissions
    if ('page' == $_POST['post_type']) {
      if (!current_user_can('edit_page', $post_id))
          return $post_id;
      } elseif (!current_user_can('edit_post', $post_id)) {
      return $post_id;
    }
     
    // loop through fields and save the data
    foreach ($custom_meta_fields as $field) {
      $old = get_post_meta($post_id, $field['id'], true);
      $new = $_POST[$field['id']];
      if ($new && $new != $old) {
          update_post_meta($post_id, $field['id'], $new);
      } elseif ('' == $new && $old) {
          delete_post_meta($post_id, $field['id'], $old);
      }
    } // end foreach
}
add_action('save_post', __NAMESPACE__ . '\\save_custom_meta');

