<div class="post-item bg-white shadow-md rounded-md mb-4">
	<!-- IMG -->
	<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" class="post-item__img w-full mb-2" loading="lazy">
	
	<div class="p-3 pr-6">
		<!-- AUTHOR -->
		<div class="post-author flex items-center mb-2">
			<?php 
				$avatar = get_avatar(get_the_author_meta('ID'));
			?>
			<div class="post-author__avatar mr-2">
				<?php if ($avatar): ?>
			    <?php echo $avatar; ?>
			  <?php else: ?>
			    <img src="<?php bloginfo('template_part'); ?>/img/user.svg" alt="<?php echo get_the_author(); ?>">
			  <?php endif; ?>
			</div>	
			<div class="post-author__info">
				<div class="post-author__name">
					<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="color-link"><?php echo get_the_author(); ?></a>
				</div>
				<div class="post-item__date text-sm">
					<?php echo get_the_date('j/n/Y') ?>
				</div>
			</div>
		</div>
		
	  <!-- TITLE -->
	  <div class="post-item__content">
			<div class="post-item__title text-xl lg:text-2xl mb-5">
				<a href="<?php the_permalink(); ?>" class="hover:text-blue-900"><?php the_title(); ?>	</a>
			</div>

			<!-- COMMENTS -->
			<div class="post-item__comments flex items-center text-sm">
				<img src="<?php bloginfo('template_url'); ?>/img/icons/comments.svg" class="mr-2" alt="Комментарии">
				<span class="mr-2"><?php _e('Комментариев','totop'); ?>:</span>
				<span><?php echo get_comments_number(); ?></span>
			</div>
		</div>
	</div>
</div>