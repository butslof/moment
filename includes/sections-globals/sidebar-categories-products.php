<aside class="aside-category">
    <h2 class="title">
        CARTEGORIAS
    </h2>
    <?php
    $args = array(
        'taxonomy' => 'categorias-de-produtos',
        'hide_empty' => false
    );
    $categories = get_categories($args);
    $term_object = get_queried_object();

    ?>

    <?php if ($categories) : ?>
        <ul class="list">
            <?php foreach ($categories as $categorie) : ?>
                <li>
                    <a href="<?= get_category_link($categorie->term_id); ?>" class="<?= ($term_object->name == $categorie->name) ? 'strong-link' : '' ?>" title="<?= $categorie->name; ?>">
                        <i class="fa fa-chevron-right"></i>
                        
                        <?= get_term_meta($categorie->term_id, 'titulo_para_listagem_nos_menus', true); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</aside>