<?php if ($garvity_form = get_field('gravity_form', 'options')): ?>
<div class="footer__form form d-flex flex-column">
    <?php if ($form_title = get_field('form_title', 'options')): ?>
        <h4 class="form__title">
            <?php echo $form_title; ?>
        </h4>
    <?php endif; 
    if ($description = get_field('form_description', 'options')): ?>
        <p class="form__description">
            <?php echo $description; ?>
        </p>
    <?php endif; 
    echo do_shortcode($garvity_form); ?>
</div>
<?php endif; ?>