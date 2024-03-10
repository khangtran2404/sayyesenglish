<?php
/* Template Name: Contact template */

get_header();
$id_page = get_queried_object()->ID;?>
    <div class="template-contact">

        <!-- Start banner section -->
        <div class="banner-contact-page">
            <?php
            $banner = get_field('banner_group_contact',$id_page);
            $img = $banner['banner_image'];
            $text_1 = $banner['banner_text_1'];
            $text_2 = $banner['banner_text_2'];
            if( $banner ): ?>
                <div id="banner-contact-page" class="banner-contact-page">
                    <div class="banner-contact" style="background-image: url('<?= $img; ?>')">
                        <div class="container">
                            <div class="group-content">
                                <div class="content">
                                    <div class="heading animate__animated animate__fadeInDown"><?= $text_1;?></div>
                                    <div class="heading animate__animated animate__fadeInUp"><?= $text_2;?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- End banner section  -->
        <div class="section-title">
            <div class="container">
                <div class="box-magic-title animate__animated animate__fadeInUp animate__delay-1s">
                    <h2>
                        <?= get_field('title_contact_page', $id_page); ?>
                    </h2>
                </div>
            </div>
        </div>
        <!-- Start content section -->
        <div class="container">
            <div class="content-contact-page row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-left">
                    <?php
                    $content_group = get_field('content_group_contact');
                    if ($content_group) : ?>
                        <div class="title-contact wow animate__fadeInUp"><?= $content_group['title'] ?></div>
                        <div class="information-group">
                            <div class="address">
                                <div class="title wow animate__fadeInUp" data-wow-delay=".2s"><?= __('Address','volcano') ?></div>
                                <div class="content wow animate__fadeInUp" data-wow-delay=".4s">
                                    <img class="icon icon-location" src="<?= DF_IMAGE.'/location-icon-01.png';?>" alt="icon-location">
                                    <?= $content_group['information_group']['address'] ?></div>
                            </div>
                            <div class="phone-email">
                                <div class="title wow animate__fadeInUp" data-wow-delay=".6s"><?= __('Hotline & Email','volcano') ?></div>
                                <div class="phone wow animate__fadeInUp" data-wow-delay=".8s">
                                    <?php
                                        $phone = $content_group['information_group']['hotline'];
                                        $delete = array(
                                            ' ', '(', ')', '+', '-', '$', '#', '!', '@', '~', '`', '|', '{', '}', '*', '&', '^', '%', '_', '?', '/', '>',
                                            '<', '.', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
                                            'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
                                            'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ấ', 'ẩ', 'ầ', 'ẫ', 'ậ', 'ă',
                                            'ắ', 'ằ', 'ẵ', 'ặ', 'ẳ', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ',
                                            'é', 'è', 'ẻ', 'ẹ', 'ê', 'ế', 'ề', 'ễ', 'ệ', 'ể', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ấ', 'Ẩ', 'Ầ', 'Ẫ', 'Ậ', 'Ă',
                                            'Ắ', 'Ằ', 'Ẵ', 'Ặ', 'Ẳ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ',
                                            'É', 'È', 'Ẻ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ễ', 'Ệ', 'Ể'
                                        );
                                        $delete_1 = array(
                                            '-', '$', '#', '!', '@', '~', '`', '|', '{', '}', '*', '&', '^', '%', '_', '?', '/', '>', '<', '.', 'a', 'b',
                                            'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x',
                                            'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
                                            'U', 'V', 'W', 'X', 'Y', 'Z', 'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ấ', 'ẩ', 'ầ', 'ẫ', 'ậ', 'ă', 'ắ', 'ằ', 'ẵ', 'ặ',
                                            'ẳ', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'é', 'è', 'ẻ', 'ẹ',
                                            'ê', 'ế', 'ề', 'ễ', 'ệ', 'ể', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ấ', 'Ẩ', 'Ầ', 'Ẫ', 'Ậ', 'Ă', 'Ắ', 'Ằ', 'Ẵ', 'Ặ',
                                            'Ẳ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'É', 'È', 'Ẻ', 'Ẹ',
                                            'Ê', 'Ế', 'Ề', 'Ễ', 'Ệ', 'Ể'
                                        );
                                    ?>
                                    <a href="tel:+<?= str_replace($delete, '', $phone); ?>">
                                        <img class="icon" src="<?= DF_IMAGE.'/phone-icon-01.png';?>" alt="icon-phone"><?= str_replace($delete_1, '', $phone); ?>
                                    </a>
                                </div>
                                <div class="email wow animate__fadeInUp" data-wow-delay="1s">
                                    <a href="mailto:<?= $content_group['information_group']['email'] ?>">
                                        <img class="icon" src="<?= DF_IMAGE.'/email-icon-01.png';?>" alt="icon-email"><?= $content_group['information_group']['email'] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-right wow animate__fadeInUp" data-wow-delay="2s">
                    <?php
                    $shortcode_form = $content_group['contact_form_shortcode'];
                    echo do_shortcode($shortcode_form);
                    ?>
                </div>
            </div>
        </div>
        <!-- End content section  -->

    </div>
<?php get_footer();