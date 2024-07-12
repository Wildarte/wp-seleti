<?php
// Adiciona suporte a várias funcionalidades do tema
function my_theme_setup() {
    // Adiciona suporte a thumbnails
    add_theme_support('post-thumbnails');
    
    // Adiciona suporte a título dinâmico
    add_theme_support('title-tag');

    // Adiciona suporte a logotipo customizado
    add_theme_support('custom-logo');

    // Registra um menu de navegação
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-theme'),
    ));

    // Adiciona suporte a formatos de post
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
}
add_action('after_setup_theme', 'my_theme_setup');

// Enfileira scripts e estilos
function my_theme_scripts() {
    // Enfileira o estilo principal
    wp_enqueue_style('style-reset', get_template_directory_uri().'/assets/css/reset.css', [], '1.0', false);
    wp_enqueue_style('style-style', get_template_directory_uri().'/assets/css/style.css', [], '1.0', false);

    // Enfileira um script JavaScript (exemplo)
    wp_enqueue_script('custom-script', get_template_directory_uri() . 'assets/js/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

// Registra áreas de widgets
function my_theme_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'my-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Adicione widgets aqui.', 'my-theme'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer', 'my-theme'),
        'id'            => 'footer-1',
        'description'   => __('Adicione widgets de rodapé aqui.', 'my-theme'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'my_theme_widgets_init');

// Customiza o logotipo da tela de login
function my_theme_custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a {
            background-image: url(' . get_template_directory_uri() . '/images/custom-logo.png);
            background-size: contain;
            width: 100%;
            height: 80px;
        }
    </style>';
}
add_action('login_enqueue_scripts', 'my_theme_custom_login_logo');

// Altera o URL do logotipo da tela de login
function my_theme_custom_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'my_theme_custom_login_logo_url');

// Altera o título do logotipo da tela de login
function my_theme_custom_login_logo_url_title() {
    return 'Bem-vindo ao Meu Site';
}
add_filter('login_headertitle', 'my_theme_custom_login_logo_url_title');

require('admin/custom.php');

?>
