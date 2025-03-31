<!-- BEGIN SERVICES SECTION-->
<?php if ($featured_posts = get_sub_field('services_list')): ?>
    <section class="services <?php if ($custom_class = get_sub_field('services_class')): echo $custom_class;
                                endif; ?>"
        <?php if ($custom_id = get_sub_field('services_id')): ?>
        id="<?php echo $custom_id; ?>"
        <?php endif; ?>>
        <div class="services__container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="services__description" data-aos="zoom-in-up">
                        <?php if ($subtitle = get_sub_field('services_subtitle')): ?>
                            <h5 class="services__subtitle subtitle"><?php echo $subtitle; ?></h5>
                        <?php endif;
                        if ($content = get_sub_field('services_content')): ?>
                            <div class="services__content"><?php echo $content; ?></div>
                        <?php endif; ?>
                        <?php
                        if ($link = get_sub_field('services_link')): ?>
                            <a class="ervices__link main-button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>"><?php echo $link_title = $link['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <ul class="services__list list">
                        <?php foreach ($featured_posts as $post):
                            setup_postdata($post); ?>
                            <li class="list__item item" data-aos="flip-left">
                                <?php
                                if (has_post_thumbnail()):
                                    the_post_thumbnail('thumbnail', ['class' => 'services__image']);
                                endif;
                                if ($title = get_the_title()): ?>
                                    <h4 class="item__title"><?php echo $title; ?></h4>
                                <?php endif;
                                if (!empty(get_the_content())): ?>
                                    <div class="item__content">
                                        <?php the_content(); ?>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php wp_reset_postdata();
endif; ?>
<!-- END SERVICES SECTION-->