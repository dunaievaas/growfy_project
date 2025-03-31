<!--BEGIN START SECTION-->
<?php if ($description = get_sub_field('start_description')): ?>
    <section class="start <?php if ($custom_class = get_sub_field('start_class')): echo $custom_class;
                            endif; ?>"
        <?php if ($custom_id = $custom_id = get_sub_field('start_id')): ?>
        id="<?php echo $custom_id; ?>"
        <?php endif; ?>>
        <div class="start__container">
            <div class="row">
                <div class="col-12">
                    <div class="start__wrapper d-flex justify-content-around flex-column flex-lg-row g-lg-0 gap-4 align-items-center"
                        data-aos="fade-down"
                        data-aos-easing="linear"
                        data-aos-duration="1200">
                        <div class="start__description">
                            <?php echo $description; ?>
                        </div>
                        <div class="start__link flex-column flex-md-row">
                            <?php if ($link = get_sub_field('link_to_services')): ?>
                                <a class="start__link--left main-button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>">
                                    <?php echo $link['title']; ?>
                                </a>
                            <?php endif;
                            if ($link = get_sub_field('link_to_contact_page')): ?>
                                <a class="start__link--right main-button" href="<?php echo $link['url']; ?>" target="<?php $link['target'] ? $link['target'] : '_self'; ?>">
                                    <?php echo $link['title'] ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!--END START SECTION-->