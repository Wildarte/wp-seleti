<?php get_header();
//Template Name: Home
$home_id = get_queried_object_id();
$hero_image_url = $home_id ? get_the_post_thumbnail_url($home_id, 'full') : '';
$hero_style = $hero_image_url ? ' style="background-image: url(' . esc_url($hero_image_url) . ');"' : '';
?>

<main>
        <section class="hero"<?php echo $hero_style; ?>>
            
            <div class="container content_hero">
                <div class="search_jobs">
                    <div class="category_jobs">
                        <?php
                        $areas_page = get_pages([
                            'meta_key' => '_wp_page_template',
                            'meta_value' => 'page-areas.php',
                            'number' => 1,
                        ]);
                        $areas_url = !empty($areas_page) ? get_permalink($areas_page[0]->ID) : home_url('/areas');
                        ?>
                        <header class="head_section head_section--between head_areas_home">
                            <a class="simple-link" href="<?php echo esc_url($areas_url); ?>">Ver todas</a>
                        </header>
                        <div class="over_category_jobs">
                            <?php
                            $areas = get_terms([
                                'taxonomy' => 'area',
                                'hide_empty' => false,
                                'number' => 10,
                                'orderby' => 'name',
                                'order' => 'ASC',
                            ]);
                            ?>
                            <?php if (!is_wp_error($areas) && !empty($areas)) : ?>
                                <?php foreach ($areas as $area) : ?>
                                    <?php
                                    $image_id = (int) get_term_meta($area->term_id, 'area_image_id', true);
                                    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : '';
                                    if (!$image_url) {
                                        $image_url = get_template_directory_uri() . '/assets/img/icon.webp';
                                    }
                                    $term_link = get_term_link($area);
                                    ?>
                                    <a href="<?php echo esc_url($term_link); ?>">
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($area->name); ?>">
                                        <p><?php echo esc_html($area->name); ?></p>
                                    </a>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>Nenhuma área cadastrada.</p>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                    <?php
                    $vaga_search = isset($_GET['s']) ? sanitize_text_field(wp_unslash($_GET['s'])) : '';
                    $vaga_region = isset($_GET['regiao']) ? sanitize_text_field(wp_unslash($_GET['regiao'])) : '';
                    ?>
                    <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="form_search_jobs">
                        <div class="form_group">
                            <label for="vaga_search">Nome da Vaga</label>
                            <input type="text" name="s" id="vaga_search" placeholder="Pesquise por uma vaga..." value="<?php echo esc_attr($vaga_search); ?>">
                        </div>
                        <div class="form_group">
                            <label for="vaga_region">Região</label>
                            <input type="text" name="regiao" id="vaga_region" placeholder="Pesquise por região..." value="<?php echo esc_attr($vaga_region); ?>">
                        </div>
                        <div class="form_group_button">
                            <button class="submit">Buscar Vagas</button>
                        </div>
                    </form>
                </div>
            </div>

        </section>

        <section>
            <div class="container content-default content_vagas">
                <header class="head_section">
                    <h2 class="title-default">Últimas vagas de emprego</h2>
                </header>

                <section class="d-flex list_card_vaga">
                    <?php
                    $home_args = [
                        'post_type' => 'vaga',
                        'posts_per_page' => 8,
                        'post_status' => 'publish',
                    ];
                    if ($vaga_search !== '') {
                        $home_args['s'] = $vaga_search;
                    }
                    if ($vaga_region !== '') {
                        $home_args['meta_query'] = [
                            [
                                'key' => 'local',
                                'value' => $vaga_region,
                                'compare' => 'LIKE',
                            ],
                        ];
                    }
                    $home_posts = new WP_Query($home_args);
                    ?>
                    <?php if ($home_posts->have_posts()) : ?>
                        <?php while ($home_posts->have_posts()) : $home_posts->the_post(); ?>
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
            </div>
        </section>
    </main>

<?php get_footer() ?>
