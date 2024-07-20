<?php
/* 
 *	Template Name: NameTemplate
 */
?>

<?php get_header(); ?>

<div id="banner">
	<p class="text">List</p>
</div>
<!-- #banner -->
<?php
$args = array(
	'post_type' => 'blog',
	'posts_per_page' => 6,
	'orderby' => 'date',
	'order' => 'DESC',
);
$listProducts = new WP_Query($args);
if ($listProducts->have_posts()): ?>
	<div id="content" class="content-bottom">
		<div class="wraper">
			<div class="area-sights">
				<?php while ($listProducts->have_posts()):
					$listProducts->the_post(); ?>
					<?php get_template_part('template-part/sight-item'); ?>
				<?php endwhile;
				wp_reset_postdata(); ?>

				<?php echo theme_pagination($listProducts); ?>
			</div>
			<?php get_sidebar() ?>
		</div>
	</div>
	<!-- #content -->
<?php endif; ?>

<?php get_footer() ?>