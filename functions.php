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
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/all.js', '','',true);
};

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


add_action('init', 'create_taxonomy');
function create_taxonomy(){
  register_taxonomy('hashtags', array('post'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Хештеги',
      'singular_name'     => 'Хештег',
      'search_items'      => 'Поиск хештега',
      'all_items'         => 'Все хештеги',
      'view_item '        => 'Посмотреть хештег',
      'parent_item'       => 'Родительский хештег',
      'parent_item_colon' => 'Родительский хештег:',
      'edit_item'         => 'Редактировать хештег',
      'update_item'       => 'Одновить хештег',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Новый',
      'menu_name'         => 'Хештеги',
    ),
    'description'           => 'Хештеги, чтобы не использовать метки', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_in_menu'          => true, // равен аргументу show_ui
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => true, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => true,
    'update_count_callback' => '',
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );

}

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


// CОЗДАЕМ КНОПКИ ДЛЯ СОЦ СЕТЕЙ
function crunchify_social_sharing_buttons($content) {
  global $post;
  if(is_singular() || is_home()){
  
    // Get current page URL 
    $crunchifyURL = urlencode(get_permalink());
 
    // Get current page title
    $crunchifyTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
    // $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
    
    // Get Post Thumbnail for pinterest
    $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
    $googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
    $bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
 
    // Based on popular demand added Pinterest too
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
    // Add sharing button at the end of page/page content
    
    $content .= '<div class="sidebar-social flex flex-col">';
    $content .= '<li class="share-item"><a class="share-link share-facebook" href="'.$facebookURL.'" target="_blank"><img src="'. get_template_directory_uri() .'/img/icons/facebook-share.svg" class="share-icon"></a></li>';

    $content .= '<li class="share-item"><a class="share-link share-twitter" href="'.$twitterURL.'" target="_blank"><img src="'. get_template_directory_uri() .'/img/icons/twitter-share.svg" class="share-icon"></a></li>';
    
    $content .= '<li class="share-item"><a class="share-link share-telegram" href="'.$telegramURL.'" target="_blank"><img src="'. get_template_directory_uri() .'/img/icons/telegram-share.svg" class="share-icon"></a></li>';
    
    $content .= '<li class="share-item"><a class="share-link share-viber" href="'.$viberURL.'" target="_blank"><img src="'. get_template_directory_uri() .'/img/icons/viber-share.svg" class="share-icon"></a></li>';
    $content .= '</div>';
    echo $content;
  }else{
    // if not a post/page then don't include sharing button
    echo '';
  }
};

add_action( 'show_social_share_buttons', 'crunchify_social_sharing_buttons' );

?>