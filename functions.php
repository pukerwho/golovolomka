<?php
// Include your functions files here
include('inc/enqueues.php');
// Add your theme support ( cf :  http://codex.wordpress.org/Function_Reference/add_theme_support )
function customThemeSupport() {
    global $wp_version;
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    // let wordpress manage the title
    add_theme_support( 'title-tag' );
    add_theme_support( 'caption' );
    add_theme_support( 'gallery' );
    add_theme_support( 'html5', array(  'script', 'style' ) );
    //add_theme_support( 'custom-background', $args );
    //add_theme_support( 'custom-header', $args );
    // Automatic feed links compatibility
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );
// Content width
if( !isset( $content_width ) ) {
    // @TODO : edit the value for your own specifications
    $content_width = 960;
}

require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
require_once get_template_directory() . '/inc/custom-fields/pages-meta.php';
require_once get_template_directory() . '/inc/custom-fields/user-meta.php';
require_once get_template_directory() . '/inc/custom-fields/category-meta.php';
require_once get_template_directory() . '/inc/custom-fields/menu-meta.php';
require_once get_template_directory() . '/inc/shortcodes.php';
require_once get_template_directory() . '/inc/social-share.php';
require_once get_template_directory() . '/inc/rating.php';
require_once get_template_directory() . '/inc/TGM/example.php';

register_nav_menus( array(
    'head_menu' => 'Меню в шапке',
) );

// подключаем файлы со стилями
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
    wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/css/style.css', false, time() );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui-core' );
    wp_register_script( 'scripts', get_template_directory_uri() . '/js/all.js', '','',true);
    wp_localize_script( 'scripts', 'rating_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
      'postId' => get_queried_object_id(),
      'postRatingCount' => carbon_get_the_post_meta('crb_post_rating_qty'),
    ) );
    wp_enqueue_script( 'scripts' );
};

// подключаем стили к админке
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
  wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action ('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
remove_action('wp_print_styles', 'print_emoji_styles');
// remove_filter('the_content', 'wptexturize');

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

function my_custom_upload_mimes($mimes = array()) {
  $mimes['svg'] = "image/svg+xml";
  return $mimes;
}

add_action('upload_mimes', 'my_custom_upload_mimes');

function my_login_logo() { ?>
  <style type="text/css">
    #login h1 a, .login h1 a {
      background-image: none;
      display: inline;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function wpb_login_logo_url_title() {
  return 'TimeToTop';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );

function get_page_url($template_name) {
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name.'.php',
        'compare' => '='
      ]
    ]
  ]);
  if(!empty($pages))
  {
    foreach($pages as $pages__value)
    {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}

function create_post_type() {
  register_post_type( 'services',
    array(
      'labels' => array(
        'name' => 'Услуги',
        'singular_name' => 'Услуга'
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
}

add_action( 'init', 'create_post_type' );


//Alert для комментов
add_action( 'set_comment_cookies', function( $comment, $user ) {
  setcookie( 'ta_comment_wait_approval', '1', 0, '/' );
}, 10, 2 );

add_action( 'init', function() {
  if( isset( $_COOKIE['ta_comment_wait_approval'] ) && $_COOKIE['ta_comment_wait_approval'] === '1' ) {
    setcookie( 'ta_comment_wait_approval', '0', 0, '/' );
    echo "<script type='text/javascript'>
    document.addEventListener('DOMContentLoaded', function(event) {
      function insertAfter(referenceNode, newNode) {
        console.log(referenceNode);
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
      }

      var commentAlert = document.createElement('p');
      commentAlert.setAttribute('id', 'wait_approval');
      commentAlert.innerHTML = 'Ваш комментарий ожидает одобрения';

      var respondDiv = document.querySelector('#respond');
      console.log(respondDiv);
      insertAfter(respondDiv, commentAlert);
    });
    </script>";
    // add_action( 'comment_form_after', function() {
    //   echo "<p id='wait_approval' style=''><strong>" . _e('Ваш комментарий ожидает одобрения', 'restx') . "</strong></p>";
    // });
  }
});

add_filter( 'comment_post_redirect', function( $location, $comment ) {
  if ( get_post_type( $comment->comment_post_ID ) == 'post_comment' ) {
    // $current_url = home_url( add_query_arg( array(), $wp->request ) );
    $city_terms = get_the_terms($comment->comment_post_ID, 'citylist');
    foreach ($city_terms as $city_term) {
      $current_term_url = get_term_link($city_term->term_id, 'citylist'); 
    }
    $location = $current_term_url . '#wait_approval';  
    return $location;
  } else {
    $location = get_permalink( $comment->comment_post_ID ) . '#wait_approval';  
    return $location;
  }
}, 10, 2 );