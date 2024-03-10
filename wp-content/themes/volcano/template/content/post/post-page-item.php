<div class="blog-post-item wow animate__fadeInUp">
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-12 col-cont">
            <div class="cont-img">
            <a href="<?= get_the_permalink() ?>" title="<?= get_the_title() ?>">
                <img src="<?= get_the_post_thumbnail_url() ?>" alt="post-thumbnail">
            </a>
            </div>
        </div>
        <div class="col-lg-8 col-md-7 col-sm-12 col-cont">
            <div class="cont-box">
                <div class="group-tag-date">
                    <!-- <div class="tag">New</div> -->
                    <div class="date">
                        <i class="fa fa-calendar"></i>
                        <span><?= get_the_date('d/m/Y') ?></span>
                    </div>
                </div>
                <div class="group-text">
                    <div class="title-post">
                        <a href="<?= get_the_permalink() ?>" title="<?= get_the_title() ?>">
                            <?= get_the_title() ?></a>
                    </div>
                    <div class="excerpt">
                        <?= wp_trim_words(get_the_content(),40) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>