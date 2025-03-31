<!--    BEGIN CUSTOMERS SECTION-->
<?php if ($featured_posts = get_sub_field('customers_list')):  ?>
    <section class="customers <?php if ($custom_class = get_sub_field('customers_class')): echo $custom_class; endif; ?>"
    <?php if ($custom_id = get_sub_field('customers_id')): ?>
        id="<?php echo $custom_id; ?>"
    <?php endif; ?>>
        <div class="customers__container">
            <div class="row">
                <div class="col-12 justify-content-center">
                    <?php if ($title = get_sub_field('customers_title')): ?>
                        <h4 class="customers__title text-center"><?php echo $title; ?></h4>
                    <?php endif; ?>
                    <div class="blaze-slider">
                        <div class="blaze-container">
                            <div class="blaze-track-container">
                                <ul class="blaze-track customers__list list">
                                    <?php foreach( $featured_posts as $post ): 
                                        setup_postdata($post); ?>
                                        <li class="blaze__slide list__item">
                                            <?php if(has_post_thumbnail()): ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php echo get_the_post_thumbnail( get_the_ID(), 'medium', array('class'=>'info-author__image')); ?>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
    wp_reset_postdata(); ?>
<?php endif; ?>
<!--    END CUSTOMERS SECTION-->