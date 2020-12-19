<div class="bottom-info w-3/4">
	<div class="container mx-auto">
		<div class="bottom-info--wrap bg-custom-black rounded-md shadow-xl cursor-pointer py-3">
			<div class="flex items-center justify-center text-center text-lg text-custom-yellow">
				<span class="mr-3"><?php _e('Содержание', 'totop'); ?></span>
				<span><svg enable-background="new 0 0 512 512" height="15" viewBox="0 0 512 512" width="15" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="m464.883 64.267h-417.766c-25.98 0-47.117 21.136-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.013-21.137-47.149-47.117-47.149z"/><path fill="#fff" d="m464.883 208.867h-417.766c-25.98 0-47.117 21.136-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.013-21.137-47.149-47.117-47.149z"/><path fill="#fff" d="m464.883 353.467h-417.766c-25.98 0-47.117 21.137-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.012-21.137-47.149-47.117-47.149z"/></svg></span>
			</div>
		</div>
	</div>
</div>

<div class="post-navigation--mobile rounded-md">
	<div class="py-8 px-4">
		<div class="post-navigation__title text-lg font-bold mb-2">
			<?php _e('Содержание', 'totop'); ?>:
		</div>
		<ul>
			<?php $post_contents = carbon_get_the_post_meta('crb_post_content');
			foreach( $post_contents as $key => $post_content ): ?>
				<?php $key = $key + 1; ?>
				<li class="mb-1">
					<a href="#<?php echo $post_content['crb_post_content_link']; ?>"><?php echo $key; ?>. <?php echo $post_content['crb_post_content_title']; ?></a>
				</li>
			<?php endforeach; ?>
		</ul>	
	</div>
	<div class="post-navigation--mobile_close text-center text-gray-900 border-top border-solid border-2 cursor-pointer py-4">
		<?php _e('Закрыть', 'totop'); ?>
	</div>
</div>