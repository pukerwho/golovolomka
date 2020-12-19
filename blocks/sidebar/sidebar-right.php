<div>
	<?php get_template_part('blocks/posts/post-statistics'); ?>
	<div class="mb-6">
		<div class="text-lg font-bold mb-2"><?php _e('Поделиться', 'totop'); ?></div>
		<?php do_action('show_social_share_buttons'); ?>	
	</div>
	<?php get_template_part('blocks/sidebar/sidebar-telegram'); ?>
</div>