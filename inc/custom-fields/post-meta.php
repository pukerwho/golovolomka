<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'projects' )
    ->add_fields( array(
		  Field::make( 'media_gallery', 'crb_project_plans', 'Планы' )->set_type( array( 'image' ) ),
		  Field::make( 'media_gallery', 'crb_project_photos', 'Фотоальбом' )->set_type( array( 'image' ) ),
		  Field::make( 'text', 'crb_project_common', 'Общая площадь' ),
		  Field::make( 'text', 'crb_project_square', 'Площадь застройки' ),
		  Field::make( 'text', 'crb_project_gabarit', 'Габариты' ),
		  Field::make( 'text', 'crb_project_height', 'Высота' ),
		  Field::make( 'text', 'crb_project_video_id', 'ID видео Youtube' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'services' )
    ->add_fields( array(
		  Field::make( 'media_gallery', 'crb_services_album', 'Альбом' )->set_type( array( 'image' ) ),
		  Field::make( 'rich_text', 'crb_services_sostav', 'Состав' ),
		  Field::make( 'text', 'crb_services_youtube', 'ID YouTube Видео' ),
  ) );
}

?>