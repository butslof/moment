<?php
// Template Name: Quem Somos
?>
<?php
$args = array(
    'page' => 'quem-somos',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>


<?php

$args = array(
    'title' => 'Quem Somos'
);
get_template_part('includes/sections-globals/intro-page-header', null, $args);

?>
<?php $data = get_field('sessao_1'); ?>
<section id="section-1">
    <div class="container">
        <div class="row row-intro">
            <div class="col-12 text-center">
                <h2 class="title-large min">
                    <?= $data['titulo']; ?>
                </h2>
                <p>
                    <?= $data['texto']; ?>
                </p>
                <img src="<?= $data['imagem']; ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
            </div>
        </div>
    </div>
</section>

<?php $data = get_field('sessao_2'); ?>
<section id="section-2">
    <div class="container">
        <div class="row row-content-two-cols">
            <?php if (!wp_is_mobile()) : ?>
                <div class="col-12 col-lg-7">
                    <img src="<?= $data['imagem']; ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
                </div>
            <?php endif; ?>
            <div class="col-12 col-lg-5">
                <h2 class="title-large min">
                    <?= $data['titulo']; ?>
                </h2>
                <span class="title-before"></span>
                <?php if (wp_is_mobile()) : ?>
                    <div class="col-12 col-lg-7">
                        <img src="<?= $data['imagem']; ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
                    </div>
                <?php endif; ?>
                <div class="text-column">
                    <?= $data['texto']; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (have_rows('conteudo_sessao_3')) : ?>
    <section id="section-3">
        <div class="container">

            <?php while (have_rows('conteudo_sessao_3')) : the_row(); ?>
                <?php if (get_row_layout() == 'texto_esquerda_e_imagem_direita') : ?>
                    <div class="row row-content-two-cols">
                        <div class="col-12 col-lg-5">
                            <h2 class="title-large min">
                                <?= get_sub_field('titulo'); ?>
                            </h2>
                            <span class="title-before"></span>
                            <?php if (wp_is_mobile()) :  ?>
                                <img src="<?= get_sub_field('imagem'); ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
                            <?php endif; ?>
                            <div class="text-column">
                                <?= get_sub_field('texto'); ?>
                            </div>
                        </div>
                        <?php if (!wp_is_mobile()) : ?>
                            <div class="col-12 col-lg-7">
                                <img src="<?= get_sub_field('imagem'); ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php elseif (get_row_layout() == 'texto_direita_e_imagem_esquerda') : ?>
                    <div class="row row-content-two-cols">

                        <?php if (!wp_is_mobile()) : ?>
                            <div class="col-12 col-lg-7">
                                <img src="<?= get_sub_field('imagem'); ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
                            </div>
                        <?php endif; ?>
                        <div class="col-12 col-lg-5">
                            <h2 class="title-large min">
                                <?= get_sub_field('titulo'); ?>
                            </h2>
                            <span class="title-before"></span>
                            <?php if (wp_is_mobile()) :  ?>
                                <img src="<?= get_sub_field('imagem'); ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
                            <?php endif; ?>
                            <div class="text-column">
                                <?= get_sub_field('texto'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>


        </div>
    </section>
<?php endif; ?>


<?php $data = get_field('sessao_5'); ?>
<section id="section-5">
    <div class="container">
        <div class="row row-content-two-cols">

            <?php if (!wp_is_mobile()) : ?>
                <div class="col-12 col-lg-7">
                    <img src="<?= $data['imagem']; ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
                </div>
            <?php endif; ?>
            <div class="col-12 col-lg-5">
                <h2 class="title-large min">
                    <?= $data['titulo']; ?>
                </h2>
                <span class="title-before"></span>
                <?php if (wp_is_mobile()) : ?>
                    <img src="<?= $data['imagem']; ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
                <?php endif; ?>
                <div class="text-column">
                    <?= $data['texto']; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $data = get_field('sessao_6'); ?>

<section id="section-5">
    <div class="container">
        <div class="row row-content-two-cols">


            <div class="col-12 col-lg-5">
                <h2 class="title-large min">
                    <?= $data['titulo']; ?>
                </h2>
                <span class="title-before"></span>
                <?php if (wp_is_mobile()) : ?>
                    <img src="<?= $data['imagem']; ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
                <?php endif; ?>
                <div class="text-column">
                    <?= $data['texto']; ?>
                </div>
            </div>
            <?php if (!wp_is_mobile()) : ?>
                <div class="col-12 col-lg-7">
                    <img src="<?= $data['imagem']; ?>" class="img-destaque" alt="Moment Locações" title="Moment Locações">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_template_part('includes/sections-globals/section-galeria', null, null); ?>


<?php get_template_part('includes/sections-globals/section-contact', null, null); ?>

<?php get_template_part('footer', null, null); ?>