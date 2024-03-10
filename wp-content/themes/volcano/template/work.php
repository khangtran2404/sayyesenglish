<?php
the_content();
/* Template Name: Work template */

get_header();
$id_page = get_queried_object()->ID; ?>
    <div class="template-work">
        <!-- Start banner section -->
        <div class="banner-slider-work animate__animated animate__fadeIn animate__slow" id="banner-slider-work">
            <?php
            $args = array(
                'post_type' => array('work_films','work_brands'),
                'status' => 'publish',
                'posts_per_page' => -1
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <a class="slider-work" href="<?= get_the_permalink();?>" title="<?php the_title(); ?>">
                        <div class="bg-work-slider"style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')"></div>
                    </a>
                <?php endwhile;
            endif;
            ?>
        </div>
        <!-- End banner section  -->
        <div class="section-title">
            <div class="container">
                <div class="box-magic-title wow animate__lightSpeedInRight">
                    <div class="border-mgic-box"></div>
                    <h2>
                        <?= get_field('heading_magic_box_service_page', $id_page); ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="filter-work-section">
            <div class="container">
                <ul class="filter-list">
                    <li data-id="work-brand" class="filter-item active-filter wow animate__fadeInUp" data-wow-delay=".5s">
                        <?= __('Work Brand', 'twentytwentyone') ?>
                    </li>
                    <li data-id="work-film" class="filter-item wow animate__fadeInUp" data-wow-delay=".8s">
                        <?= __('Work Film', 'twentytwentyone') ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="filter-post-tax-brands group-filter-tax active-filter-tax">
            <div class="container">
                <!-- maximun 4 item in list -->
                <?php
                $terms_list = array_chunk(get_terms('work_brand_type'),4) ;
                for ($i = 0 ; $i < count($terms_list); $i++) : ?>
                    <ul data-id="work-brands-section" class="group-item group-item-max-4-<?= $i ?> filter-taxonomy-list wow animate__fadeIn" data-wow-delay="1s">
                        <?php
                        foreach ($terms_list[$i] as $term ){
                            echo '<li class="item" data-id="' . $term->term_id . '">' . $term->name . '</li>';
                        }
                        ?>
                    </ul>
                <?php endfor; ?>
            </div>
        </div>
        <div class="filter-post-tax-films group-filter-tax">
            <div class="container">
                <!-- maximun 5 item in list -->
                <?php
                $terms_list = array_chunk(get_terms('work_film_type'),4) ;
                for ($i = 0 ; $i < count($terms_list); $i++) : ?>
                    <ul data-id="work-films-section" class="group-item group-item-max-4-<?= $i ?> filter-taxonomy-list wow animate__fadeIn" data-wow-delay=".5s">
                        <?php
                        foreach ($terms_list[$i] as $term ){
                            echo '<li class="item" data-id="' . $term->term_id . '">' . $term->name . '</li>';
                        }
                        ?>
                    </ul>
                <?php endfor; ?>
            </div>
        </div>

        <div class="work-brands-section active animate__animated animate__fadeInUp">
            <div class="container">
                <div class="highlight-posts row">
                    <?php
                    $args = array(
                        'post_type' => array('work_brands'),
                        'status' => 'publish',
                        'posts_per_page' => 2,
                        'meta_key' => 'sticky_work',
                        'meta_value' => true,
                        'meta_compare' => '='
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                            $sticky_args[] = get_the_ID();?>
                            <div class="col-md-6 col-sm-12 col-content">
                                <?php
                                    get_template_part('template/content/work/highlight-item');
                                ?>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
                <div class="other-post">
                    <div class="post-list row">
                        <?php
                        $args = array(
                            'post_type' => array('work_brands'),
                            'status' => 'publish',
                            'posts_per_page' => -1,
                            'post__not_in' => $sticky_args
                        );
                        $the_query = new WP_Query($args);
                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="col-lg-3 col-md-4 col-sm-12 col-content animate__fadeIn animate__animated ">
                                    <?php
                                        get_template_part('template/content/work/list-page-item');
                                    ?>
                                </div>
                            <?php endwhile;
                        else: ?>
                            <div class="none-found-post" style="text-align:center;"><?= __('No post found.', 'twentytwentyone') ?></div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="work-films-section hidden animate__animated animate__fadeInUp">
            <div class="container">
                <div class="highlight-posts row">
                    <?php
                    $args = array(
                        'post_type' => array('work_films'),
                        'status' => 'publish',
                        'posts_per_page' => 2,
                        'meta_key' => 'sticky_work',
                        'meta_value' => true,
                        'meta_compare' => '='
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                            $sticky_args[] = get_the_ID();
                    ?>
                            <div class="col-md-6 col-sm-12  col-content">
                                <?php
                                    get_template_part('template/content/work/highlight-item');
                                ?>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
                <div class="other-post">
                    <div class="post-list row">
                        <?php
                        $args = array(
                            'post_type' => array('work_films'),
                            'status' => 'publish',
                            'posts_per_page' => -1,
                            'post__not_in' => $sticky_args
                        );
                        $the_query = new WP_Query($args);
                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="col-lg-3 col-md-4 col-sm-12 col-content animate__fadeIn animate__animated ">
                                    <?php
                                        get_template_part('template/content/work/list-page-item');
                                    ?>
                                </div>
                            <?php endwhile;
                        else: ?>
                            <div class="none-found-post" style="text-align:center;"><?= __('No post found.', 'twentytwentyone') ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();