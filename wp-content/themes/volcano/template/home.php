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
        <div class="content-video">
            <source src="https://sayyesenglish.com/wp-content/uploads/2024/03/homevideo1.mp4" type="video/mp4">
            <source src="https://sayyesenglish.com/wp-content/uploads/2024/03/homevideo2.mp4" type="video/mp4">
        </div>
        <div class="zalo-qr">
            <img src="https://sayyesenglish.com/wp-content/uploads/2024/03/zaloqr.jpg" alt="zalo-qr">
        </div>
    </div>
<?php get_footer();