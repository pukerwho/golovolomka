<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_page_theme_options' );
function crb_page_theme_options() {
  Container::make( 'post_meta', 'MORE' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_main.php' )
    ->add_fields( array(
      Field::make( 'radio', 'crb_slider_type', 'Тип слайдера' )->set_options( array(
        'title_and_subtitle' => 'Отображать Заголовок и Подзаголовок',
        'only_button' => 'Показывать только кнопку Связаться с нами',
      )),
    	Field::make( 'complex', 'crb_main_sliders', 'Главный слайдер' )
          ->add_fields( array(
            Field::make( 'image', 'crb_main_slider_img', 'Картинка' )->set_value_type( 'url'),
            Field::make( 'text', 'crb_main_slider_title', 'Заголовок' ),
            Field::make( 'text', 'crb_main_slider_subtitle', 'Подзаголовок' ),
          ) 
        ),
      Field::make( 'html', 'crb_main_count' )->set_html( '<div style="font-size:21px; padding:15px 12px;">Счетчик на главной странице:</div>' ),
      Field::make( 'image', 'crb_main_count_bg', 'Фоновая картинка' )->set_value_type( 'url'),
      Field::make( 'text', 'crb_main_count_first_number', 'Первый столбец цифра' ),
      Field::make( 'text', 'crb_main_count_first_title', 'Первый столбец цифра' ),
      Field::make( 'text', 'crb_main_count_second_number', 'Второй столбец цифра' ),
      Field::make( 'text', 'crb_main_count_second_title', 'Второй столбец цифра' ),
      Field::make( 'text', 'crb_main_count_third_number', 'Третий столбец цифра' ),
      Field::make( 'text', 'crb_main_count_third_title', 'Третий столбец цифра' ),
      Field::make( 'text', 'crb_main_count_fourth_number', 'Четвертый столбец цифра' ),
      Field::make( 'text', 'crb_main_count_fourth_title', 'Четвертый столбец цифра' ),
      Field::make( 'html', 'crb_main_video' )->set_html( '<div style="font-size:21px; padding:15px 12px;">ВИДЕО НА ГЛАВНОЙ СТРАНИЦЕ:</div>' ),
      Field::make( 'text', 'crb_main_video_id', 'ID видео Youtube' ),
    ) );
  Container::make( 'post_meta', 'MORE' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_about.php' )
    ->add_fields( array(
      Field::make( 'complex', 'crb_about_blocks', 'Блоки' )
          ->add_fields( array(
            Field::make( 'image', 'crb_about_block_photo', 'Картинка' )->set_value_type( 'url'),
            Field::make( 'rich_text', 'crb_about_block_text', 'Текст' ),
          ) 
        ),
    ) );
  Container::make( 'post_meta', 'MORE' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_portfolio.php' )
    ->add_fields( array(
      Field::make( 'media_gallery', 'crb_portfolio_architect', 'Альбом Архитектура' )->set_type( array( 'image' ) ),
      Field::make( 'media_gallery', 'crb_portfolio_design', 'Альбом Дизайн' )->set_type( array( 'image' ) ),
      Field::make( 'media_gallery', 'crb_portfolio_object', 'Альбом Мы на объекте' )->set_type( array( 'image' ) ),
    ) );
}

?>