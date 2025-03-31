<!--    BEGIN  BLOG SECTION-->
<?php $arg = [
    'post_type' => 'post',
    'orderby'   => 'date',
];

$the_query = new WP_Query($arg);

if ($the_query->have_posts()) : ?>
    <section class="blog <?php if ($custon_class = get_sub_field('blog_class')): echo $custon_class;
                            endif; ?>"
        <?php if ($custom_id = get_sub_field('blog_id')): ?>
        id="<?php echo $custom_id; ?>"
        <?php endif; ?>>
        <div class="blog__container">
            <?php if ($description = get_sub_field('blog_description')): ?>
                <div class="row gap-3 gap-lg-0">
                    <div class="col-12 col-lg-7">
                        <div class="blog__description">
                            <?php if ($subtitle = get_sub_field('blog_subtitle')): ?>
                                <h4 class="blog__subtitle subtitle"><?php echo $subtitle; ?></h4>
                            <?php endif; ?>
                            <div class="blog__text">
                                <?php echo $description; ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($link = get_sub_field('blog_page')): ?>
                        <div class="col-12 col-lg-5">
                            <div class="blog__link justify-content-lg-end d-flex align-items-lg-end">
                                <a class="main-button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>">
                                    <?php echo $link_title = $link['title']; ?>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="row gap-3 gap-lg-0">
                <?php while ($the_query->have_posts()) :
                    $the_query->the_post(); ?>
                    <div class="col-12 col-lg-4">
                        <div class="blog__post post" data-aos="flip-left"
                            data-aos-easing="ease-out-cubic"
                            data-aos-duration="1000">
                            <div class="post__info info">
                                <?php if (has_post_thumbnail()):
                                    the_post_thumbnail('thubnail', array('class' => 'img-responsive info__image'));
                                endif;
                                if (has_category()):
                                    $category = get_the_category(); ?>
                                    <p class="info__category">
                                        <?php echo $category[0]->cat_name; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="post__description">
                                <?php if ($date = get_the_date()): ?>
                                    <span class="post__date">
                                        <?php echo $date; ?>
                                    </span>
                                <?php endif; ?>
                                <h5 class="post__title">
                                    <?php the_title() ?>
                                </h5>
                                <?php
                                if (has_excerpt()):
                                    the_excerpt();
                                endif; ?>
                            </div>
                            <a class="post__link" href="<?php the_permalink(); ?>">
                                <?php _e('Read now', 'growfy') ?>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif;
wp_reset_postdata(); ?>
<!--    BEGIN BLOG SECTION-->