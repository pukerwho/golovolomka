<div class="sidebar sidebar-left">
	<div>
		<div class="flex items-center mb-4">
			<img src="<?php bloginfo('template_url'); ?>/img/icons/categories.svg" width="25px" class="mr-3">
			<div class="text-xl">
				<?php _e('Категории', 'totop'); ?>
			</div>
		</div>
		<ul>
			<?php 
      $categories = get_terms( [
        'taxonomy' => 'category',
        'parent' => 0,
      ] );

      foreach($categories as $cat): ?>
	    	<li class="mb-2">
		    	<a href="<?php echo get_category_link( $cat->term_id); ?>">
		    		# <?php echo $cat->name; ?>	
		    	</a>	
	    	</li>
			<?php endforeach; ?>	
		</ul>
	</div>
</div>