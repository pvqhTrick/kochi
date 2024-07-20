<div class="sights-item">
    <div class="thumail hoverJS">
        <a href="<?php the_permalink() ?>">
            <?php 
            if(has_post_thumbnail())
                the_post_thumbnail('sight-item'); 
            else
                the_default_thumbnail();
            ?>
        </a>
        <?php get_template_part('template-part/categories'); ?>
    </div>

    <div class="inner">
        <h2 class="sights-title"><span><?php the_title() ?></span></h2>
        <div class="sights-text" style="min-height: 100px">
            <?php the_excerpt(); ?>
        </div>
        <p class="more"><a class="hoverJS" href="<?php the_permalink() ?>">more</a></p>
    </div>
    
    <?php if(is_new_post( )): ?>
        <p class="new"><img src=<?php echo get_theme_file_uri() . '/img/index/toparea4_post_new.png' ?> alt=""></p>
    <?php endif; ?>
</div>