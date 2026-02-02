<?php
get_header();
$header_image = get_template_directory_uri() . '/assets/img/bg-default.jpg';
?>

<main>
    <section class="areas-hero" style="background-image: url('<?php echo esc_url($header_image); ?>');">
        <div class="container areas-hero__content">
            <h1 class="areas-hero__title"><?php echo esc_html__('Resultados da busca', 'my-theme'); ?></h1>
        </div>
    </section>

    <section>
        <div class="container content-default content_vagas">
            <header class="head_section">
                <h2 class="title-default">Resultados da busca</h2>
                <?php
                $search_term = get_search_query();
                $region = isset($_GET['regiao']) ? sanitize_text_field(wp_unslash($_GET['regiao'])) : '';
                if ($search_term !== '' || $region !== '') :
                    $filters = [];
                    if ($search_term !== '') {
                        $filters[] = '"' . esc_html($search_term) . '"';
                    }
                    if ($region !== '') {
                        $filters[] = 'Região: ' . esc_html($region);
                    }
                    ?>
                    <p><?php echo implode(' | ', $filters); ?></p>
                <?php endif; ?>
            </header>

            <section class="d-flex list_card_vaga">
                <?php
                $paged = max(1, get_query_var('paged'));
                $args = [
                    'post_type' => 'vaga',
                    'post_status' => 'publish',
                    'posts_per_page' => 8,
                    'paged' => $paged,
                ];
                if ($search_term !== '') {
                    $args['s'] = $search_term;
                }
                if ($region !== '') {
                    $args['meta_query'] = [
                        [
                            'key' => 'local',
                            'value' => $region,
                            'compare' => 'LIKE',
                        ],
                    ];
                }

                $search_posts = new WP_Query($args);
                ?>

                <?php if ($search_posts->have_posts()) : ?>
                    <?php while ($search_posts->have_posts()) : $search_posts->the_post(); ?>
                        <?php
                        $categories = get_the_category();
                        $category_name = !empty($categories) ? $categories[0]->name : 'Geral';
                        $local = get_post_meta(get_the_ID(), 'local', true);
                        $modalidade = get_post_meta(get_the_ID(), 'modalidade', true);
                        $resume = get_the_excerpt();
                        if (!$resume) {
                            $resume = wp_trim_words(get_the_content(), 22, '..');
                        }
                        ?>
                        <article class="card_vaga">
                            <a href="<?php the_permalink(); ?>">
                                <div class="cat_vaga">
                                    <?php echo esc_html($category_name); ?>
                                </div>
                                <p class="title_card_vaga"><?php the_title(); ?></p>

                                <?php if ($local || $modalidade) : ?>
                                    <p class="location_card_vaga">
                                        <?php if ($local) : ?><span class="local_card_vaga"><?php echo esc_html($local); ?></span><?php endif; ?>
                                        <?php if ($local && $modalidade) : ?> - <?php endif; ?>
                                        <?php if ($modalidade) : ?><span><?php echo esc_html($modalidade); ?></span><?php endif; ?>
                                    </p>
                                <?php endif; ?>

                                <p class="resume_card_vaga"><?php echo esc_html($resume); ?></p>

                                <p class="btn_card_vaga">Ver Vaga</p>
                            </a>
                        </article>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>Nenhuma vaga encontrada.</p>
                <?php endif; ?>
            </section>

            <?php
            $pagination = paginate_links([
                'total' => $search_posts->max_num_pages,
                'current' => $paged,
                'type' => 'list',
            ]);
            if ($pagination) :
                echo $pagination;
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
