<?php ed_set_post_views(get_the_ID()); ?>
<?php $infos = get_field('informacoes', 'option'); ?>

<div class="col-3 sidebar d-none d-lg-block">
    <div class="box-sidebar box-sidebar-img shadow text-center border-boxs">
        <picture class="logo-sidebar">
            <img src="<?= get_template_directory_uri() ?>/dist/imgs/logo.svg" alt="Evolution Plásticos" title="Evolution Plásticos">
        </picture>
        <div class="text">
            <p>
                Olá! Seja bem-vindo ao blog especializado da Evolution Plásticos. Aqui você encontrará conteúdos especiais sobre otimização de espaço e armazenamento. Conheça nossas soluções:
            </p>
            <a href="<?= get_home_url(); ?>/" class="button" title="Acessar Site">
                Acessar Site <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/arrow-cat.svg" alt="arrow" title="arrow">
            </a>
        </div>
    </div>
    <?php get_template_part('includes/components/box-category-sidebar', null, null); ?>
    <?php get_template_part('includes/components/box-artigos-mais-visitados', null, null); ?>

</div>