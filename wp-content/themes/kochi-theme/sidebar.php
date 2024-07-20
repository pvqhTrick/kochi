<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 */
?>
<div class="sidebar">
    <p class="title-category">Category</p>
    <ul>
        <li class="all"><a href="<?php echo get_page_link(110) ?>">All</a></li>

        <?php  
        $categories = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => false, 
        ) );
        ?>
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <li class="<?php echo $category->slug ?>"><a
                        href="<?php echo get_category_link($category) ?>"><?php echo $category->name ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
   </ul>
</div>