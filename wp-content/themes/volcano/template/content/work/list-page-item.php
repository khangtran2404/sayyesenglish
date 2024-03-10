<?php
$taxonomy_slug = (get_post_type() === 'work_brands') ? 'work_brand_type' : 'work_film_type';

$taxonomy_list = wp_get_post_terms($post->ID, $taxonomy_slug);
$post_tax_class = '';
foreach ($taxonomy_list as $taxonomy){
    if (empty($post_tax_class)){
        $post_tax_class = $taxonomy->term_id;
    } else {
        $post_tax_class = $post_tax_class . ' ' . $taxonomy->term_id;
    }
}
?>
<div class="cont-box <?= $post_tax_class ?>">
    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
        <div class="cont-img">
            <?php
            if (get_field('square_thumbnail_work')) { ?>
                <img src="<?= get_field('square_thumbnail_work') ?>" alt="work-thumbnail">
            <?php } else {
                the_post_thumbnail('product-thumb');
            }
            ?>
        </div>

    </a>

    <div class="post-name">
        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"> <?php the_title() ?></a>
    </div>
</div>