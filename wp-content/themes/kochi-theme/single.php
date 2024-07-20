<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
get_header();
?>
<?php $categories = wp_get_post_terms(get_the_ID(), 'category');
$cat = $categories[0]; ?>
<div id="banner">
	<p class="text"><?php echo $cat->name; ?></p>
</div>
<!-- #banner -->

<div id="content" class="content-bottom">
	<div class="title-top"><?php the_title() ?></div>
	<div class="wraper">
		<div class="area1">
			<?php if (has_post_thumbnail()): ?>
				<div class="img">
					<?php the_post_thumbnail('single') ?>
				</div>
			<?php else: ?>
				<div class="img">
					<?php the_default_thumbnail() ?>
				</div>
			<?php endif; ?>
			<!-- Thumbnail -->
			
			<?php get_template_part('template-part/categories'); ?>
			<div class="text">
				<?php the_content(); ?>
			</div>
			<!-- Category -->
			
			<?php
			$google_map_iframe = get_field('google_map_iframe');
			if ($google_map_iframe) : ?>
				<div class="map">
					<?php echo $google_map_iframe; ?>
				</div>
			<?php endif; ?>
			<!-- Google map iframe -->
			<?php mytheme_post_nav(); ?>
		</div>
	</div>
</div>
<!-- #content -->
<?php get_footer(); ?>