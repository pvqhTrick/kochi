<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */
?>

<div class="sights-item">
	<div class="thumail hoverJS">
		<a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt=""></a>
		<?php $categories = wp_get_post_terms(get_the_ID(), 'categories');
		if (!empty($categories)): ?>
			<div class="cat-list">
				<?php foreach ($categories as $category): ?>
					<p class="cat-item"><a href="<?php echo get_category_link($category) ?>"><?php echo $category->name ?></a>
					</p>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="inner">
		<h2 class="sights-title"><span><?php the_title() ?></span></h2>
		<p class="sights-text">
			<?php echo wp_trim_words(get_the_content(), 15, '...') ?>
		</p>

		<p class="more"><a class="hoverJS" href="<?php the_permalink() ?>">more</a></p>
	</div>
	<?php
	$post_date = get_the_date('U');
	$current_date = current_time('timestamp');
	$dateDiff = $current_date - $post_date;
	$days_diff = round($dateDiff / (60 * 60 * 24));

	if ($days_diff <= 3): ?>
		<p class="new"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea4_post_new.png' ?> alt=""></p>
	<?php endif; ?>
</div>