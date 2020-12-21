<?php 

function rating_post(){

	global $wpdb;
  
  $post_id = stripslashes_deep($_POST['postId']);
  $post_rating_count = stripslashes_deep($_POST['postRatingCount']);
  $post_rating_count = $post_rating_count + 1;

	$wpdb->update(
		'wp_postmeta', 
		array(
			'meta_value' => $post_rating_count,
		),
		array(
			'post_id' => $post_id,
			'meta_key' => '_crb_post_rating_qty',
		),
		array( '%s' ),
		array( // формат для &laquo;где&raquo;
			'%d',
			'%s'
		)
	);
}

add_action('wp_ajax_rating_post_back', 'rating_post');
add_action('wp_ajax_nopriv_rating_post_back', 'rating_post');

?>