<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="pb-4">
	<div class="container mx-auto px-2 lg:px-0">
		<div class="bg-white shadow-md rounded-md">
			<!-- Хлебные крошки -->
			<div class="pt-8 px-10 mb-5">
				<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
		      <ul class="flex">
						<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs-item">
							<a itemprop="item" href="<?php echo home_url(); ?>" class="breadcrumbs-link text-sm">
								<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
							</a>                        
							<meta itemprop="position" content="1">
						</li>
		        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs-item">
		          <a itemprop="item" href="<?php echo get_post_type_archive_link('services'); ?>" class="breadcrumbs-link text-sm">
								<span itemprop="name"><?php _e( 'Услуги', 'restx' ); ?></span>
							</a>                       
							<meta itemprop="position" content="2">
		        </li>
		        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs-item">
		          <a itemprop="item" href="<?php the_permalink(); ?>" class="breadcrumbs-link text-sm">
								<span itemprop="name"><?php the_title(); ?></span>
							</a>                       
							<meta itemprop="position" content="3">
		        </li>
		      </ul>
		    </div>
			</div>
			<div class="flex flex-col lg:flex-row">
				<div class="w-full lg:w-8/12 px-2 lg:pl-10 lg:pr-5">
					<div class="text-3xl font-bold mb-5">
						<?php the_title(); ?>
					</div>
					<div class="content">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="sticky w-full lg:w-4/12 mx-0 py-8 px-2 lg:pl-5 lg:pr-10" style="top: 1rem;">
					<div class="sidebar-block relative shadow-sm rounded-md p-5 pt-16 pb-10">
						<div class="services_icon">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/services.svg" width="80">
						</div>
						<div class="text-center text-2xl font-bold mb-5">
							Заказать услугу
						</div>
						<div class="text-center mb-5">
							Чтобы заказать услугу, вам достаточно с нами связаться. Сделать это вы можете удобным для вас способом.
						</div>
						<div class="mb-5">
							<a href="tg://resolve?domain=time2top" class="block bg-blue-500 text-white text-center text-xl shadow-lg rounded-md p-3">
								Telegram	
							</a>
						</div>
						<div>
							<a href="mailto:info@timeto.top" class="block bg-custom-black text-custom-yellow text-center text-xl shadow-lg rounded-md p-3">
								Email
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>