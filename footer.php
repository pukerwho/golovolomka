	<footer id="footer" class="footer text-white py-10">
  	<div class="container mx-auto px-2 lg:px-0">
  		<div class="flex flex-col lg:flex-row">

  			<div class="w-full lg:w-2/5 px-2 mb-4 lg:mb-0">
    			<div class="text-xl text-custom-green font-bold mb-2">TimeToTop</div>
    			<div class="mb-4"><?php _e('Разбираемся в сайтах. Делаем жизнь вебмастера проще.', 'totop'); ?></div>
  				<div class="footer-social social mb-4">
  					<ul class="flex items-center">
  						<li><a href="https://www.facebook.com/time2top/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/icons/facebook.svg" width="22" alt="Facebook"></a></li>
  						<li class="px-4"><a href="https://www.instagram.com/time2top/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/icons/instagram.svg" width="22" alt="instagram"></a></li>
  						<li><a href="https://www.youtube.com/channel/UCLFjGPaobP5RrvweG-p_lpA" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/icons/youtube.svg" width="25" alt="Youtube"></a></li>
  					</ul>
  				</div>
  				<div>
  					<?php _e('Сделано с любовью и на ', 'restx'); ?> <a href="https://wordpress.org/" target="_blank" class="font-bold text-custom-yellow underline">Wordpress</a>
  				</div>
    		</div>

    		<div class="w-full lg:w-1/5 px-2 mb-4 lg:mb-0">
    			<?php wp_nav_menu([
            'theme_location' => 'head_menu',
            'menu_id' => 'head_menu',
            'menu_class' => 'flex flex-col'
          ]); ?>
    		</div>

    		<div class="w-full lg:w-1/5 px-2 mb-4 lg:mb-0">
    			<ul class="flex flex-col">
	    			<?php $categories = get_terms( array( 
							'taxonomy' => 'category', 
							'parent' => 0, 
							'hide_empty' => false,
						));
						foreach ( array_slice($categories, 0, 5) as $category ): ?>
							<li>
								<a href="<?php echo get_term_link($category); ?>">
									<?php echo $category->name ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
    		</div>

    		<div class="w-full lg:w-1/5 px-2 mb-4 lg:mb-0">
    			<div>
    				<ul>
    					<li><a href="/contacts/" class="font-bold text-custom-yellow"><?php _e('Написать нам', 'totop'); ?></a></li>
    				</ul>
    			</div>
    		</div>
  		</div>
  	</div>
  </footer>
  <?php if(is_single()): ?>
    <div class="rating-success-message">
      <div class="inline-block shadow-lg text-custom-yellow rounded-md text-lg py-4 px-10"><?php _e('Спасибо за вашу оценку!', 'totop'); ?></div>
    </div>    
    <?php 
      if ( is_singular( 'post' ) ) {
        get_template_part('blocks/footer/bottom-info', 'totop'); 
      }
    ?>
  <?php endif; ?>
  <div class="bg-modal"></div>
  <?php wp_footer(); ?>
</body>
</html>