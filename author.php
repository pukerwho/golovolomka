<?php get_header(); ?>

<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<div class="container mx-auto px-2 lg:px-0 py-5">
	<div class="flex">
		<div class="w-full lg:w-1/3 flex items-center flex-col mr-6">
			<div class="mb-4">
				<?php 
					$avatar = get_avatar(get_the_author_meta('ID'));
				?>
				<?php if ($avatar): ?>
			    <?php echo $avatar; ?>
			  <?php else: ?>
			    <img src="<?php bloginfo('template_part'); ?>/img/user.svg">
			  <?php endif; ?>
			</div>
			<h1 class="text-2xl mb-2"><?php echo $curauth->nickname; ?></h1>
			<div class="flex -mx-1">
				<?php if(!empty(carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_facebook' ))) { ?>
				<div class="mx-1">
					<a href="<?php echo carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_facebook' ); ?>" class="text-sm text-blue-800 hover:text-gray-900">Facebook</a>
				</div class="mx-1">
				<?php } ?>
				<?php if(!empty(carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_instagram' ))) { ?>
				<div class="mx-1">
					<a href="<?php echo carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_instagram' ); ?>" class="text-sm text-blue-800 hover:text-gray-900">Instagram</a>
				</div>
				<?php } ?>
				<?php if(!empty(carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_twitter' ))) { ?>
				<div class="mx-1">
					<a href="<?php echo carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_twitter' ); ?>" class="text-sm text-blue-800 hover:text-gray-900">Twitter</a>
				</div>
				<?php } ?>
				<?php if(!empty(carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_linkedin' ))) { ?>
				<div class="mx-1">
					<a href="<?php echo carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_linkedin' ); ?>" class="text-sm text-blue-800 hover:text-gray-900">Linkedin</a>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="w-2/3">
			<div>
				<?php _e('Биография', 'totop'); ?>	
			</div>
			<div>
				<?php echo carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_twitter' ); ?>
			</div>

		</div>
	</div>
</div>

<?php get_footer(); ?>