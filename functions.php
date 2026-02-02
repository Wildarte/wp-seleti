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

// Registra o CPT de Vagas
function seleti_register_cpt_vaga() {
    $labels = [
        'name' => __('Vagas', 'my-theme'),
        'singular_name' => __('Vaga', 'my-theme'),
        'add_new' => __('Adicionar nova', 'my-theme'),
        'add_new_item' => __('Adicionar nova vaga', 'my-theme'),
        'edit_item' => __('Editar vaga', 'my-theme'),
        'new_item' => __('Nova vaga', 'my-theme'),
        'view_item' => __('Ver vaga', 'my-theme'),
        'search_items' => __('Buscar vagas', 'my-theme'),
        'not_found' => __('Nenhuma vaga encontrada', 'my-theme'),
        'not_found_in_trash' => __('Nenhuma vaga encontrada na lixeira', 'my-theme'),
        'all_items' => __('Todas as vagas', 'my-theme'),
        'menu_name' => __('Vagas', 'my-theme'),
    ];

    register_post_type('vaga', [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'vagas'],
        'menu_icon' => 'dashicons-id',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'seleti_register_cpt_vaga');

// Taxonomias para Vagas
function seleti_register_vaga_taxonomies() {
    $area_labels = [
        'name' => __('Áreas', 'my-theme'),
        'singular_name' => __('Área', 'my-theme'),
        'search_items' => __('Buscar áreas', 'my-theme'),
        'all_items' => __('Todas as áreas', 'my-theme'),
        'edit_item' => __('Editar área', 'my-theme'),
        'update_item' => __('Atualizar área', 'my-theme'),
        'add_new_item' => __('Adicionar nova área', 'my-theme'),
        'new_item_name' => __('Nome da nova área', 'my-theme'),
        'menu_name' => __('Áreas', 'my-theme'),
    ];

    register_taxonomy('area', ['vaga'], [
        'labels' => $area_labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'areas'],
    ]);

    $cidade_labels = [
        'name' => __('Cidades', 'my-theme'),
        'singular_name' => __('Cidade', 'my-theme'),
        'search_items' => __('Buscar cidades', 'my-theme'),
        'all_items' => __('Todas as cidades', 'my-theme'),
        'edit_item' => __('Editar cidade', 'my-theme'),
        'update_item' => __('Atualizar cidade', 'my-theme'),
        'add_new_item' => __('Adicionar nova cidade', 'my-theme'),
        'new_item_name' => __('Nome da nova cidade', 'my-theme'),
        'menu_name' => __('Cidades', 'my-theme'),
    ];

    register_taxonomy('cidade', ['vaga'], [
        'labels' => $cidade_labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'cidades'],
    ]);

    $tipo_contrato_labels = [
        'name' => __('Tipos de Contrato', 'my-theme'),
        'singular_name' => __('Tipo de Contrato', 'my-theme'),
        'search_items' => __('Buscar tipos de contrato', 'my-theme'),
        'all_items' => __('Todos os tipos de contrato', 'my-theme'),
        'edit_item' => __('Editar tipo de contrato', 'my-theme'),
        'update_item' => __('Atualizar tipo de contrato', 'my-theme'),
        'add_new_item' => __('Adicionar novo tipo de contrato', 'my-theme'),
        'new_item_name' => __('Nome do novo tipo de contrato', 'my-theme'),
        'menu_name' => __('Tipos de Contrato', 'my-theme'),
    ];

    register_taxonomy('tipo_contrato', ['vaga'], [
        'labels' => $tipo_contrato_labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'tipos-contrato'],
    ]);

    $nivel_labels = [
        'name' => __('Níveis', 'my-theme'),
        'singular_name' => __('Nível', 'my-theme'),
        'search_items' => __('Buscar níveis', 'my-theme'),
        'all_items' => __('Todos os níveis', 'my-theme'),
        'edit_item' => __('Editar nível', 'my-theme'),
        'update_item' => __('Atualizar nível', 'my-theme'),
        'add_new_item' => __('Adicionar novo nível', 'my-theme'),
        'new_item_name' => __('Nome do novo nível', 'my-theme'),
        'menu_name' => __('Níveis', 'my-theme'),
    ];

    register_taxonomy('nivel', ['vaga'], [
        'labels' => $nivel_labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'niveis'],
    ]);

    $beneficio_labels = [
        'name' => __('Benefícios', 'my-theme'),
        'singular_name' => __('Benefício', 'my-theme'),
        'search_items' => __('Buscar benefícios', 'my-theme'),
        'all_items' => __('Todos os benefícios', 'my-theme'),
        'edit_item' => __('Editar benefício', 'my-theme'),
        'update_item' => __('Atualizar benefício', 'my-theme'),
        'add_new_item' => __('Adicionar novo benefício', 'my-theme'),
        'new_item_name' => __('Nome do novo benefício', 'my-theme'),
        'menu_name' => __('Benefícios', 'my-theme'),
    ];

    register_taxonomy('beneficio', ['vaga'], [
        'labels' => $beneficio_labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'beneficios'],
    ]);
}
add_action('init', 'seleti_register_vaga_taxonomies');

// Campo de imagem para a taxonomia "Área"
function seleti_area_add_image_field($taxonomy) {
    wp_nonce_field('seleti_area_image', 'seleti_area_image_nonce');
    ?>
    <div class="form-field term-group">
        <label for="seleti_area_image_id"><?php esc_html_e('Imagem da Área', 'my-theme'); ?></label>
        <input type="hidden" id="seleti_area_image_id" name="seleti_area_image_id" value="">
        <div id="seleti_area_image_preview" style="margin:10px 0;"></div>
        <button type="button" class="button seleti-area-image-upload"><?php esc_html_e('Selecionar imagem', 'my-theme'); ?></button>
        <button type="button" class="button seleti-area-image-remove"><?php esc_html_e('Remover imagem', 'my-theme'); ?></button>
    </div>
    <?php
}
add_action('area_add_form_fields', 'seleti_area_add_image_field', 10, 1);

function seleti_area_edit_image_field($term, $taxonomy) {
    $image_id = (int) get_term_meta($term->term_id, 'area_image_id', true);
    $image_html = $image_id ? wp_get_attachment_image($image_id, 'thumbnail') : '';
    wp_nonce_field('seleti_area_image', 'seleti_area_image_nonce');
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="seleti_area_image_id"><?php esc_html_e('Imagem da Área', 'my-theme'); ?></label></th>
        <td>
            <input type="hidden" id="seleti_area_image_id" name="seleti_area_image_id" value="<?php echo esc_attr($image_id); ?>">
            <div id="seleti_area_image_preview" style="margin:10px 0;"><?php echo $image_html; ?></div>
            <button type="button" class="button seleti-area-image-upload"><?php esc_html_e('Selecionar imagem', 'my-theme'); ?></button>
            <button type="button" class="button seleti-area-image-remove"><?php esc_html_e('Remover imagem', 'my-theme'); ?></button>
        </td>
    </tr>
    <?php
}
add_action('area_edit_form_fields', 'seleti_area_edit_image_field', 10, 2);

function seleti_area_save_image($term_id) {
    if (!isset($_POST['seleti_area_image_nonce']) || !wp_verify_nonce($_POST['seleti_area_image_nonce'], 'seleti_area_image')) {
        return;
    }

    if (isset($_POST['seleti_area_image_id'])) {
        $image_id = (int) $_POST['seleti_area_image_id'];
        if ($image_id > 0) {
            update_term_meta($term_id, 'area_image_id', $image_id);
        } else {
            delete_term_meta($term_id, 'area_image_id');
        }
    }
}
add_action('created_area', 'seleti_area_save_image', 10, 1);
add_action('edited_area', 'seleti_area_save_image', 10, 1);

function seleti_area_media_admin_enqueue($hook) {
    if ($hook !== 'edit-tags.php' && $hook !== 'term.php') {
        return;
    }
    if (empty($_GET['taxonomy']) || $_GET['taxonomy'] !== 'area') {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script(
        'seleti-area-term-media',
        get_template_directory_uri() . '/assets/js/area-term-media.js',
        ['jquery'],
        '1.0',
        true
    );
}
add_action('admin_enqueue_scripts', 'seleti_area_media_admin_enqueue');

// Enfileira scripts e estilos
function my_theme_scripts() {
    // Enfileira o estilo principal
    wp_enqueue_style('style-reset', get_template_directory_uri().'/assets/css/reset.css', [], '1.0', false);
    wp_enqueue_style('style-style', get_template_directory_uri().'/assets/css/style.css', [], '1.0', false);

    // Enfileira um script JavaScript (exemplo)
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
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

// Meta box para campos personalizados de Vaga (Local e Modalidade)
function seleti_add_vaga_meta_box() {
    add_meta_box(
        'seleti_vaga_meta',
        __('Detalhes da Vaga', 'my-theme'),
        'seleti_render_vaga_meta_box',
        'vaga',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'seleti_add_vaga_meta_box');

function seleti_render_vaga_meta_box($post) {
    wp_nonce_field('seleti_save_vaga_meta', 'seleti_vaga_meta_nonce');

    $local = get_post_meta($post->ID, 'local', true);
    $modalidade = get_post_meta($post->ID, 'modalidade', true);
    $salario = get_post_meta($post->ID, 'salario', true);
    $carga_horaria = get_post_meta($post->ID, 'carga_horaria', true);
    $turno = get_post_meta($post->ID, 'turno', true);
    $data_limite = get_post_meta($post->ID, 'data_limite', true);
    $link_candidatura = get_post_meta($post->ID, 'link_candidatura', true);
    $contato = get_post_meta($post->ID, 'contato', true);
    ?>
    <p>
        <label for="seleti_local"><strong><?php esc_html_e('Local', 'my-theme'); ?></strong></label><br>
        <input type="text" id="seleti_local" name="seleti_local" value="<?php echo esc_attr($local); ?>" class="widefat">
    </p>
    <p>
        <label for="seleti_modalidade"><strong><?php esc_html_e('Modalidade', 'my-theme'); ?></strong></label><br>
        <select id="seleti_modalidade" name="seleti_modalidade" class="widefat">
            <?php
            $options = [
                '' => __('Selecione...', 'my-theme'),
                'presencial' => __('Presencial', 'my-theme'),
                'home' => __('Home', 'my-theme'),
                'hibrido' => __('Híbrido', 'my-theme'),
            ];
            foreach ($options as $value => $label) {
                printf(
                    '<option value="%s"%s>%s</option>',
                    esc_attr($value),
                    selected($modalidade, $value, false),
                    esc_html($label)
                );
            }
            ?>
        </select>
    </p>
    <p>
        <label for="seleti_salario"><strong><?php esc_html_e('Salário', 'my-theme'); ?></strong></label><br>
        <input type="text" id="seleti_salario" name="seleti_salario" value="<?php echo esc_attr($salario); ?>" class="widefat" placeholder="Ex: 2.500,00">
    </p>
    <p>
        <label for="seleti_carga_horaria"><strong><?php esc_html_e('Carga horária', 'my-theme'); ?></strong></label><br>
        <input type="text" id="seleti_carga_horaria" name="seleti_carga_horaria" value="<?php echo esc_attr($carga_horaria); ?>" class="widefat" placeholder="Ex: 44h semanais">
    </p>
    <p>
        <label for="seleti_turno"><strong><?php esc_html_e('Turno', 'my-theme'); ?></strong></label><br>
        <input type="text" id="seleti_turno" name="seleti_turno" value="<?php echo esc_attr($turno); ?>" class="widefat" placeholder="Ex: Manhã/Tarde/Noite">
    </p>
    <p>
        <label for="seleti_data_limite"><strong><?php esc_html_e('Data limite', 'my-theme'); ?></strong></label><br>
        <input type="date" id="seleti_data_limite" name="seleti_data_limite" value="<?php echo esc_attr($data_limite); ?>" class="widefat">
    </p>
    <p>
        <label for="seleti_link_candidatura"><strong><?php esc_html_e('Link de candidatura', 'my-theme'); ?></strong></label><br>
        <input type="url" id="seleti_link_candidatura" name="seleti_link_candidatura" value="<?php echo esc_url($link_candidatura); ?>" class="widefat" placeholder="https://">
    </p>
    <p>
        <label for="seleti_contato"><strong><?php esc_html_e('Contato', 'my-theme'); ?></strong></label><br>
        <input type="text" id="seleti_contato" name="seleti_contato" value="<?php echo esc_attr($contato); ?>" class="widefat" placeholder="Ex: (11) 99999-9999 ou email">
    </p>
    <?php
}

function seleti_save_vaga_meta($post_id) {
    if (!isset($_POST['seleti_vaga_meta_nonce']) || !wp_verify_nonce($_POST['seleti_vaga_meta_nonce'], 'seleti_save_vaga_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['post_type']) && $_POST['post_type'] === 'vaga') {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    } else {
        return;
    }

    $local = isset($_POST['seleti_local']) ? sanitize_text_field($_POST['seleti_local']) : '';
    $modalidade = isset($_POST['seleti_modalidade']) ? sanitize_text_field($_POST['seleti_modalidade']) : '';
    $salario = isset($_POST['seleti_salario']) ? sanitize_text_field($_POST['seleti_salario']) : '';
    $carga_horaria = isset($_POST['seleti_carga_horaria']) ? sanitize_text_field($_POST['seleti_carga_horaria']) : '';
    $turno = isset($_POST['seleti_turno']) ? sanitize_text_field($_POST['seleti_turno']) : '';
    $data_limite = isset($_POST['seleti_data_limite']) ? sanitize_text_field($_POST['seleti_data_limite']) : '';
    $link_candidatura = isset($_POST['seleti_link_candidatura']) ? esc_url_raw($_POST['seleti_link_candidatura']) : '';
    $contato = isset($_POST['seleti_contato']) ? sanitize_text_field($_POST['seleti_contato']) : '';

    if ($local !== '') {
        update_post_meta($post_id, 'local', $local);
    } else {
        delete_post_meta($post_id, 'local');
    }

    if ($modalidade !== '') {
        update_post_meta($post_id, 'modalidade', $modalidade);
    } else {
        delete_post_meta($post_id, 'modalidade');
    }

    if ($salario !== '') {
        update_post_meta($post_id, 'salario', $salario);
    } else {
        delete_post_meta($post_id, 'salario');
    }

    if ($carga_horaria !== '') {
        update_post_meta($post_id, 'carga_horaria', $carga_horaria);
    } else {
        delete_post_meta($post_id, 'carga_horaria');
    }

    if ($turno !== '') {
        update_post_meta($post_id, 'turno', $turno);
    } else {
        delete_post_meta($post_id, 'turno');
    }

    if ($data_limite !== '') {
        update_post_meta($post_id, 'data_limite', $data_limite);
    } else {
        delete_post_meta($post_id, 'data_limite');
    }

    if ($link_candidatura !== '') {
        update_post_meta($post_id, 'link_candidatura', $link_candidatura);
    } else {
        delete_post_meta($post_id, 'link_candidatura');
    }

    if ($contato !== '') {
        update_post_meta($post_id, 'contato', $contato);
    } else {
        delete_post_meta($post_id, 'contato');
    }
}
add_action('save_post', 'seleti_save_vaga_meta');

require('admin/custom.php');

?>
