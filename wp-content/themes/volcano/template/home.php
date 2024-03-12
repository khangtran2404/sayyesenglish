<?php
/* Template Name: Home template */

get_header();
$id_page = get_queried_object()->ID; ?>
    <div class="template-home">
        <!-- Start banner section -->
        <div class="banner-slider-home animate__animated animate__fadeIn animate__slow">
            <?php
            $sliders = get_field('slider_banner_homepage', $id_page);
            if ($sliders): ?>
                <div id="slider-homepage" class="slider-homepage">
                    <div class="slides-home">
                        <?php foreach ($sliders as $slider):
                            $group = $slider['slider'];
                            $img = $group['background_image']['url'];
                            $heading = $group['heading'];
                            $sub_heading = $group['sub_heading'];
                            $des = $group['description'];
                            ?>
                            <div class="slider-home" style="background-image: url('<?= $img; ?>')">
                                <div class="container">
                                    <div class="group-content">
                                        <div class="content">
                                            <div class="heading-slider animate__animated"
                                                 data-animation-in="animate__fadeInDown"
                                                 data-delay-in="0.1"><?= $heading; ?></div>
                                            <p class="des-slider animate__animated"
                                               data-animation-in="animate__fadeIn"
                                               data-delay-in="0.1"><?= $des; ?></p>
                                            <div class="sub-heading animate__animated"
                                                 data-animation-in="animate__fadeInUp"
                                                 data-delay-in="0.1"><?= $sub_heading; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="social-icon-banner animate__animated animate__fadeInUp animate__slow animate__delay-1s">
                <div class="container">
                    <div class="group-content">
                        <?php if (has_nav_menu('footer')) : ?>
                            <nav aria-label="<?php esc_attr_e('Secondary menu', 'twentytwentyone'); ?>"
                                 class="banner-icon-social">
                                <ul>
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'footer',
                                            'items_wrap' => '%3$s',
                                            'container' => false,
                                            'depth' => 1,
                                            'link_before' => '<span>',
                                            'link_after' => '</span>',
                                            'fallback_cb' => false,
                                        )
                                    );
                                    ?>
                                </ul><!-- .footer-navigation-wrapper -->
                            </nav><!-- .footer-navigation -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End banner section  -->

        <!-- Start summary section -->
        <div class="summary-information">
            <?php
            $summary = get_field('summary_information_homepage', $id_page);
            if ($summary) : ?>
                <div class="group-content">
                    <?php
                    if ($summary['sub_banner_slider']) {
                        $count = count($summary['sub_banner_slider']);
                        if ($count === 1) {
                            $cond_move = "no";
                        } else {
                            $cond_move = "yes";
                        }
                        ?>
                        <div class="summary-information-banner movie-slideshow-<?= $cond_move; ?>-item wow animate__fadeInRight">
                            <div class="move-content">
                                <?php
                                $key = 0;
                                foreach ($summary['sub_banner_slider'] as $key => $item) {
                                    $key++;
                                    $group = $item['slider'];
                                    $img_banner = $group['image']['url'];
                                    // var_dump($key);
                                    ?>
                                    <img src="<?= $img_banner; ?>" alt="sub-banner">
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="summary-information-logo">
                        <img src="<?php echo esc_url($summary['logo']['url']); ?>"
                             alt="<?php echo esc_attr($summary['logo']['alt']); ?>"/>
                    </div>
                </div>
                <div class="group-content creative-v-bg">
                    <div class="img-text-v">
                        <img src="<?= DF_IMAGE . '/bg-text-v.png'; ?>" alt="img-text-v">
                    </div>
                    <div class="container">
                        <div class="heading-dance wow animate__fadeInDown" data-wow-delay="1s"><?= $summary['title']; ?></div>
                        <div class="row row-custom">
                            <div class="col-lg-5 col-md-6 col-sm-12 col-12 wow animate__fadeInLeft" data-wow-delay="1.2s">
                                <div class="title-logo">
                                    <img src="<?= $summary['title_logo']['url']; ?>" alt="logo-group-title">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-sm-12 col-12 wow animate__fadeInRight" data-wow-delay="1.2s">
                                <div class="descripition">
                                    <?= $summary['description']; ?>
                                    <a class="button-volcano" href="<?= $summary['button_view_more']; ?>">
                                        <span class="arrow-line">
                                            <img width="15" src="<?= DF_IMAGE . '/arrow-line-right.png' ?>"
                                                 alt="icon arrow">
                                        </span>
                                        <span class="text"><?= __('VIEW MORE','twentytwentyone') ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($summary['counter']): ?>
                    <div class="counter-content">
                        <div class="container">
                            <div class="row row-custom">
                                <?php
                                $totalCount = count($summary['counter']);
                                foreach ($summary['counter'] as $key=>$item) {
                                    $group = $item['item'];
                                    $number = $group['number'];
                                    $desc = $group['description'];
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-12 col-item wow animate__fadeInUp" data-wow-delay="<?= $key/$totalCount;?>s">
                                        <div class="cont-box">
                                            <div class="group-cont">
                                                <div class="counter-number"><?= $number; ?></div>
                                                <div class="desc"><?= $desc; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <!-- End summary section -->

        <!-- Start services section -->
        <div class="services">
            <div class="container">
                <?php
                $group_title_service = get_field('group_box_title_services', $id_page);
                $title_service = $group_title_service['box_title'];
                ?>
                <div class="box-magic-title wow animate__fadeInUp" data-wow-delay="1.2s">
                    <div class="border-mgic-box"></div>
                    <h2>
                        <?= $title_service; ?>
                    </h2>
                </div>
                <div class="row row-custom">
                    <?php
                    $services = get_field('services_homepage', $id_page);
                    if ($services) :
                        $totalItemServices = count($services);
                        foreach ($services as $item => $service) : ?>
                            <div class="col-lg-4 col-md-6 col-12 service-item service-item-<?= $item; ?> wow animate__zoomIn" data-wow-delay="<?= $item/$totalItemServices;?>s">
                                <div class="cont-box">
                                    <div class="group-img">
                                        <div class="icon"><img src="<?php echo esc_url($service['logo']['url']); ?>"
                                                               alt="<?php echo esc_attr($service['logo']['alt']); ?>"/>
                                        </div>
                                    </div>
                                    <div class="group-text">
                                        <h3 class="title"><?= $service['title'] ?></h3>
                                        <div class="content"><?= $service['content'] ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- End services section -->

        <!-- Start work brands film section -->
        <div class="work-brands-film-homepage">
            <div class="section-title">
                <div class="container">
                    <div class="box-magic-title wow animate__lightSpeedInRight">
                        <div class="border-mgic-box"></div>
                        <h2>
                            <?= get_field('title_when_our_magic_happen', $id_page); ?>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="group-filter">
                <div class="container">
                    <!-- maximun 4 item in list -->
                    <?php
                    $terms_list = array_chunk(get_terms('work_brand_type'),5) ;
                    for ($i = 0 ; $i < count($terms_list); $i++) : ?>
                        <ul data-id="work-brands-section" class="group-item group-item-max-5-<?= $i ?> wow animate__fadeIn" data-wow-delay="1s">
                            <?php
                            foreach ($terms_list[$i] as $term ){
                                echo '<li class="item" data-id="' . $term->term_id . '">' . $term->name . '</li>';
                            }
                            ?>
                        </ul>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="container">
                <div class="work-brand-slider" id="work-brand-slider">
                    <?php
                    $args = array(
                        'post_type' => array('work_brands'),
                        'status' => 'publish',
                        'posts_per_page' => -1,
                    );
                    $itemWorkBrand = 1;
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post(); $itemWorkBrand++;
                            ?>
                            <div class="slide-item wow animate__fadeInUp" data-wow-delay="<?= $itemWorkBrand/3;?>s">
                                <?php
                                get_template_part('template/content/work/homepage-item');
                                ?>
                            </div>
                        <?php
                        endwhile;
                    else: ?>
                        <div class="none-found-post"><?= __('No post found.', 'twentytwentyone') ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="line-logo">
                <div class="line-left wow animate__fadeInLeft" data-wow-delay=".5s"></div>
                <div class="cont-img wow animate__fadeIn" data-wow-delay="1s">
                    <img src="<?php echo esc_url($summary['logo']['url']); ?>" alt="logo-group">
                </div>
                <div class="line-right  wow animate__fadeInRight" data-wow-delay=".5s"></div>
            </div>
            <div class="group-filter">
                <div class="container">
                    <!-- maximun 5 item in list -->
                    <?php
                    $terms_list = array_chunk(get_terms('work_film_type'),5) ;
                    for ($i = 0 ; $i < count($terms_list); $i++) : ?>
                        <ul data-id="work-brands-section" class="group-item group-item-max-5-<?= $i ?> wow animate__fadeIn" data-wow-delay="1.2s">
                            <?php
                            foreach ($terms_list[$i] as $term ){
                                echo '<li class="item" data-id="' . $term->term_id . '">' . $term->name . '</li>';
                            }
                            ?>
                        </ul>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="container">
                <div class="work-film-slider" id="work-film-slider">
                    <?php
                    $args = array(
                        'post_type' => 'work_films',
                        'status' => 'publish',
                        'posts_per_page' => -1,
                    );
                    $itemWorkFilm = 2;
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post(); $itemWorkFilm++;
                            ?>
                            <div class="slide-item wow animate__fadeInUp" data-wow-delay="<?= $itemWorkFilm/3;?>s">
                                <?php get_template_part('template/content/work/homepage-item'); ?>
                            </div>
                        <?php
                        endwhile;
                    else: ?>
                        <div class="none-found-post"><?= __('No post found.', 'twentytwentyone') ?></div>
                    <?php endif;
                    ?>
                </div>
            </div>
        </div>
        <!-- End highlights works section -->

        <!-- Start partners section -->
        <!-- <div class="partner-homepage">
            <div class="container">
                <h2><?= (get_field('partner_title_homepage', $id_page)) ? get_field('partner_title_homepage', $id_page) : __('Our partners', 'twentytwentyone') ?></h2>
                <?php
        $args = array(
            'post_type' => 'partners',
            'status' => 'publish',
            'posts_per_page' => -1,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
            ?>
                    <div class="group-partner-home" id="partner-home-slider">
                        <?php
            while ($the_query->have_posts()) : $the_query->the_post();
                //get_template_part('template/content/partner/homepage-item');
            endwhile;
            ?>
                    </div>
                <?php
        else: ?>
                    <div class="none-found-post"><?= __('No post found.', 'twentytwentyone') ?></div>
                <?php endif;
        ?>
            </div>
        </div> -->
        <!-- End partners section -->

        <!-- Start posts section -->
        <div class="posts-homepage-group">
            <?php
            $group_title_post = get_field('group_box_title_post', $id_page);
            $title_post = $group_title_post['box_title'];
            $homepage_post_group = $group_title_post['post_homepage_group'];
            ?>
            <div class="bg-post-tile">
                <div class="container">
                    <div class="box-magic-title wow animate__lightSpeedInLeft" data-wow-delay="1s">
                        <div class="border-mgic-box"></div>
                        <h2>
                            <?= $title_post; ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <?php if ($homepage_post_group) : 
                    $totalBlog = count($homepage_post_group);
                    ?>
                    <div class="row row-list-post">
                        <?php foreach ($homepage_post_group as  $key=>$post) : $key = $key + 2;?>
                            <div class="col-md-6 col-sm-12 col-item wow animate__fadeInUp" data-wow-delay="<?= $key/$totalBlog;?>s">
                                <div class="cont-box">
                                    <div class="cont-link-img">
                                        <a href="<?= get_the_permalink($post->ID) ?>"
                                           title="<?= get_the_title($post->ID) ?>">
                                            <img src="<?= get_the_post_thumbnail_url($post->ID) ?>"
                                                 alt="<?= get_the_title($post->ID) ?>">
                                        </a>
                                    </div>
                                    <div class="cont-text">
                                        <div class="excerpt">
                                            <?= wp_trim_words($post->post_content, 60) ?>
                                        </div>
                                    </div>
                                    <a class="button-volcano" href="<?= get_the_permalink($post->ID) ?>">
                                        <span class="arrow-line">
                                            <img width="15" src="<?= DF_IMAGE . '/arrow-line-right.png' ?>"
                                                 alt="icon arrow">
                                        </span>
                                        <span class="text"><?= __('VIEW MORE','twentytwentyone') ?></span>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- End posts section -->
    </div>
<?php get_footer();