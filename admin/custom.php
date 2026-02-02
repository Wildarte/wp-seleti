<?php


// Adiciona a configuração e o controle de personalização para o logotipo do rodapé
function my_customizer_settings($wp_customize) {
    // Adiciona uma seção para o logotipo do rodapé
    $wp_customize->add_section('footer_logo_section', array(
        'title'       => __('Footer Logo', 'my-theme'),
        'description' => __('Upload a logo for the footer', 'my-theme'),
        'priority'    => 30,
    ));

    // Adiciona a configuração para o logotipo do rodapé
    $wp_customize->add_setting('footer_logo', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    ));

    // Adiciona o controle para o logotipo do rodapé
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
        'label'    => __('Footer Logo', 'my-theme'),
        'section'  => 'footer_logo_section',
        'mime_type' => 'image',
    )));
}
add_action('customize_register', 'my_customizer_settings');

// Exibe o logotipo do rodapé no template
function my_footer_logo() {
    $footer_logo_id = get_theme_mod('footer_logo');
    if ($footer_logo_id) {
        $footer_logo_url = wp_get_attachment_image_url($footer_logo_id, 'full');
        echo '<a href="'.home_url().'" class="footer-logo"><img src="' . esc_url($footer_logo_url) . '" alt="' . get_bloginfo('name') . '"></a>';
    }
}
?>
