<?php

/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>
<main class="main-content">
    <section class="not-found">
        <div class="not-found__container">
            <div class="row">
                <div class="col-12">
                    <h1><?php _e('404: Page Not Found', 'default'); ?></h1>
                    <h3><?php _e('Keep on looking...', 'default'); ?></h3>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>