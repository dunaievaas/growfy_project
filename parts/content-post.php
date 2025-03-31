<?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
        <h1 class="page-title entry__title"><?php the_title(); ?></h1>
        <?php if (has_post_thumbnail()) : ?>
            <div title="<?php the_title_attribute(); ?>" class="entry__thumb d-flex justify-content-center pb-3">
                <?php the_post_thumbnail('large', ['class' => 'img-responsive']); ?>
            </div>
        <?php endif; ?>
        <div class="entry__content clearfix">
            <?php the_content('', true); ?>
        </div>
    </article>
<?php endwhile; ?>