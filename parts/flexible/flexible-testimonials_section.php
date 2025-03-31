<!-- BEGIN TESTIMONIALS SECTION-->
<section class="testimonials <?php if ($custom_class = get_sub_field('testimonials_class')): echo $custom_class;
                                endif; ?>"
    <?php if ($custom_id = get_sub_field('testimonials_id')): ?>
    id="<?php echo $custom_id; ?>"
    <?php endif; ?>>
    <div class="testimonials__container">
        <?php if ($content = get_sub_field('testimonials_content')): ?>
            <div class="row gap-3 gap-lg-0">
                <div class="col-12 col-lg-7">
                    <div class="testimonials__description">
                        <?php if ($subtitle = get_sub_field('testimonials_subtitle')): ?>
                            <h4 class="testimonials__subtitle subtitle">
                                <?php echo $subtitle; ?>
                            </h4>
                        <?php endif; ?>
                        <div class="testimonials__text">
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
                <?php if ($link = get_sub_field('link_contact_page')): ?>
                    <div class="col-12 col-lg-5">
                        <div class="testimonials__link justify-content-lg-end">
                            <a class="main-button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>">
                                <?php echo $link_title = $link['title']; ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ($featured_posts = get_sub_field('testimonials')): ?>
            <div class="blaze-slider-testimonials">
                <div class="blaze-container">
                    <div class="blaze-track-container">
                        <ul class="blaze-track testimonials__list list">
                            <?php foreach ($featured_posts as $post):
                                setup_postdata($post); ?>
                                <li class="list__card blaze__slide">
                                    <div class="card__profile profile">
                                        <?php if (has_post_thumbnail()):
                                            the_post_thumbnail('thumbnail', ['class' => 'profile__image']);
                                        endif; ?>
                                        <div class="profile__info">
                                            <?php if ($title = get_the_title()): ?>
                                                <h4 class="profile__title"><?php echo $title; ?></h4>
                                            <?php endif;
                                            if ($company_name = get_field('company_name')):  ?>
                                                <p class="profile__company-name"><?php echo $company_name; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if ($text = get_field('testimonial_text')): ?>
                                        <div class="card__text">
                                            <?php echo $text; ?>
                                            <?php if ($range = get_field('testimonials_rage')): ?>
                                                <div class="card__range">
                                                    <?php for ($i = 1; $i <= $range; $i++): ?>
                                                        <?php display_svg(get_template_directory_uri() . '/build/images/star.svg'); ?>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <div class="button-structure">
                        <button class="blaze-prev" aria-label="Go to previous slide"></button>
                        <div class="blaze-pagination"></div>
                        <button class="blaze-next" aria-label="Go to next slide"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<!--BEGIN  TESTIMONIALS SECTION-->