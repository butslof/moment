<?php

if ($args['disable']) {
    if ($args['disable'] == true) {
        $classColumn = 'produtos-disabled card-none';
    } else {
        $classColumn = "";
    }
} else {
    $classColumn = "";
}


?>
<div class="col-lg-3 col-6 <?= $classColumn; ?> col-card-product <?= (isset($args['bg']) && $args['bg'] == false) ? 'no-bg' : ''; ?>">
    <a href="<?= $args['link']; ?>" title="<?= strip_tags($args['title']); ?>">
        <div class="card-produto">
            <div class="bg">
                <img src="<?= $args['image']; ?>" class="img-produto" alt="<?= strip_tags($args['title']); ?>" title="<?= strip_tags($args['title']); ?>">
            </div>
            <div class="content-text">
                <h2 class="title">
                    <?= limit_words($args['title'], 40); ?>
                </h2>
                <?php if (!wp_is_mobile()) : ?>
                    <p>
                        <?= limit_words($args['text'], 135); ?>
                    </p>
                <?php endif; ?>
                <a href="<?= $args['link']; ?>" class="link" title="<?= strip_tags($args['title']); ?>">
                    <?php if (isset($args['text-button']) && $args['text-button'] != "") : ?>
                        Saiba Mais
                    <?php else : ?>
                        Ver Categoria
                    <?php endif; ?>
                    <?php if (wp_is_mobile() || isset($args['text-button']) && $args['text-button'] != "") : ?>
                        <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/arrow-btn-white.svg" alt="Ver Categoria" title="Ver Categoria">
                    <?php else : ?>
                        <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/arrow-cat.svg" alt="Ver Categoria" title="Ver Categoria">
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </a>
</div>