<?php get_header(); ?>

<div class="category">
	<div class="category-color w-full h-32" style="background: <?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_category_color'); ?>"></div>
	<div class="container mx-auto px-2 lg:px-0">
		<div class="w-full lg:w-9/12 category-hero bg-white shadow-md rounded-md px-4 lg:px-10 py-8 -mt-16 mb-10 mx-auto">
			<div>
				<?php if (carbon_get_term_meta(get_queried_object_id(), 'crb_category_icon')): ?>
					<img src="<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_category_icon'); ?>" width="100" class="category-hero__icon" style="border: 8px solid <?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_category_color'); ?>" alt="<?php single_cat_title(); ?>">
				<?php else: ?>
					<img src="<?php bloginfo('template_url'); ?>/img/icons/file.svg" width="100" class="category-hero__icon" style="border: 8px solid <?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_category_color'); ?>" alt="<?php single_cat_title(); ?>">
				<?php endif; ?>
			</div>
			<div class="text-3xl text-left lg:text-center font-bold mt-10 mb-5">
				<?php single_cat_title(); ?>
			</div>
			<div class="text-xl text-left lg:text-center mx-auto mb-10">
				<?php echo carbon_get_term_meta(get_queried_object_id(), 'crb_category_description'); ?>
			</div>
			<div>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="block mb-10 lg:mb-6">
						<div class="flex items-start lg:items-center">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ?>" alt="<?php the_title(); ?>	" loading="lazy" class="rounded-full object-cover mr-4" width="80" height="80" alt="<?php the_title(); ?>">
							<div>
								<div class="text-xl">
									<?php the_title(); ?>	
								</div>
								<div class="post-author__name text-sm">
									<?php _e('Автор', 'totop'); ?>: <?php echo get_the_author(); ?>
								</div>
							</div>
						</div>
					</a>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
			<div class="flex justify-center items-center">
				<div class="pagination">
					<?php 
						$big = 9999999991; // уникальное число
						echo paginate_links( array(
							'format' => '?page=%#%',
							'total' => $custom_query->max_num_pages,
							'current' => $current_page,
							'prev_next' => true,
							'next_text' => (''),
							'prev_text' => (''),
						)); 
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>