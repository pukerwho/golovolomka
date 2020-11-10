    </section>
    <footer id="footer" class="footer py-20">
    	<div class="container mx-auto px-2 lg:px-0">
    		<div class="flex flex-col lg:flex-row">

    			<div class="w-full lg:w-2/5 px-2 mb-4 lg:mb-0">
	    			<div class="text-xl font-bold mb-2">TimeToTop</div>
	    			<div class="mb-4"><?php _e('Разбираемся в сайтах. Делаем жизнь вебмастера проще. Любим печеньки.', 'totop'); ?></div>
    				<div class="footer-social social mb-4">
    					<ul class="flex items-center">
    						<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/icons/facebook.svg" width="22px"></a></li>
    						<li class="px-4"><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/icons/instagram.svg" width="22px"></a></li>
    						<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/icons/youtube.svg" width="25px"></a></li>
    					</ul>
    				</div>
    				<div>
    					<?php _e('Сделано с любовью и на ', 'restx'); ?> <a href="https://wordpress.org/" class="font-bold underline">Wordpress</a>
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
	    					<li><a href="/contacts" class="font-bold"><?php _e('Написать нам', 'totop'); ?></a></li>
	    				</ul>
	    			</div>
	    		</div>
    		</div>
    	</div>
    </footer>
    <div class="bg-modal"></div>
    <?php wp_footer(); ?>
</body>
</html>