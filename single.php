<?php

/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>
<main class="main-content">
    <div class="single__container">
        <div class="row">
            <!-- BEGIN of post content -->
            <div class="col-12">
                <?php if (have_posts()) :
                    get_template_part('parts/content', 'post'); ?>
                <?php endif; ?>
            </div>
            <!-- END of post content -->
        </div>
    </div>
</main>

<?php get_footer(); ?>