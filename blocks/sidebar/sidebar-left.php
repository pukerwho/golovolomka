<div class="sidebar sidebar-left sticky" style="top: 1rem;">
	<div>
		<div class="flex items-center mb-4">
			<img src="<?php bloginfo('template_url'); ?>/img/icons/categories.svg" width="25" class="mr-3" alt="Icon">
			<div class="text-xl">
				<?php _e('Категории', 'totop'); ?>
			</div>
		</div>
		<ul class="mb-10">
			<?php 
      $categories = get_terms( [
        'taxonomy' => 'category',
        'parent' => 0,
        'hide_empty' => false,
      ] );

      foreach($categories as $cat): ?>
	    	<li class="mb-2">
		    	<a href="<?php echo get_category_link( $cat->term_id); ?>">
		    		<?php echo $cat->name; ?>	
		    	</a>	
	    	</li>
			<?php endforeach; ?>	
		</ul>
	</div>
</div>