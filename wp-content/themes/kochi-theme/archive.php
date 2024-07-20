<?php
get_header();
?>

<div id="banner">
	<p class="text"><?php single_cat_title() ?></p>
</div>

<?php if (have_posts()): ?>
<div id="content" class="content-bottom">
	<div class="wraper">
		<div class="area-sights">
			<?php while (have_posts()): the_post(); ?>
				<?php get_template_part('template-part/sight-item'); ?>
			<?php endwhile; wp_reset_postdata(); ?>

			<?php echo theme_pagination($wp_query); ?>
		</div>
			
		<?php get_sidebar(); ?>
	</div>
</div>
<!-- #content -->
<?php endif; ?>
<?php get_footer(); ?>