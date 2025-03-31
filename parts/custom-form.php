<?php if ($custom_form = get_field('custom_form', 'option')): ?>
    <div class="footer__form form">
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
        echo $custom_form; ?>
    </div>
<?php endif; ?>