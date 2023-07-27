<?php
// Template Name: Home
?>
<?php
$args = array(
    'page' => 'home',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>
<?php $infos = get_field('informacoes', 'option'); ?>

<?php $data = get_field('sessao_1'); ?>
<section id="banner-top">
    <div class="splide splide-banners-top">
        <div class="splide__track">
            <div class="splide__list">
                <div class="splide__slide">
                    <div class="banner-1 banners">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-text">
                                    <h1 class="title-large">
                                        <?= $data['titulo_banner_1']; ?>
                                    </h1>
                                    <p>
                                        <?= $data['texto_banner_1']; ?>
                                    </p>
                                    <a role="button" href="#entre-em-contato" class="button button-primary" title="Solicite um orçamento">Entrar em Contato</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="splide__slide">
                    <div class="banner-2 banners">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-text">
                                    <h2 class="title-large">
                                        <?= $data['titulo_banner_2']; ?>
                                    </h2>
                                    <p>
                                        <?= $data['texto_banner_2']; ?>
                                    </p>
                                    <a role="button" href="#entre-em-contato" class="button button-primary" title="Solicite um orçamento">Entrar em Contato</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="splide__slide">
                    <div class="banner-3 banners">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-text">
                                    <h2 class="title-large">
                                        <?= $data['titulo_banner_3']; ?>
                                    </h2>
                                    <p>
                                        <?= $data['texto_banner_3']; ?>
                                    </p>
                                    <a role="button" href="#entre-em-contato" class="button button-primary" title="Solicite um orçamento">Entrar em Contato</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $data = get_field('sessao_2'); ?>
<section id="section-personalizado">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="https://api.whatsapp.com/send?phone=55<?= formatNumber($infos['whatsapp']); ?>&text=Olá, gostaria de saber mais sobre mobiliário personalizado" target="_blank" class="whats-tracking">
                    <div class="bg">
                        <h2 class="title">
                            <span><?= $data['titulo']; ?></span>
                            <?= $data['titulo_bottom']; ?>
                        </h2>
                        <span class="title-before center-line"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php $data = get_field('sessao_3'); ?>
<!--<section id="download-catalogo">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bg">
                    <div class="column-1">
                        <h2 class="title-large">
                            <span>
                                <?= $data['titulo_sup']; ?>
                            </span>
                            <?= $data['titulo_bottom']; ?>
                        </h2>
                        <span class="title-before"></span>
                        <img src="<?= get_template_directory_uri(); ?>/dist/imgs/capa-catalogo.png" alt="Download Catálogo" title="Download Catálogo" class="capa d-lg-none">
                        <p>
                            <?= $data['texto']; ?>
                        </p>
                    </div>
                    <div class="column-2">
                        <form method="post">
                            <input type="hidden" name="Formulário" value="Download">
                            <input type="hidden" name="g-recaptcha-response" class="token" value="">
                            <div class="row">
                                <div class="col-lg col-12">
                                    <input type="text" class="form-control" name="Nome" placeholder="Nome*" required>
                                </div>
                                <div class="col-lg col-12">
                                    <input type="text" class="form-control phone-mask" name="Telefone" pattern=".{14,}" placeholder="Telefone*" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg col-12">
                                    <input type="email" class="form-control" name="E-mail" placeholder="E-mail*" required>
                                </div>
                            </div>
                            <button type="submit" class="button button-primary">

                                Realizar Download

                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16.461" height="17.538" viewBox="0 0 16.461 17.538">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <rect id="Retângulo_1129" data-name="Retângulo 1129" width="16.461" height="17.538" />
                                        </clipPath>
                                    </defs>
                                    <g id="Grupo_963" data-name="Grupo 963" transform="translate(-0.986 -1.05)">
                                        <g id="Grupo_962" data-name="Grupo 962" transform="translate(0.986 1.05)" clip-path="url(#clip-path)">
                                            <path id="Caminho_812" data-name="Caminho 812" d="M95.123,0a.653.653,0,0,1,.393.672c-.008,2.247,0,4.494,0,6.741,0,.242,0,.242.242.242.622,0,1.243,0,1.865,0a.573.573,0,0,1,.455.983q-1.346,1.539-2.693,3.076-.524.6-1.049,1.2a.575.575,0,0,1-.952,0L89.65,8.651a.585.585,0,0,1-.138-.661.567.567,0,0,1,.582-.335c.633,0,1.266,0,1.9.005.165,0,.212-.047.212-.212,0-2.258,0-4.517-.007-6.775A.653.653,0,0,1,92.59,0Z" transform="translate(-85.625)" />
                                            <path id="Caminho_813" data-name="Caminho 813" d="M8.214,286.18q-3.534,0-7.068,0a1.093,1.093,0,0,1-1.115-.854A1.108,1.108,0,0,1,0,285.037c0-1.381,0-2.761,0-4.142,0-.177.055-.222.225-.219.593.009,1.187.01,1.78,0,.18,0,.218.061.217.227-.007.953,0,1.905-.007,2.858,0,.169.054.209.215.209q5.8-.006,11.6,0c.162,0,.215-.042.214-.209-.008-.953,0-1.905-.007-2.858,0-.168.04-.229.218-.226.6.011,1.2.008,1.8,0,.154,0,.206.044.206.2-.005,1.386,0,2.773,0,4.159a1.09,1.09,0,0,1-1.141,1.141q-3.551,0-7.1,0" transform="translate(0 -268.642)" />
                                        </g>
                                    </g>
                                </svg>

                            </button>
                            <p class="link-privacy">
                                Ao enviar este formulário, eu concordo com a <a role="button">Política de Privacidade</a> do site.
                            </p>
                        </form>
                    </div>
                    <div class="column-3">
                        <img src="<?= get_template_directory_uri(); ?>/dist/imgs/capa-catalogo.png" alt="Download Catálogo" title="Download Catálogo" class="capa d-none d-lg-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> !-->
<?php $data = get_field('sessao_4'); ?>
<section id="navegue-por-categoria">
    <div class="container">
        <div class="row row-intro">
            <div class="col-12 text-center">
                <h2 class="title-large">
                    <?= $data['titulo']; ?>
                </h2>
                <span class="title-before margin-0-auto"></span>
                <p>
                    <?= $data['texto']; ?>
                </p>
            </div>
        </div>
        <?php
        $args = array(
            'taxonomy' => 'categorias-de-produtos',
            'hide_empty' => false
        );
        $categories = get_categories($args);

        ?>
        <?php if ($categories) : ?>
            <div class="row row-content">
                <?php foreach ($categories as $categorie) : ?>
                    <div class="col-12 col-lg-4">
                        <a href="<?= get_category_link($categorie->term_id); ?>" title=" Acessórios Diversos">
                            <div class="box-card">
                                <?php $image_id = get_term_meta($categorie->term_id, 'imagem_destaque_categoria', true); ?>
                                <img src="<?= wp_get_attachment_url($image_id) ;?>" alt="<?= get_term_meta($categorie->term_id, 'titulo_para_listagem_nos_menus', true); ?>" title="<?= get_term_meta($categorie->term_id, 'titulo_para_listagem_nos_menus', true); ?>">
                                <h2 class="title">
                                    <?= get_term_meta($categorie->term_id, 'titulo_para_listagem_nos_menus', true); ?>
                                </h2>
                                <span class="title-before margin-0-auto"></span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_template_part('includes/sections-globals/section-contact-module', null, null); ?>

<?php get_template_part('includes/sections-globals/section-galeria', null, null); ?>

<?php get_template_part('includes/sections-globals/section-contact', null, null); ?>


<?php get_template_part('footer', null, null); ?>


<script class="no-defer">
    var splideSliderTop = new Splide('.splide-banners-top', {
        perPage: 1,
        pagination: false,
        arrows: true,
        autoplay: true,
        type: 'loop',

    });
    splideSliderTop.mount();
</script>