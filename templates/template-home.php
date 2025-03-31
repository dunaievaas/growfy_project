<?php
/*
Template Name: Home Page
Template Post Type: page
*/
get_header(); ?>
<main class="main-content">
    <?php if (have_rows('content_module')): ?>
        <?php while (have_rows('content_module')): the_row(); ?>
            <?php get_template_part('parts/flexible/flexible', get_row_layout()); // Flexible content row 
            ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>