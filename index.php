<?php get_header(); ?>

<main>
    <section>
        <div class="container content-default content_vagas">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="card_vaga card_vaga--single">
                        <div class="card_vaga__inner">
                            <p class="title_card_vaga"><?php the_title(); ?></p>
                            <div class="content_vaga">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Nenhum conteúdo encontrado.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
