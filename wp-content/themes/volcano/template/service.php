<?php
/* Template Name: Service template */

$id_home_page = get_option('page_on_front');
$test = 1;
get_header();
$id_page = get_queried_object()->ID; ?>
    <div class="template-service">
        <!-- Start banner section -->
        <?php
        $banner = get_field('banner_service') ? get_field('banner_service') : DF_IMAGE . '/noimage.png';
        $text_group = get_field('banner_text_service_group'); ?>
        <div class="banner-service" style="background-image: url('<?= $banner; ?>')">
            <div class="container">
                <div class="content">
                    <div class="group-content">
                        <?php
                        if ($text_group['text_1']) : ?>
                            <div class="heading heading-left animate__animated animate__fadeInLeft"><?= $text_group['text_1'] ?></div>
                        <?php endif;
                        if ($text_group['text_2']) : ?>
                            <div class="heading heading-right  animate__animated animate__fadeInRight"><?= $text_group['text_2'] ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="social-icon animate__animated animate__fadeInUp animate__delay-1s">
                <div class="container">
                    <?php if (has_nav_menu('footer')) : ?>
                        <nav aria-label="<?php esc_attr_e('Secondary menu', 'twentytwentyone'); ?>">
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
        <!-- End banner section  -->
        <!-- Start services section -->
        <div class="services">
            <div class="container">
                <?php
                $group_title_service = get_field('group_box_title_services', $id_home_page);
                $title_service = $group_title_service['box_title'];
                ?>
                <div class="box-magic-title wow animate__fadeInUp" data-wow-delay="1s">
                    <div class="border-mgic-box"></div>
                    <h2>
                        <?= $title_service; ?>
                    </h2>
                </div>
                <div class="sub-title-description wow animate__fadeInUp" data-wow-delay="1.1s">
                    <?= get_field('sub_title_magic_box_service', $id_page); ?>
                </div>
                <div class="row row-custom">
                    <?php
                    $services = get_field('services_homepage', $id_home_page);
                    if ($services) :
                        $totalItemServices = count($services);
                        foreach ($services as $item => $service) : ?>
                            <div class="col-lg-4 col-md-6 col-12 service-item service-item-<?= $item; ?> wow animate__zoomIn"
                                 data-wow-delay="<?= $item / $totalItemServices; ?>s">
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

        <?php
        $banner_top_provider = get_field('banner_top_service_provider', $id_page);
        if ($banner_top_provider): ?>
            <div class="banner-top-provider"
                 style="background-image: url('<?= $banner_top_provider['background_banner']['url']; ?>')">
                <div class="group-content">
                    <div class="container">
                        <div class="content">
                            <div class="icon wow animate__flipInX" data-wow-delay="1s">
                                <img src="<?= $banner_top_provider['icon_quote']['url']; ?>" alt="icon quote">
                            </div>
                            <div class="heading wow animate__fadeInLeft"><?= $banner_top_provider['heading']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- Start services section -->
        <?php if ($service_groups = get_field('services_group', $id_page)): ?>
            <div class="service-list-section" id="service-list-section">
                <div class="container">
                    <?php
                    $array_align = ['left', 'center', 'right'];
                    $count = 0;
                    $cond = 0;
                    foreach ($service_groups as $group):
                        $count++;
                        $condition = $cond;
                        if ($condition >= 2) {
                            $cond = 0;
                        } else {
                            $cond++;
                        }
                        ?>
                        <div class="service-item">
                            <div class="group-heading <?= $array_align[$condition]; ?> wow animate__fadeInUp">
                                <h2>
                                    <span class="number"><?php if ($count < 10) {
                                            echo '0';
                                        } ?><?= $count; ?>.</span><?= $group['title'] ?>
                                </h2>
                            </div>
                            <?php if ($group['posts']): ?>
                                <div class="post-list">
                                    <?php
                                    foreach ($group['posts'] as $key => $post): $key++;
                                        $gallery = $post['thumbnail']['gallery'];
                                        $json_data = json_encode($gallery, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
                                        ?>
                                        <div data-title="<?= $post['title'] ?>"
                                             data-detail="<?= $post['detail'] ?>"
                                             data-thumbnail="<?= $post['thumbnail']['image_thumbnail'] ? $post['thumbnail']['image_thumbnail']['url'] : DF_IMAGE .'/noimage.png'; ?>"
                                             data-gallery="<?= htmlspecialchars($json_data, ENT_QUOTES, 'UTF-8'); ?>"
                                             class="service-post-item wow animate__fadeInUp" data-wow-delay="1s">
                                            <div class="cont-img">
                                                <img src="<?= $post['thumbnail']['image_thumbnail'] ? $post['thumbnail']['image_thumbnail']['url'] : DF_IMAGE .'/noimage.png';  ?>"
                                                     alt="service-post-thumbnail">
                                                <?php
                                                if ($post['thumbnail']['movie_text']) { ?>
                                                    <div class="bg-movie">
                                                    <div class="group-move-text">
                                                        <div class="move-text">
                                                            <div class="item"><?= $post['thumbnail']['movie_text']; ?></div>
                                                        </div>
                                                        <div class="move-text">
                                                            <div class="item"><?= $post['thumbnail']['movie_text']; ?></div>
                                                        </div>
                                                    </div>
                                                    </div><?php
                                                }
                                                ?>
                                            </div>
                                            <div class="title"><?= $post['title'] ?></div>
                                            <div class="button-volcano">
                                    <span class="arrow-line">
                                        <img width="15" src="<?= DF_IMAGE . '/arrow-line-right.png' ?>"
                                             alt="icon arrow">
                                    </span>
                                                <span class="text"><?= __('Read more', 'volcano') ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach;
                    ?>
                </div>
            </div>
        <?php endif; ?>
        <!-- End services section -->
        <div class="summary-information wow animate__fadeInLeft">
            <?php
            $summary = get_field('summary_information_homepage', $id_home_page);
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
                        <div class="summary-information-banner movie-slideshow-<?= $cond_move; ?>-item">
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
                </div>
            <?php endif; ?>
        </div>
        <!-- Start service form -->
        <div class="service-form-section">
            <?php
            $service_form_group = get_field('service_form', $id_page);
            $form_title = $service_form_group['form_title'];
            $form_description = $service_form_group['form_description'];
            $form_shortcode = $service_form_group['form_shortcode'];
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-left wow animate__fadeInLeft" data-wow-delay="1s">
                        <div class="group-content">
                            <h2><?= $form_title ?></h2>
                            <div class="form-description"><?= $form_description ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12  col-right wow animate__fadeInRight" data-wow-delay="1s">
                        <div class="form-shortcode"><?= do_shortcode($form_shortcode) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End service form -->

        <!-- Member popup modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary hidden show-service-popup-btn" data-toggle="modal"
                data-target="#exampleModalCenter">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="close" data-dismiss="modal" aria-label="Close">
                        <svg class="svg-icon" aria-hidden="true" role="img" focusable="false"
                             xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <polygon fill="" fill-rule="evenodd"
                                     points="6.852 7.649 .399 1.195 1.445 .149 7.899 6.602 14.352 .149 15.399 1.195 8.945 7.649 15.399 14.102 14.352 15.149 7.899 8.695 1.445 15.149 .399 14.102"></polygon>
                        </svg>
                    </div>
                    <div class="modal-body service-post-popup-body row">
                        <div class="col-md-6 col-sm-12 service-post-thumbnail"></div>
                        <div class="col-md-6 col-sm-12 service-post-content">
                            <div class="group-content">
                                <div class="icon">
                                    <img style="height: 65px; width:auto"
                                         src="<?= get_field('banner_top_service_provider', $id_page)['icon_quote']['url'] ?>"
                                         alt="icon">
                                </div>
                                <div class="post-title"></div>
                                <div class="post-detail"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Member popup modal -->
    </div>

<?php get_footer();