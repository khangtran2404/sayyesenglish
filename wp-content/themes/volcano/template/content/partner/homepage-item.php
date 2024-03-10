<div class="partner-item">
    <div class="group-content">
        <?php
        $link = get_field('link_partner');
        if ( $link ) : ?>
            <a href="<?= $link ?>"><?php the_post_thumbnail('product-thumb'); ?></a>
            <?php else: ?>
            <?php the_post_thumbnail('product-thumb'); ?>
        <?php endif;
        ?>
    </div>
</div>
