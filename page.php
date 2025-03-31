<?php

/**
 * Page (для всіх сторінок)
 */
get_header(); ?>

<main class="main-content">
    <div class="page__container">
        <!--    BEGIN HERO SECTION-->
        <section class="page-heading bg-cover" <?php if (has_post_thumbnail()): ?>
            style="background-image: url('<?php the_post_thumbnail_url(); ?>');"
            <?php endif; ?>>
            <h1 class="page-title"><?php the_title(); ?></h1>
        </section>
        <!--    END HERO SECTION-->
        <div class="row">
            <!-- BEGIN of page content -->
            <div class="col-12">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article <?php post_class('entry'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div title="<?php the_title_attribute(); ?>" class="entry__thumb">
                                </div>
                            <?php endif; ?>
                            <div class="entry__content pb-5">
                                <?php the_content('', true); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- END of page content -->
        </div>
    </div>
</main>

<?php get_footer(); ?>