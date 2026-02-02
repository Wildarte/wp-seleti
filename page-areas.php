<?php
/*
Template Name: Áreas
*/
get_header();

$header_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
if (!$header_image) {
    $header_image = get_template_directory_uri() . '/assets/img/bg-default.jpg';
}
?>

<main>
    <section class="areas-hero" style="background-image: url('<?php echo esc_url($header_image); ?>');">
        <div class="container areas-hero__content">
            <h1 class="areas-hero__title"><?php the_title(); ?></h1>
        </div>
    </section>

    <section>
        <div class="container content-default">
            <header class="head_section">
                <h2 class="title-default">Todas as áreas</h2>
            </header>

            <section class="d-flex list_card_area">
                <?php
                $areas = get_terms([
                    'taxonomy' => 'area',
                    'hide_empty' => false,
                    'orderby' => 'name',
                    'order' => 'ASC',
                ]);
                ?>
                <?php if (!is_wp_error($areas) && !empty($areas)) : ?>
                    <?php foreach ($areas as $area) : ?>
                        <?php
                        $image_id = (int) get_term_meta($area->term_id, 'area_image_id', true);
                        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
                        if (!$image_url) {
                            $image_url = get_template_directory_uri() . '/assets/img/icon.webp';
                        }
                        $term_link = get_term_link($area);
                        ?>
                        <article class="card_area">
                            <a href="<?php echo esc_url($term_link); ?>">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($area->name); ?>">
                                <p class="title_card_area"><?php echo esc_html($area->name); ?></p>
                            </a>
                        </article>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Nenhuma área cadastrada.</p>
                <?php endif; ?>
            </section>
        </div>
    </section>
</main>

<?php get_footer(); ?>
