<?php
/* Template Name: Project Development template */

get_header();
$id_page = get_queried_object()->ID; ?>
    <div class="template-home template-development-pro">
        <!-- Start banner section -->
        <div class="banner-slider-home animate__animated animate__fadeIn animate__slow">
            <?php
            $sliders = get_field('slider_banner_development_project', $id_page);
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

        <!-- End banner section -->
        <!-- Start summary section -->
        <div class="summary-information">
            <?php
            $summary = get_field('summary_information_development_project', $id_page);
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
                    <div class="summary-information-logo" data-aos="fade-up" data-aos-duration="600">
                        <div class="content-img">
                            <img src="<?php echo esc_url($summary['logo']['url']); ?>"
                                 alt="<?php echo esc_attr($summary['logo']['alt']); ?>"/>
                            <img class ="circle-line" src="<?= DF_IMAGE. '/circle-line.png';?>" alt="circle-line">
                        </div>
                    </div>
                </div>
                <div class="group-content creative-v-bg">
                    <div class="img-text-v">
                        <img src="<?= DF_IMAGE . '/bg-text-v.png'; ?>" alt="img-text-v">
                    </div>
                    <div class="img-fire">
                        <img src="<?= DF_IMAGE . '/bg-fire.png'; ?>" alt="img-fire">
                    </div>
                    <div class="img-building-desktop wow animate__fadeIn" data-wow-delay="1.2s">
                        <img  src="<?= $summary['main_image']['url']; ?>" alt="logo-group-title">
                    </div>
                    <div class="container">
                        <div class="row row-custom">
                            <div class="col-lg-5 col-md-12 col-sm-12 col-12 wow animate__fadeInLeft">
                            </div>
                            <div class="col-lg-7 col-md-12 col-sm-12 col-12 wow animate__fadeInRight">
                                <h2 class="title-gmv summary-title wow" align="center"><?= $summary['title']; ?></h2>
                                <div class="line-vertical"  align="center"><span></span></div>
                                <div class="descripition-1">
                                    <?= $summary['description_1']; ?>
                                </div>
                                <div class="line-vertical" align="center"><span></span></div>
                                <div class="descripition-2">
                                    <?= $summary['description_2']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- End summary section -->

        <!-- Start bring a development section -->
        <div class="bring-a-development">
            <?php
            $content = get_field('bring_a_developement', $id_page);
            if ($content) : ?>
                <div class="group-content">
                    <?php if ($content['content']): ?>
                        <div class="content">
                            <div class="quote-left wow animate__fadeInLeft" data-wow-delay="1.2s"><img  src="<?= DF_IMAGE . '/quote-left.png';?>" alt="quote-left"></div>
                            <div class="main-quote wow animate__fadeIn" data-wow-delay="1s"><?= $content['content']; ?></div>
                            <div class="quote-right wow animate__fadeInRight" data-wow-delay="1.2s"><img src="<?= DF_IMAGE . '/quote-right.png';?>" alt="quote-right"></div>
                        </div>
                    <?php endif; ?>
                    <?php if ($content['view_more']): ?>
                        <div class="container">
                            <div class="content-link wow animate__fadeIn" align="center">
                                <a class="button-volcano" href="<?= $content['view_more'] ?>">
                                    <span class="arrow-line">
                                        <img width="15" src="<?= DF_IMAGE . '/arrow-line-right.png' ?>"
                                            alt="icon arrow">
                                    </span>
                                    <span class="text"><?= __('VIEW MORE', 'twentytwentyone') ?></span>
                                </a>
                                <div class="line-vertical"  align="center"><span></span></div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- End bring a development section -->

        <!-- Start do the right things section -->
        <div class="do-the-right-things wow animate__fadeIn">
            <?php
            $DTRTimage = get_field('do_the_right_things', $id_page);
            if ($DTRTimage['image']) : ?>
                <img src="<?= $DTRTimage['image']['url'] ?>" alt="do-the-right">
            <?php endif; ?>
            <div class="line-vertical"  align="center"><span></span></div>
        </div>
        <!-- End do the right things section -->

        <!-- Start our works section -->
        <div class="our-works">
            <?php
            $our_works = get_field('our_works', $id_page);
            if ($our_works) : ?>
                <div class="group-content">
                    <div class="container">
                        <h2 class="title-gmv wow animate__fadeIn" align="center"><?= ($our_works['title']) ? $our_works['title'] : __('Our works', 'twentytwentyone') ?></h2>
                        <div class="description wow animate__fadeIn" data-wow-delay=".2s" align="center"><?= ($our_works['description']) ? $our_works['description'] : __('Make Properties More Valuable', 'twentytwentyone') ?></div>
                    </div>
                    <div class="work-develop-post-slider" id="work-develop-post-slider">
                        <?php
                        if ($our_works['work_posts']) :
                            $itemWorkBrand = 1;
                            foreach ($our_works['work_posts'] as $item):
                                $post_id = $item['post']->ID;
                                $post = get_post($post_id);
                                $permalink = get_post_permalink($post_id);
                                $title = $post->post_title;
                                ?>
                                <div class="slide-item wow animate__fadeInUp"
                                     data-wow-delay="<?= $itemWorkBrand / 5; ?>s">
                                    <div class="cont-box">
                                        <a href="<?= $permalink ?>" title="<?= $title ?>">
                                            <div class="cont-img">
                                                <?php
                                                if (get_field('homepage_thumbnail_work', $post_id)) { ?>
                                                    <img src="<?= get_field('homepage_thumbnail_work', $post_id) ?>"
                                                         alt="work-thumbnail">
                                                <?php } else {
                                                    the_post_thumbnail('product-thumb', $post_id);
                                                }
                                                ?>
                                            </div>
                                        </a>

                                        <div class="post-name">
                                            <a href="<?= $permalink ?>" title="<?= $title ?>"> <?= $title ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                        endif;
                        ?>
                    </div>
                    <!-- <div class="sub-description">
                        <?= ($our_works['sub_description']) ? $our_works['sub_description'] : '' ?>
                    </div>-->
                    <div class="line-vertical"  align="center"><span></span></div>
                </div>
            <?php endif; ?>
        </div>
        <!-- End our works section -->

        <!-- Start our roles section -->
        <div class="our-roles">
            <?php
            $our_roles = get_field('our_roles', $id_page);
            if ($our_roles) : ?>
                <div class="group-content">
                    <div class="container">
                        <h2 class="title-gmv wow animate__fadeIn"><?= ($our_roles['title']) ? $our_roles['title'] : __('Our Roles, Our Services', 'twentytwentyone') ?></h2>
                        <div class="description wow animate__fadeIn" data-wow-delay="0.2s">
                            <?php
                            if ($our_roles['description']):
                                foreach ($our_roles['description'] as $item):?>
                                    <span class="description-item"><?= $item['item'] ?></span>
                                <?php endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="phrase-group phrase-group-develop-slider" id="phrase-group-develop-slider">
                        <?php
                        if ($our_roles['phrase']):
                            $count_item = 1;
                            $totalCount = count($our_roles['phrase']);
                            foreach ($our_roles['phrase'] as $key=>$item): ?>
                                <div class="phrase-item wow animate__fadeInUp" data-wow-delay="<?= $key/$totalCount;?>s">
                                    <div class="sub-title"><?= $item['sub_title'] ?></div>
                                    <div data-page="<?= $id_page ?>"
                                         data-id="<?= $key ?>"
                                         class=" group-cont <?= ($count_item === 1) ? 'active' : '' ?>">
                                        <div class="item-phrase-main item-phrase-<?= $count_item ?>">
                                            <div class="title"><?= $item['title'] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php $count_item++; endforeach;
                        endif;
                        ?>
                    </div>
                    <div class="group-phrase-detail-ajax wow animate__fadeIn "
                         data-wow-delay="1.2s">
                        <?php
                        if ($our_roles['phrase']):
                            $count_item = 1;
                            $totalCount = count($our_roles['phrase']);
                            foreach ($our_roles['phrase'] as $key=>$item): if ($count_item > 1) break;
                                foreach ($item['detail'] as $detail_item):?>
                                    <div class="phrase-detail-item">
                                        <div class="group-phrase-item">
                                            <div class="cont-icon">
                                                <img src="<?= $detail_item["image"]["url"] ?>" alt="icon">
                                            </div>
                                            <div class="item-description">
                                                <?= $detail_item["title"] ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php $count_item++; endforeach;
                        endif; ?>
                    </div>
                    <?php
                    if ($our_roles['view_more']): ?>
                        <div class="view-more wow animate__fadeIn" data-wow-delay="1.3s" align="center">
                            <a class="button-volcano" href="<?= $our_roles['view_more'] ?>">
                                        <span class="arrow-line">
                                            <img width="15" src="<?= DF_IMAGE . '/arrow-line-right.png' ?>"
                                                 alt="icon arrow">
                                        </span>
                                <span class="text"><?= __('VIEW MORE', 'twentytwentyone') ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="line-vertical"  align="center"><span></span></div>
        </div>
        <!-- End our roles section -->

        <!-- End our insights section -->
        <div class="our-insights">
            <?php
            $our_insight = get_field('our_insights', $id_page);
            if ($our_insight) : ?>
                <div class="group-content">
                    <div class="container">
                        <h2 class="title-gmv wow animate__fadeIn"><?= ($our_insight['title']) ? $our_insight['title'] : __('Our Insights', 'twentytwentyone') ?></h2>
                        <div class="description wow animate__fadeIn" data-wow-delay="0.2s">
                            <?php
                            if ($our_insight['description']):
                                echo $our_insight['description'];
                            endif;
                            ?>
                        </div>
                    </div>
                    <?php
                    if ($our_insight['post_list']): ?>
                        <div class="post-list-group">
                            <div class="row">
                            <?php

                            foreach ($our_insight['post_list'] as $key_post=>$item):
                                $post_id = $item['post']->ID;
                                $post = get_post($post_id);
                                $permalink = get_post_permalink($post_id);
                                $title = $post->post_title;
                                $date = get_the_date('d-m-Y', $post_id);
                                ?>
                                <div class="col-lg-3 col-md-6 col-12 col-12 post-item wow animate__fadeInUp" data-wow-delay="<?= $key_post/count($our_insight['post_list']);?>s">
                                    <div class="cont-box">
                                        <a href="<?= $permalink ?>" title="<?= $title ?>">
                                            <div class="cont-img">
                                                <?php
                                                if (get_field('pd_single_image_blog', $post_id)) { ?>
                                                    <img src="<?= get_field('pd_single_image_blog', $post_id)['url'] ?>"
                                                         alt="post-thumbnail">
                                                <?php } else {
                                                    the_post_thumbnail('product-thumb', $post_id);
                                                }
                                                ?>
                                            </div>
                                        </a>
                                        <div class="cont-text">
                                            <div class="post-name">
                                                <a href="<?= $permalink ?>" title="<?= $title ?>"> <?= $title ?></a>
                                            </div>
                                            <div class="post-date"><?= $date ?></div>
                                            <div class="view-detail view-more">
                                                <a class="button-volcano" href="<?= $our_insight['view_more'] ?>">
                                                <span class="arrow-line">
                                                    <img width="15" src="<?= DF_IMAGE . '/arrow-line-right.png' ?>"
                                                        alt="icon arrow">
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                            ?>
                            </div>
                        </div>
                    <?php endif;
                    ?>
                    <?php
                    if ($our_insight['view_more']): ?>
                        <div class="view-more wow animate__fadeIn" align="center">
                            <a class="button-volcano" href="<?= $our_insight['view_more'] ?>">
                                        <span class="arrow-line">
                                            <img width="15" src="<?= DF_IMAGE . '/arrow-line-right.png' ?>"
                                                 alt="icon arrow">
                                        </span>
                                <span class="text"><?= __('VIEW MORE', 'twentytwentyone') ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- End our insights section -->

        <!-- Start repeat banner section -->
        <div class="summary-information">
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
            </div>
        </div>
        <!-- End repeat banner section -->

        <!-- Start service form section -->
        <div class="service-form-section">
            <?php
            $service_form_group = get_field('service_form',$id_page);
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
        <!-- End service form section -->

    </div>
<?php get_footer();