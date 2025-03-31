<!--    BEGIN CHOOSE US SECTION-->
<section class="choose-us <?php if ($custom_class = get_sub_field('choose_us_class')): echo $custom_class;
                            endif; ?>"
    <?php if ($custom_id = get_sub_field('choose_us_id')): ?>
    id="<?php echo $custom_id; ?>"
    <?php endif; ?>>
    <div class="choose-us__container">
        <div class="row">
            <?php if ($images = get_sub_field('choose_us_gallery')): ?>
                <div class="col-lg-6 col-12">
                    <div class="choose-us__gallery gallery" data-aos="zoom-out-right">
                        <?php foreach ($images as $image): ?>
                            <div class="gallery__columns">
                                <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </div><!-- END of .columns-->
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif;
            if ($choose_us_content = get_sub_field('choose_us_content')): ?>
                <div class="col-lg-6 col-12">
                    <div class="choose-us__description" data-aos="zoom-out-left">
                        <?php if ($subtitle = get_sub_field('choose_us_subtitle')): ?>
                            <h5 class="choose-us__subtitle subtitle"><?php echo $subtitle; ?></h5>
                        <?php endif; ?>
                        <div class="choose-us__content">
                            <?php echo $choose_us_content; ?>
                        </div>
                        <?php
                        if (have_rows('choose_us_checkbox')): ?>
                            <ul class="choose-us__list list">
                                <?php while (have_rows('choose_us_checkbox')) : the_row();
                                    $sub_value = get_sub_field('checkbox_item'); ?>
                                    <li class="list__item"><?php echo $sub_value; ?></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if (have_rows('choose_us_statistics')): ?>
                <div class="col-12 col-lg-7">
                    <div class="row">
                        <?php while (have_rows('choose_us_statistics')): the_row();
                            $title = get_sub_field('statistics_title');
                            $text  = get_sub_field('statistics_description'); ?>
                            <div class=" col-12 col-sm-6">
                                <div class="choose-us__statistics statistics" data-aos="flip-left">
                                    <h3 class="statistics__title"><?php echo $title; ?></h3>
                                    <p class="statistics__description"><?php echo $text; ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif;
            if ($image = get_sub_field('choose_us_image')): ?>
                <div class="col-12 col-lg-5" data-aos="zoom-out">
                    <?php echo wp_get_attachment_image($image, 'full', false, ['class' => 'choose-us__image img-responsive']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--    END CHOOSE US SECTION-->