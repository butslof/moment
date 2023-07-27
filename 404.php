<?php
$args = array(
  'page' => 'page-404',
  'class' => ''
);
?>


<?php get_template_part('header', null, $args); ?>
<section id="intro">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <h2 class="title-large">
          404
        </h2>
        <span class="title">
          Página Não Encontrada
        </span>
        <p>
          Desculpe, mas a página solicitada não foi encontrada em nosso<br> servidor. Clique no botão abaixo para continuar navegando.
        </p>
        <a href="<?= get_home_url(); ?>/" class="button button-solicite-orcamento btn-orange" title="Solicite um orçamento">Voltar Para a Home <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/icon-arrow-button.svg" alt="Solicitar Orçamento" title="Solicitar Orçamento"></a>
      </div>
    </div>
  </div>
</section>
<?php get_template_part('footer', null, 1); ?>