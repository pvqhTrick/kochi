<?php get_header(); ?>

<div id="banner">
	<p class="text"><?php single_cat_title() ?></p>
</div>
<!-- #banner -->


<?php 
global $query_string;
$posts = query_posts($query_string.'&posts_per_page=6');
$wp_query;
 var_dump($wp_query);
if (have_posts()): ?>
	<div id="content" class="content-bottom">
		<div class="wraper">
			<div class="area-sights">
				<?php while (have_posts()): the_post(); ?>
					<?php get_template_part('template-part/sight-item'); ?>
				<?php endwhile; wp_reset_postdata(); ?>

				<?php echo theme_pagination() ?>
			</div>
			<?php get_sidebar(); ?>
			
		</div>
	</div>
	<!-- #content -->
<?php else: ?>
	<div id="content" class="content-bottom">
		<div class="wraper">
			<div class="area-sights">
				<h1>Not found item</h1>
			</div>	
		</div>
	</div>
<?php endif; ?>


<?php get_footer(); ?>