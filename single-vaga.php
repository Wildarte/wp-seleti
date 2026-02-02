<?php
get_header();

$vaga_id = get_queried_object_id();
$header_image = $vaga_id ? get_the_post_thumbnail_url($vaga_id, 'full') : '';
if (!$header_image) {
    $header_image = get_template_directory_uri() . '/assets/img/bg-default.jpg';
}

$local = $vaga_id ? get_post_meta($vaga_id, 'local', true) : '';
$modalidade = $vaga_id ? get_post_meta($vaga_id, 'modalidade', true) : '';
$salario = $vaga_id ? get_post_meta($vaga_id, 'salario', true) : '';
$carga_horaria = $vaga_id ? get_post_meta($vaga_id, 'carga_horaria', true) : '';
$turno = $vaga_id ? get_post_meta($vaga_id, 'turno', true) : '';
$data_limite = $vaga_id ? get_post_meta($vaga_id, 'data_limite', true) : '';
$link_candidatura = $vaga_id ? get_post_meta($vaga_id, 'link_candidatura', true) : '';
$contato = $vaga_id ? get_post_meta($vaga_id, 'contato', true) : '';
$areas = $vaga_id ? get_the_terms($vaga_id, 'area') : [];
$cidades = $vaga_id ? get_the_terms($vaga_id, 'cidade') : [];
$tipos_contrato = $vaga_id ? get_the_terms($vaga_id, 'tipo_contrato') : [];
$niveis = $vaga_id ? get_the_terms($vaga_id, 'nivel') : [];
$beneficios = $vaga_id ? get_the_terms($vaga_id, 'beneficio') : [];
?>

<main>
    <section class="areas-hero" style="background-image: url('<?php echo esc_url($header_image); ?>');">
        <div class="container areas-hero__content">
            <h1 class="areas-hero__title"><?php the_title(); ?></h1>
        </div>
    </section>

    <section>
        <div class="container content-default content_vagas">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="card_vaga card_vaga--single">
                        <div class="card_vaga__inner">
                            <?php if ($local || $modalidade) : ?>
                                <p class="location_card_vaga">
                                    <?php if ($local) : ?><span class="local_card_vaga"><?php echo esc_html($local); ?></span><?php endif; ?>
                                    <?php if ($local && $modalidade) : ?> - <?php endif; ?>
                                    <?php if ($modalidade) : ?><span><?php echo esc_html($modalidade); ?></span><?php endif; ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($areas) && !is_wp_error($areas)) : ?>
                                <p class="cat_vaga">
                                    <?php
                                    $area_names = wp_list_pluck($areas, 'name');
                                    echo esc_html(implode(', ', $area_names));
                                    ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($cidades) && !is_wp_error($cidades)) : ?>
                                <p class="cat_vaga">
                                    <?php
                                    $cidade_names = wp_list_pluck($cidades, 'name');
                                    echo esc_html(implode(', ', $cidade_names));
                                    ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($tipos_contrato) && !is_wp_error($tipos_contrato)) : ?>
                                <p class="cat_vaga">
                                    <?php
                                    $tipo_names = wp_list_pluck($tipos_contrato, 'name');
                                    echo esc_html(implode(', ', $tipo_names));
                                    ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($niveis) && !is_wp_error($niveis)) : ?>
                                <p class="cat_vaga">
                                    <?php
                                    $nivel_names = wp_list_pluck($niveis, 'name');
                                    echo esc_html(implode(', ', $nivel_names));
                                    ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($beneficios) && !is_wp_error($beneficios)) : ?>
                                <p class="cat_vaga">
                                    <?php
                                    $beneficio_names = wp_list_pluck($beneficios, 'name');
                                    echo esc_html(implode(', ', $beneficio_names));
                                    ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($salario !== '') : ?>
                                <p><strong>Salário:</strong> <?php echo esc_html($salario); ?></p>
                            <?php endif; ?>

                            <?php if ($carga_horaria !== '') : ?>
                                <p><strong>Carga horária:</strong> <?php echo esc_html($carga_horaria); ?></p>
                            <?php endif; ?>

                            <?php if ($turno !== '') : ?>
                                <p><strong>Turno:</strong> <?php echo esc_html($turno); ?></p>
                            <?php endif; ?>

                            <?php if ($data_limite !== '') : ?>
                                <p><strong>Data limite:</strong> <?php echo esc_html($data_limite); ?></p>
                            <?php endif; ?>

                            <?php if ($contato !== '') : ?>
                                <p><strong>Contato:</strong> <?php echo esc_html($contato); ?></p>
                            <?php endif; ?>

                            <?php if ($link_candidatura !== '') : ?>
                                <p><strong>Link de candidatura:</strong> <a href="<?php echo esc_url($link_candidatura); ?>" rel="noopener noreferrer" target="_blank"><?php echo esc_html($link_candidatura); ?></a></p>
                            <?php endif; ?>

                            <div class="content_vaga">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Nenhuma vaga encontrada.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
