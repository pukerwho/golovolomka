<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_categories_options' );
function crb_categories_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
    ->where( 'term_taxonomy', '=', 'category' )
    ->add_fields( array(
    	Field::make( 'image', 'crb_category_icon', 'Иконка' )->set_value_type( 'url'),
      Field::make( 'textarea', 'crb_category_description', 'Описание' ),
      Field::make( 'color', 'crb_category_color', 'Цвет' )->set_default_value( '#484848' ),
  ) );
}

?>