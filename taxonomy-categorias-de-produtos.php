<?php
// Template Name: Categoria de Produto
?>
<?php
$args = array(
    'page' => 'category-product',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>


<?php
$term_object = get_queried_object();
$infos = get_field('informacoes', 'option');

$args = array(
    'title' => $term_object->name
);
get_template_part('includes/sections-globals/intro-page-header', null, $args);

?>

<section id="content-page-category">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                $args = array(
                    'post_type' => 'produtos',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorias-de-produtos',
                            'field' => 'slug',
                            'terms' => $term_object->slug,
                        )
                    )
                );

                $query = new WP_Query($args);

                // var_dump($query);
                ?>
                <div class="content">
                    <?php get_template_part('includes/sections-globals/sidebar-categories-products'); ?>
                    <?php if ($query->have_posts()) : ?>
                        <div class="content-products">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <article class="card-product">
                                    <a href="<?= get_the_post_thumbnail_url(); ?>" data-lightbox="<?= get_the_title(); ?>" data-title="<?= get_the_title(); ?>">
                                        <img src="<?= get_the_post_thumbnail_url(); ?>" class="img-product" alt="<?= get_the_title(); ?>" title="<?= get_the_title(); ?>">
                                    </a>
                                    <a href="https://api.whatsapp.com/send?phone=55<?= formatNumber($infos['whatsapp']); ?>"  target="_blank" class="whats-tracking">
                                        <h2 class="title">
                                            <?= get_the_title(); ?>
                                        </h2>
                                    </a>
                                    <span class="title-before margin-0-auto"></span>
                                    <a href="https://api.whatsapp.com/send?phone=55<?= formatNumber($infos['whatsapp']); ?>" target="_blank" class="button button-primary whats-tracking">
                                        Solicitar Orçamento
                                    </a>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    <?php
                        wp_reset_postdata();
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('includes/sections-globals/section-contact-module', null, null); ?>

<?php get_template_part('includes/sections-globals/section-galeria', null, null); ?>

<?php get_template_part('includes/sections-globals/section-contact', null, null); ?>

<?php get_template_part('footer', null, null); ?>