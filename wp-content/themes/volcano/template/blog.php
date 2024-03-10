<?php
/* Template Name: Blog template */

get_header();
$id_page = get_queried_object()->ID; ?>
    <div class="template-blog">
        <!-- Start banner section -->
        <div class="banner-slider-blog animate__animated animate__fadeIn animate__slow" id="banner-slider-blog">
            <?php
            $args = array(
                'post_type' => array('post'),
                'status' => 'publish',
                'posts_per_page' => -1
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <a class="slider-blog" href="<?= get_the_permalink() ?>">
                        <div class="bg-blog-slider"
                             style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')"></div>
                    </a>
                <?php endwhile;
            endif; ?>
        </div>
        <!-- End banner section  -->
        <div class="section-title">
            <div class="container">
                <div class="box-magic-title wow animate__lightSpeedInRight animate__delay-1s">
                    <div class="border-mgic-box"></div>
                    <h2>
                        <?= get_field('heading_magic_box_blog_page', $id_page); ?>
                    </h2>
                </div>
            </div>
        </div>
        <!-- Start work's posts section -->
        <div class="container">
            <div class="blog-posts-loop">
                <!-- item -->
                <?php
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                        get_template_part('template/content/post/post-page-item');
                        ?>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
        <!-- End work's posts section  -->
    </div>
<?php get_footer();