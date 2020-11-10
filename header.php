<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="apple-touch-icon" href="/example.png">
  <base href="<?php echo home_url(); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo home_url(); ?>">

  <?php
  // ENQUEUE your css and js in inc/enqueues.php

    wp_head();
	?>
</head>
<body <?php echo body_class(); ?>>
  <!-- <div class="preloader"></div> -->
  
  <header class="header bg-white py-5 shadow-sm px-4 lg:px-0">
    <div class="container mx-auto">
      <div class="header-content flex justify-between items-center">
        <div class="header-logo logo">
          <a href="<?php echo home_url(); ?>" class="flex items-end text-xl font-bold">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt="Логотип" width="28px" class="mr-2">
            <span class="leading-none">TimeToTop</span>
          </a>
        </div>
        <div class="header-menu__desktop menu hidden lg:block">
          <?php wp_nav_menu([
            'theme_location' => 'head_menu',
            'menu_id' => 'head_menu',
            'menu_class' => 'flex justify-between -mx-1'
          ]); ?>
        </div>
        <div class="header-menu__mobile menu block lg:hidden">
          <span class="menu-line"></span>
          <span class="menu-line"></span>
          <span class="menu-line"></span>
        </div>
      </div>
    </div>
    <div class="menu-cover bg-custom-gray px-6 py-10">
      <?php
        $menu_name = 'head_menu';
        $locations = get_nav_menu_locations();

        if( $locations && isset( $locations[ $menu_name ] ) ){
          $menu_items = wp_get_nav_menu_items( $locations[ $menu_name ] );

          $menu_list = '<ul id="menu-' . $menu_name . '" class="flex flex-col mb-10">';
          foreach ( (array) $menu_items as $key => $menu_item ){
            $menu_icon = carbon_get_nav_menu_item_meta( $menu_item->ID, 'crb_menu_icon' ); 
            $menu_list .= '<li class="flex items-center mb-3"><img src="' . $menu_icon . '" class="mr-2" width="25px"><a href="' . $menu_item->url . '" class="text-xl">' . $menu_item->title . '</a></li>';
          }
          $menu_list .= '</ul>';
        }
        else {
          $menu_list = '<ul><li>Меню "' . $menu_name . '" не определено.</li></ul>';
        }

        echo $menu_list;
      ?>
      <div class="flex items-center mb-4">
        <img src="<?php bloginfo('template_url'); ?>/img/icons/categories.svg" width="25px" class="mr-3">
        <div class="text-xl font-bold">
          <?php _e('Категории', 'totop'); ?>
        </div>
      </div>
      <ul>
        <?php 
        $categories = get_terms( [
          'taxonomy' => 'category',
          'parent' => 0,
          'hide_empty' => false,
        ] );

        foreach($categories as $cat): ?>
          <li class="mb-2">
            <a href="<?php echo get_category_link( $cat->term_id); ?>">
              # <?php echo $cat->name; ?>  
            </a>  
          </li>
        <?php endforeach; ?>  
      </ul>
    </div>
  </header>
  <section id="content" role="main">