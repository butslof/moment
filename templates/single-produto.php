<?php
// Template Name: Single Produto
?>
<?php
$args = array(
    'page' => 'single-produto',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>

<?php get_template_part('includes/breadcrumb', null, $args); ?>


<?php $data = get_field('informacoes'); ?>
<section id="intro">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 grid-col">
                <?php if (!wp_is_mobile()) : ?>
                    <div class="splide thumbnail-slider-produto">
                        <div class="splide__track">
                            <div class="splide__list">
                                <?php foreach ($data['galeria'] as $galery) : ?>
                                    <div class="splide__slide">
                                        <?php
                                        $imageMedium = wp_get_attachment_image_src($galery['ID'], 'medium');
                                        ?>
                                        <img src="<?= $imageMedium[0]; ?>" alt="<?= $galery['alt']; ?>" tile="<?= $galery['title']; ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="splide slider-produto">
                    <div class="splide__track">
                        <div class="splide__list">
                            <?php foreach ($data['galeria'] as $galery) : ?>
                                <div class="splide__slide">
                                    <img src="<?= $galery['url']; ?>" alt="<?= $galery['alt']; ?>" title="<?= $galery['title']; ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6">
                <div class="box-form">
                    <span class="title">
                        Entre em contato e<br>
                        solicite um orçamento!
                    </span>
                    <p>
                        Para podermos te ajudar da forma que você precisa, preencha os campos abaixo e solicite o seu orçamento online conosco.
                    </p>
                    <?php
                    get_template_part('includes/components/forms/form-contato', null, null);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-infos">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-text">
                <h1 class="title-large">
                    <?= get_the_title(); ?>
                </h1>
                <?= $data['texto']; ?>
            </div>
            <div class="col-12 col-lg-6 col-items">
                <h2 class="title">
                    Informações Técnicas
                </h2>
                <ul class="items">
                    <?php $cont = 0;
                    foreach ($data['informacoes_tecnicas'] as $items) : $cont++; ?>
                        <li class="<?= ($cont % 2 != 0) ? 'bg' : ''; ?>">
                            <?= $items['texto']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('includes/sections-globals/download-catalogo', null, null); ?>

<?php get_template_part('includes/sections-globals/cards-quem-somos', null, null); ?>

<?php get_template_part('includes/sections-globals/section-contact', null, null); ?>

<?php get_template_part('footer', null, null); ?>

<script>
    var main = new Splide('.slider-produto', {
        type: 'fade',
        heightRatio: 0.5,
        pagination: false,
        arrows: false,
        cover: true,
        mediaQuery: 'max',
        breakpoints: {
            1023: {
                pagination: true
            },
        },
    });
    main.mount();

    var windowWidth = window.innerWidth;
    if (windowWidth > 1024) {
        var thumbnails = new Splide('.thumbnail-slider-produto', {
            rewind: true,
            fixedWidth: 104,
            fixedHeight: 58,
            isNavigation: true,
            arrows: false,
            gap: 10,
            focus: 'center',
            pagination: false,
            cover: true,
            dragMinThreshold: {
                mouse: 4,
                touch: 10,
            },
            direction: 'ttb',
            height: 438,
            breakpoints: {
                640: {
                    fixedWidth: 66,
                    fixedHeight: 38,
                },
            },
        });
        thumbnails.mount();
        main.sync(thumbnails);
    }
</script>