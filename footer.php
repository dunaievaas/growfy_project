<footer class="footer">
    <div class="footer__container">
        <div class="row gap-3 gap-lg-0 text-center text-lg-start">
            <div class="col-12 col-lg-4">
                <div class="footer__info d-flex gap-4 flex-column">
                    <?php if ($logo = get_custom_logo()): ?>
                        <div class="footer__logo logo">
                            <?php echo $logo; ?>
                        </div>
                    <?php endif;
                    if ($text = get_field('footer_text', 'options')): ?>
                        <p class="footer__description">
                            <?php echo $text; ?>
                        </p>
                    <?php endif;
                    if (have_rows('social_icons', 'options')): ?>
                        <ul class="footer__network network d-flex justify-content-center justify-content-lg-start">
                            <?php while (have_rows('social_icons', 'options')) : the_row();
                                if ($link = get_sub_field('social_link')): ?>
                                    <li class="network__item item">
                                        <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ? $link['target'] : '_self' ?>">
                                            <?php if ($icon = get_sub_field('social_network')): ?>
                                                <i class="fa-brands fa-<?php echo $icon; ?>"></i>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (have_rows('footer_navigation', 'options')): ?>
                <div class="col-12 col-lg-4">
                    <div class="footer__navigation navigation">
                        <div class="row gap-3 gap-lg-0 justify-content-center">
                            <?php while (have_rows('footer_navigation', 'options')): the_row(); ?>
                                <?php if ($title = get_sub_field('navigation_title')): ?>
                                    <div class="col-12 col-lg-5">
                                        <h4 class="navigation__title">
                                            <?php echo $title; ?>
                                        </h4>
                                        <?php if (have_rows('navigation_wrapper', 'options')): ?>
                                            <div class="navigation__wrapper wrapper d-flex flex-column">
                                                <?php while (have_rows('navigation_wrapper', 'options')): the_row(); ?>
                                                    <?php if ($link = get_sub_field('navigation_link')): ?>
                                                        <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>">
                                                            <?php echo $link['title']; ?>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-12 col-lg-4">
                <?php
                $toggle = get_field('toggle_of_form', 'options');
                $garvity_form = get_field('gravity_form', 'options');
                if ($garvity_form && $toggle === true) :  ?>
                    <?php get_template_part('parts/gravity', 'form'); ?>
                <?php else:
                    get_template_part('parts/custom', 'form'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>