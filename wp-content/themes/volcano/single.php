<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
global $post;
$id_post = $post->ID;
$post_type = get_post_type($id_post);
?>
    <div class="page-single">
        <?php
        /* Start the Loop */
        while (have_posts()) :
            the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header alignwide">
                    <h1 class="entry-title">
                        <div class="container">
                            <div class="animate__animated animate__fadeInUp"><?php the_title(); ?></div>
                        </div>
                    </h1>
                    <?php
                    $banner_image = get_field('banner_single_image_blog', get_the_ID());
                    if ($banner_image) : ?>
                        <div class="animate__animated animate__fadeIn"
                             style="margin:0;">
                            <figure class="post-thumbnail">
                                <img src="<?= $banner_image ?>"
                                     class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                     alt="attachment-post-thumbnail" srcset="<?= $banner_image ?>"
                            </figure>
                        </div>
                    <?php else: ?>
                        <div class="animate__animated animate__fadeIn"
                             style="margin:0;"><?php twenty_twenty_one_post_thumbnail(); ?></div>
                    <?php endif; ?>

                </header><!-- .entry-header -->
                <?php
                $layoutSingle = get_field('choose_layout_single_vocano');
                if ($layoutSingle === '0'):?>
                    <div class="main-content wow animate__fadeIn">
                        <?php
                        $sectionIntro = get_field('section_introduction_single');
                        $introImage = $sectionIntro['colum_left']['image']['url'];
                        $introDes = $sectionIntro['colum_left']['description'];
                        $introColRight = $sectionIntro['colum_right'];
                        $settingAlignRow = $sectionIntro['setting_align_row'];
                        if ($introImage || $introDes || $introColRight): ?>
                            <div class="section-introduction">
                                <div class="container">
                                    <div class="row" style="align-items:<?= $settingAlignRow; ?>">
                                        <?php if ($introImage || $introDes): ?>
                                            <div class="col-md-6 col-sm-12 col-12 col-left wow animate__fadeInLeft">
                                                <?php
                                                if ($introImage) { ?>
                                                    <div class="content-img">
                                                        <img src="<?= $introImage; ?>" alt="<?= $introImage; ?>">
                                                    </div>
                                                <?php }
                                                ?>
                                                <div class="content-des"><?= $introDes; ?></div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($introColRight): ?>
                                            <div class="col-md-6 col-sm-12 col-12 col-right wow animate__fadeInRight">
                                                <div class="content-des">
                                                    <?= $introColRight; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        $sectionThreeColum = get_field('section_three_colum_single');
                        $threeColumLeft = $sectionThreeColum['left_image']['url'];
                        $bgImgColum = $sectionThreeColum['background_image']['url'];
                        $bgColor = $sectionThreeColum['background_color'];
                        $selectBG = $sectionThreeColum['choose_type_bg'];
                        if ($threeColumLeft):?>
                            <div class="section-three-colum wow animate__fadeIn">
                                <?php if ($selectBG === '0'): ?>
                                    <?php if ($bgImgColum): ?>
                                        <div class="bg-img-colum">
                                            <img src="<?= $bgImgColum; ?>" alt="<?= $bgImgColum; ?>">
                                        </div>
                                        <div class="image-shadow">
                                            <img src="<?= DF_IMAGE . '/Shadow.png'; ?>" alt="shadow">
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="bg-img-colum" style="background:<?= $bgColor; ?>"></div>
                                <?php endif; ?>
                                <div class="container">
                                    <div class="center-image">
                                        <?php if ($threeColumLeft): ?>
                                            <div class="cont-img">
                                                <img src="<?= $threeColumLeft; ?>" alt="<?= $threeColumLeft; ?>">
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        $sectionTwocolum = get_field('section_two_colum');
                        $bgFullWidth = get_field('background_image_full_width')['url'];
                        $sourceVideo = get_field('section_video_full_width');
                        $sectionMoreProject = get_field('section_more_project');
                        if ($sectionTwocolum):?>
                            <div class="section-two-colum">
                                <div class="container">
                                    <div class="row">
                                        <?php
                                        if ($sectionTwocolum) {
                                            foreach ($sectionTwocolum as $key1 => $item) {
                                                $img = $item['image']['url'];
                                                if ($img):?>
                                                    <div class="col-md-6 col-sm-12 col-cont wow animate__fadeInUP"
                                                         data-wow-delay="<?= $key1 / (count($sectionTwocolum)); ?>">
                                                        <div class="cont-img">
                                                            <img src="<?= $img; ?>" alt="<?= $img; ?>">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if ($bgFullWidth):?>
                            <div class="section-bg-image-full-width wow animate__fadeIn">
                                <div class="cont-img">
                                    <img src="<?= $bgFullWidth; ?>" alt="<?= $bgFullWidth; ?>">
                                </div>
                            </div>
                        <?php
                        endif;
                        if ($sourceVideo) { ?>
                            <div class="secction-video-full-width wow animate__fadeIn">
                                <?= $sourceVideo; ?>
                            </div>
                        <?php } ?>
                        <div class="section-more-project">
                            <div class="container">
                                <h2 class="wow animate__fadeInUp"><?= $sectionMoreProject['heading'] ?></h2>
                                <?php
                                $args = array(
                                    'post_status' => 'publish',
                                    'post_type' => $post_type,
                                    'post__not_in' => [$id_post],
                                    'posts_per_page' => -1
                                );
                                $posts = get_posts($args);
                                if ($posts):?>
                                    <div class="more-post-list">
                                        <?php
                                        foreach ($posts as $key => $post) {
                                            $id = $post->ID;
                                            $img = get_the_post_thumbnail_url($id);
                                            $ttl = get_the_title($id);
                                            ?>
                                            <div class="col-cont wow animate__fadeInUp"
                                                 data-wow-delay="<?= $key / 3; ?>s">
                                                <a href="<?= get_permalink($id); ?>">
                                                    <div class="cont-img">
                                                        <img src="<?= $img; ?>" alt="<?= $ttl ?>">
                                                        <div class="bg-movie">
                                                            <div class="group-move-text">
                                                                <div class="move-text">
                                                                    <div class="item"><?= $ttl; ?></div>
                                                                </div>
                                                                <div class="move-text">
                                                                    <div class="item"><?= $ttl; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="button-volcano" href="<?= get_permalink($id); ?>">
												<span class="arrow-line">
													<img width="15" src="<?= DF_IMAGE . '/arrow-line-right.png' ?>"
                                                         alt="icon arrow">
												</span>
                                                    <span class="text"><?= __('View More', 'volcano') ?></span>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div><!-- .entry-content -->
                <?php else: ?>
                    <div class="main-content wow animate__fadeIn">
                        <?php
                        $layout2Single = get_field('layout_bac_ha_captial_&_diamond');
                        $layout2Intro = $layout2Single['introduction'];
                        $layout2BGImgColor = $layout2Single['background_color_and_img'];
                        $layout2ContentImg = $layout2Single['colum_content'];
                        $sourceVideoTopL2 = $layout2Single['url_video_embed_top'];
                        $sourceVideoBottomL2 = $layout2Single['url_video_embed_bottom'];
                        $bgFullWidthRepeatL2 = $layout2Single['background_full_width_repeater'];
                        $bgAndColumImg = $layout2Single['background_img_and_colum_img'];
                        $rowContentImageL2 = $layout2ContentImg['row_content_image'];
                        $contentRowImageL2 = $layout2ContentImg['row_image_content'];
                        $bgFullWidthL2 = $layout2Single['background_full_width']['url'];
                        $threeColumLeftL2 = $layout2BGImgColor['image_object']['url'];
                        $bgImgColumL2 = $layout2BGImgColor['bg_image']['url'];
                        $bgColorL2 = $layout2BGImgColor['bg_color'];
                        $selectBGL2 = $layout2BGImgColor['choose_type_bg'];
                        if ($layout2Intro['logo_img'] || $layout2Intro['content']) {
                            ?>
                            <div class="section-introduction section-introduction-l2">
                                <?php if ($layout2Intro['logo_img']): ?>
                                    <div class="group-logo-ttl wow animate__fadeInUp">
                                        <div class="container">
                                            <div class="content-img logo-layout-2">
                                                <img src="<?= $layout2Intro['logo_img']['url']; ?>"
                                                     alt="<?= $layout2Intro['logo_img']['url']; ?>">
                                            </div>
                                            <div class="line-red"></div>
                                        </div>
                                        <div class="line-red-full"></div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($layout2Intro['content']): ?>
                                    <div class="content-des wow animate__fadeInUp">
                                        <?= $layout2Intro['content']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                        if ($threeColumLeftL2):?>
                            <div class="section-three-colum wow animate__fadeIn">
                                <?php if ($selectBGL2 === '1'): ?>
                                    <?php if ($bgImgColumL2): ?>
                                        <div class="bg-img-colum">
                                            <img src="<?= $bgImgColumL2; ?>" alt="<?= $bgImgColumL2; ?>">
                                        </div>
                                        <div class="image-shadow">
                                            <img src="<?= DF_IMAGE . '/Shadow.png'; ?>" alt="shadow">
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="bg-img-colum" style="background:<?= $bgColorL2; ?>"></div>
                                <?php endif; ?>
                                <div class="container">
                                    <div class="center-image">
                                        <?php if ($threeColumLeftL2): ?>
                                            <div class="cont-img">
                                                <img src="<?= $threeColumLeftL2; ?>" alt="<?= $threeColumLeftL2; ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if ($bgFullWidthL2):?>
                            <div class="section-bg-image-full-width wow animate__fadeInUp">
                                <div class="cont-img">
                                    <img src="<?= $bgFullWidthL2; ?>" alt="<?= $bgFullWidthL2; ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php
                        if ($layout2ContentImg['setting_colum'] === '1') {
                            if ($rowContentImageL2['col_content'] || $rowContentImageL2['col_image']['url']):?>
                                <section class="contentImg contentImgRight">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-12 wow animate__fadeInLeft">
                                            <div class="content">
                                                <?= $rowContentImageL2['col_content']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-12 wow animate__fadeInRight">
                                            <div class="cont-img">
                                                <img src="<?= $rowContentImageL2['col_image']['url']; ?>"
                                                     alt="<?= $rowContentImageL2['col_image']['alt'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php endif;
                        } else {
                            if ($contentRowImageL2['col_content'] || $contentRowImageL2['col_image']['url']):?>
                                <section class="contentImg contentImgLeft">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-12 wow animate__fadeInLeft">
                                            <div class="cont-img">
                                                <img src="<?= $contentRowImageL2['col_image']['url']; ?>"
                                                     alt="<?= $rowContentImageL2['col_image']['alt'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-12 wow animate__fadeInRight">
                                            <div class="content">
                                                <?= $contentRowImageL2['col_content']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php endif;
                        }
                        if ($bgAndColumImg['full_width_img']['url'] || $bgAndColumImg['list_image']):?>
                            <section class="bg-and-colum-img">
                                <div class="container">
                                    <?php if ($bgAndColumImg['full_width_img']['url']): ?>
                                        <div class="section-bg-image-full-width wow animate__fadeIn">
                                            <div class="cont-img">
                                                <img src="<?= $bgAndColumImg['full_width_img']['url']; ?>"
                                                     alt="<?= $bgAndColumImg['full_width_img']['alt']; ?>">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <?php foreach ($bgAndColumImg['list_image'] as $key => $itemImg):
                                            $imgColL2 = $itemImg['image']['url'];
                                            ?>
                                            <?php
                                            if ($imgColL2) {
                                                ?>
                                                <div class="col-lg-4 col-md-6 col-sm-12 col-12 wow animate__fadeInUp"
                                                     data-wow-delay="<?= $key / (count($bgAndColumImg['list_image'])); ?>">
                                                    <div class="cont-img">
                                                        <img src="<?= $imgColL2; ?>"
                                                             alt="<?= $itemImg['image']['alt'] ?>">
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </section>
                        <?php endif;
                        if ($sourceVideoTopL2):?>
                            <div class="secction-video-full-width wow animate__fadeIn">
                                <?= $sourceVideoTopL2; ?>
                            </div>
                        <?php endif;
                        if ($bgFullWidthRepeatL2):
                            foreach ($bgFullWidthRepeatL2 as $key => $bg):?>
                                <?php
                                if ($bg['background_img']['url']) {
                                    ?>
                                    <div class="section-bg-image-full-width wow animate__fadeIn"
                                         data-wow-delay="<?= $key / (count($bgFullWidthRepeatL2)); ?>">
                                        <div class="cont-img">
                                            <img src="<?= $bg['background_img']['url']; ?>"
                                                 alt="<?= $bg['background_img']['alt']; ?>">
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            <?php endforeach; ?>
                        <?php endif;
                        if ($sourceVideoBottomL2):?>
                            <div class="secction-video-full-width wow animate__fadeIn">
                                <?= $sourceVideoBottomL2; ?>
                            </div>
                        <?php endif; ?>
                        <div class="section-more-project">
                            <div class="container">
                                <h2 class="wow animate__fadeIn"><?= get_field('section_more_project')['heading'] ?></h2>
                                <?php
                                $args = array(
                                    'post_status' => 'publish',
                                    'post_type' => $post_type,
                                    'post__not_in' => [$id_post],
                                    'posts_per_page' => -1
                                );
                                $posts = get_posts($args);
                                if ($posts):?>
                                    <div class="more-post-list">
                                        <?php
                                        foreach ($posts as $key => $post) {
                                            $id = $post->ID;
                                            $img = (get_field('square_thumbnail_work')) ? get_field('square_thumbnail_work') : get_the_post_thumbnail_url($id);
                                            $ttl = get_the_title($id);
                                            ?>
                                            <div class="col-cont wow animate__fadeInUp"
                                                 data-wow-delay="<?= $key / 3; ?>s">
                                                <a href="<?= get_permalink($id); ?>">
                                                    <div class="cont-img">
                                                        <img src="<?= $img; ?>" alt="<?= $ttl ?>">
                                                        <div class="bg-movie">
                                                            <div class="group-move-text">
                                                                <div class="move-text">
                                                                    <div class="item"><?= $ttl; ?></div>
                                                                </div>
                                                                <div class="move-text">
                                                                    <div class="item"><?= $ttl; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="button-volcano" href="<?= get_permalink($id); ?>">
												<span class="arrow-line">
													<img width="15" src="<?= DF_IMAGE . '/arrow-line-right.png' ?>"
                                                         alt="icon arrow">
												</span>
                                                    <span class="text"><?= __('View More', 'volcano') ?></span>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <footer class="entry-footer default-max-width">
                    <?php twenty_twenty_one_entry_meta_footer(); ?>
                </footer><!-- .entry-footer -->

                <?php if (!is_singular('attachment')) : ?>
                    <?php get_template_part('template-parts/post/author-bio'); ?>
                <?php endif; ?>

            </article><!-- #post-<?php the_ID(); ?> -->
        <?php endwhile; // End of the loop.
        ?>
    </div>
<?php
get_footer();
