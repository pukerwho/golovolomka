<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="yandex-verification" content="ae769d5c6d6ad071" />

  <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/img/logo.svg">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;500;700&display=swap" crossorigin>

  <?php
    wp_head();
  ?>
  

</head>
<body <?php echo body_class(); ?>>
  
  <header class="header text-white py-5 px-4 lg:px-0">
    <div class="container mx-auto">
      <div class="header-content flex justify-between items-center">
        <div class="header-logo logo">
          <a href="<?php echo home_url(); ?>" class="flex items-end text-xl font-bold">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt="Логотип" width="28" class="mr-2">
            <span class="leading-none">TimeToTop</span>
          </a>
        </div>
        <div class="header-menu__desktop menu hidden lg:block">
          <?php wp_nav_menu([
            'theme_location' => 'head_menu',
            'menu_id' => 'head_menu_pc',
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

    <!-- Мобильное меню -->
    <div class="menu-cover text-black">
      <div class="flex items-center justify-between p-3 pb-0">
        <div>
          <a href="<?php echo home_url(); ?>" class="flex items-end text-xl font-bold">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt="Логотип" width="28" class="mr-2">
            <span class="leading-none text-white">TimeToTop</span>
          </a>
        </div>
        <div class="header-menu__mobile--close">
          <span class="menu-line"></span>
          <span class="menu-line"></span>
        </div>
      </div>

      <!-- Основное меню -->
      <div class="px-3 mt-3 mb-3">
        <?php
          $menu_name = 'head_menu';
          $locations = get_nav_menu_locations();

          if( $locations && isset( $locations[ $menu_name ] ) ){
            $menu_items = wp_get_nav_menu_items( $locations[ $menu_name ] );

            $menu_list = '<ul id="menu-' . $menu_name . '" class="flex flex-col bg-custom-gray rounded-md p-3">';
            foreach ( (array) $menu_items as $key => $menu_item ){
              $menu_icon = carbon_get_nav_menu_item_meta( $menu_item->ID, 'crb_menu_icon' ); 
              $menu_list .= '<li class="flex items-center mb-3"><img src="' . $menu_icon . '" class="mr-2" width="25" alt="Icon"><a href="' . $menu_item->url . '" class="text-black text-lg">' . $menu_item->title . '</a></li>';
            }
            $menu_list .= '</ul>';
          }
          else {
            $menu_list = '<ul><li>Меню "' . $menu_name . '" не определено.</li></ul>';
          }

          echo $menu_list;
        ?>
      </div>

      <!-- Категории -->
      <div class="px-3 mb-3">
        <div class="bg-custom-gray rounded-md p-3">
          <div class="flex items-center mb-4">
            <img src="<?php bloginfo('template_url'); ?>/img/icons/categories.svg" width="25" class="mr-3" alt="Icon">
            <div class="text-xl text-black font-bold">
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
                <a href="<?php echo get_category_link( $cat->term_id); ?>" class="flex">
                  <div class="flex items-center justify-center rounded-md mr-3" style="width: 42px; height: 42px; background-color: <?php echo carbon_get_term_meta($cat->term_id, 'crb_category_color'); ?>">
                    <?php if (carbon_get_term_meta($cat->term_id, 'crb_category_icon')): ?>
                    <img src="<?php echo carbon_get_term_meta($cat->term_id, 'crb_category_icon'); ?>" width="25" alt="<?php echo $cat->name; ?>">
                  <?php else: ?>
                    <img src="<?php bloginfo('template_url'); ?>/img/icons/file.svg" width="25" alt="<?php echo $cat->name; ?>">
                  <?php endif; ?>
                  </div>
                  <div>
                    <div class="text-black font-bold"><?php echo $cat->name; ?></div>
                    <div class="text-sm text-gray-600">Записей: <?php echo $cat->count; ?></div>
                  </div>
                </a>  
              </li>
            <?php endforeach; ?>  
          </ul>
        </div>
      </div>

      <!-- Телеграм -->
      <div class="px-3 mb-3">
        <?php get_template_part('blocks/sidebar/sidebar-telegram'); ?>  
      </div>

      <!-- Хештеги -->
      <div class="px-3 mb-3">
        <div class="bg-custom-gray rounded-md p-3">
          <div class="flex items-center mb-4">
            <img src="<?php bloginfo('template_url'); ?>/img/icons/lists.svg" width="25" class="mr-3" alt="Icon">
            <div class="text-xl font-bold">
              <?php _e('Хештеги', 'totop'); ?>
            </div>
          </div>
          <ul class="mb-10">
            <?php 
            $tags = get_terms( [
              'taxonomy' => 'hashtags',
              'parent' => 0,
              'hide_empty' => false,
            ] );

            foreach($tags as $tag): ?>
              <li class="mb-2">
                <a href="<?php echo get_tag_link( $tag->term_id ); ?>" class="flex">
                  <div class="flex items-center justify-center rounded-md mr-3" style="width: 42px; height: 42px; background-color: <?php echo carbon_get_term_meta($tag->term_id, 'crb_category_color'); ?>">
                    <?php if (carbon_get_term_meta($tag->term_id, 'crb_category_icon')): ?>
                    <img src="<?php echo carbon_get_term_meta($tag->term_id, 'crb_category_icon'); ?>" width="25" alt="<?php echo $tag->name; ?>">
                  <?php else: ?>
                    <img src="<?php bloginfo('template_url'); ?>/img/icons/file.svg" width="25" alt="<?php echo $tag->name; ?>">
                  <?php endif; ?>
                  </div>
                  <div>
                    <div class="font-bold"><?php echo $tag->name; ?></div>
                    <div class="text-sm text-gray-600">Записей: <?php echo $tag->count; ?></div>
                  </div>
                </a>  
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </header>