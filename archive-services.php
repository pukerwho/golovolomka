<?php get_header(); ?>

<div class="pb-4">
	<div class="container mx-auto px-2 lg:px-0">
		<div class="bg-white shadow-md rounded-md py-10 px-2 lg:px-10">
			<div class="text-3xl lg:text-4xl text-center font-bold mb-10 ">
				Услуги
			</div>
			<div class="w-full lg:w-8/12 mx-auto">
				<?php $custom_query = new WP_Query( array( 
					'post_type' => 'services', 
					'posts_per_page' => 20,
					'orderby' => 'date',
					'order' => 'DESC',
				));
				if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					<div class="py-4 border-b border-gray-50">
						<a href="<?php the_permalink(); ?>" class="text-xl">
							<?php the_title(); ?>
						</a>
					</div>
					
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>