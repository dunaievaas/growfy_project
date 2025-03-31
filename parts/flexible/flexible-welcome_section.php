<!--    BEGIN WELCOME SECTION-->
<section class="welcome <?php if ($custom_class = get_sub_field('welcome_class')): echo $custom_class;
                        endif; ?>"
    <?php if ($custom_id = get_sub_field('welcome_id')): ?>
    id="<?php echo $custom_id; ?>"
    <?php endif; ?>>
    <div class="welcome__container">
        <div class="row gap-lg-0 gap-5">
            <div class="col-lg-6 col-12">
                <div class="welcome__entry entry" data-aos="zoom-out-right">
                    <?php if ($text_summary = get_sub_field('welcome_text')): ?>
                        <div class="entry__text">
                            <?php echo $text_summary; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row entry__links gap-sm-0 gap-2">
                        <?php if ($link = get_sub_field('link_to_services')): ?>
                            <div class="col-sm-6 col-12">
                                <a class="link__services main-button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] ? $link['terget'] : '_self' ?>">
                                    <?php echo $link['title']; ?>
                                </a>
                            </div>
                        <?php endif;
                        if ($link = get_sub_field('link_to_contact_page')): ?>
                            <div class="col-sm-6 col-12">
                                <a class="link__contact  main-button" href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ? $link['target'] : '_self' ?>">
                                    <?php echo $link['title']; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($images = get_sub_field('welcome_gallery')): ?>
                <div class="col-lg-6 col-12">
                    <div class="welcome__gallery gallery">
                        <?php foreach ($images as $image): ?>
                            <div class="gallery__columns" data-aos="zoom-out-left">
                                <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--    END WELCOME SECTION-->