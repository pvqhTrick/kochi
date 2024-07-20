<!-- Đây là vòng lặp lấy category -->

<?php $categories = wp_get_post_terms(get_the_ID(), 'category');
if (!empty($categories)): ?>
    <div class="cat-list">
        <?php foreach ($categories as $category): ?>
            <p class="cat-item">
                <a href="<?php echo get_category_link($category) ?>"><?php echo $category->name ?></a>
            </p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>