<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleti Empregos</title>
    <?php wp_head() ?>
</head>
<body>
    
    <header class="header">
        <div class="container content_header">
            <div class="col_header logo_header">
                <?php the_custom_logo(); ?>
            </div>

            <div class="col_header d-flex align-center col_menu">
                <nav class="menu col_header d-flex justify-center">
                    <div class="head_mobile">
                        <div class="logo_mobile">
                            <?php the_custom_logo(); ?>
                        </div>

                        <div class="right_header">
                            <span class="close_menu">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/btn-close.png" alt="">
                            </span>
                        </div>
                    </div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'primary-menu',
                        'container' => 'ul',
                    ));
                    ?>
                </nav>

                <div class="btn_menu">
                    <div class="rec"></div>
                    <div class="rec"></div>
                    <div class="rec"></div>
                </div>
            </div>

            <div class="right_header col_header d-flex justify-end align-center">
                <a href="" class="btn-default">Ver Vagas</a>
            </div>
        </div>
    </header>