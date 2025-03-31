<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title><?php echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="header__container">
            <div class="navigate">
                <div class="row no-gutters align-items-center">
                    <div class="col-6 d-none d-lg-block">
                        <div class="logo">
                            <?php echo get_custom_logo(); ?>
                        </div>
                    </div>
                    <?php if (has_nav_menu('header_menu')) : ?>
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-8 d-lg-none">
                                    <div class="logo mobile-only">
                                        <?php echo get_custom_logo(); ?>
                                    </div>
                                </div>
                                <div class="col-4 d-lg-none d-flex justify-content-end">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                </div>
                                <nav class="navbar navbar-expand-lg navbar-light">
                                    <div class="container-fluid">
                                        <div class="collapse justify-content-end navbar-collapse" id="navbarSupportedContent">
                                            <?php wp_nav_menu(array(
                                                'theme_location'  => 'header_menu',
                                                'depth'           => 2,
                                                'container'       => false,
                                                'container_class' => false,
                                                'container_id'    => false,
                                                'menu_class'      => 'navbar-nav mr-auto',
                                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                                'walker'          => new WP_Bootstrap_Navwalker(),
                                            ));
                                            if ($link = get_field('header_link_start', 'options')): ?>
                                                <a class="header__link-start main-button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>">
                                                    <?php echo $link['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>