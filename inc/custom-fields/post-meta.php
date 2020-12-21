<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'Cодержание' )
  	->where( 'post_type', '=', 'post' )
    ->add_fields( array(
		  Field::make( 'complex', 'crb_post_content', 'Разделы' )
        ->add_fields( array(
          Field::make( 'text', 'crb_post_content_title', 'Заголовок' ),
          Field::make( 'text', 'crb_post_content_link', 'Ссылка (без #)' ),
        ) 
      ),
  ) );
  Container::make( 'post_meta', 'Rating' )
    ->where( 'post_type', 'IN', array('page', 'post') )
    ->add_fields( array(
      Field::make( 'text', 'crb_post_rating', 'Рейтинг' )->set_attribute( 'type', 'number' )->set_default_value( 5 ),
      Field::make( 'text', 'crb_post_rating_qty', 'Счетчик рейтинга' )->set_attribute( 'type', 'number' )->set_default_value( 11 ),
  ) );
  // Container::make( 'post_meta', 'SEO' )
  // 	->where( 'post_type', 'IN', array('page', 'post') )
  //   ->add_fields( array(
		//   Field::make( 'text', 'crb_post_seo_title', 'Title' ),
  //     Field::make( 'textarea', 'crb_post_seo_description', 'Description' ),
  //     Field::make( 'textarea', 'crb_post_seo_keywords', 'Keywords' ),
  // ) );

}

?>