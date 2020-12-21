<div class="mb-4">
	<div class="text-lg font-bold"><?php _e('Статистика записи'); ?></div>
	<div class="flex justify-between items-center">
		<div><?php _e('Рейтинг'); ?></div>
		<div><?php $post_rating = carbon_get_the_post_meta('crb_post_rating'); echo $post_rating; ?></div>
	</div>
	<div class="flex justify-between items-center">
		<div><?php _e('Кол-во оценок'); ?></div>
		<div><?php $post_rating_qty = carbon_get_the_post_meta('crb_post_rating_qty'); echo $post_rating_qty; ?></div>
		<input type="hidden" value="<?php echo $post_rating_qty; ?>" class="post-rating__count">
		<input type="hidden" value="<?php echo get_the_ID(); ?>" class="post_id">
	</div>
</div>
<div class="text-lg flex justify-between items-center mb-4">
	<div>
		<span><?php _e('Полезная статья', 'totop'); ?>? </span>	
	</div>
	<div>
		<span class="text-blue-800 cursor-pointer post-rating__qty"><?php _e('Да', 'totop'); ?></span>
		/
		<span class="text-red-300 cursor-pointer post-rating__qty"><?php _e('Нет', 'totop'); ?></span>	
	</div>
</div>