<div class="catlistBtn">
    <ul class="catlist wraper">
        <?php
        $exclude_cat = get_category_by_slug('none');

        $catList = get_terms(
            array(
                'taxonomy' => 'category',
                'hide_empty' => false,
                'exclude' => array($exclude_cat->term_id),
            )
        );
        foreach ($catList as $catItem):
            $image = get_field('category-image', 'category_'.$catItem->term_id); 

            ?>
            <li>
                <a class="hoverJS" href="<?php echo get_term_link($catItem); ?>">
                    <?php if ($image):?>
                        <!-- <img src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>" alt="<?php echo $catItem->name ?>"> -->
                         <?php echo wp_get_attachment_image($image, 'full'); ?>
                    <?php endif; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>