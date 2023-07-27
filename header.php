<!doctype html>

<html lang="pt">



<head>


  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?= get_template_directory_uri(); ?>/dist/imgs/favicon.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

  <title><?= wp_title('|') ?></title>
  

  
  <?php wp_head(); ?>

  <script>
    if (window.history.replaceState) {

      window.history.replaceState(null, null, window.location.href);

    }
  </script>
  
  

</head>

<body class="<?= str_replace(".php", "", get_page_template_slug()) ?> <?= $args['class']; ?>">

  <!-- HEADER -->
  <?php $infos = get_field('informacoes', 'option'); ?>
  <header class="sticky-top" id="menu-top">
    <div class="faixa-top d-none d-lg-block">
      <div class="container ">
        <div class="col-12 column-items">
          <div class="box box-left">
            Siga-nos:
            <a href="<?= $infos['instagram']; ?>" target="_blank" title="email">
              <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/instagram.png" alt="Instagram" title="Instagram">
            </a>
            <a href="<?= $infos['facebook']; ?>" target="_blank" title="email">
              <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/facebook.png" alt="Facebook" title="Facebook">
            </a>
          </div>
          <div class="box box-left">
            <a href="mailto:<?= $infos['email']; ?>" target="_blank" title="email">
              <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/envelope-email.png" alt="E-mail" title="E-mail">
              <?= $infos['email']; ?>
            </a>
          </div>
          <div class="box box-right">
            <a href="tel:0<?= formatNumber($infos['telefone']); ?>" class="phone-right-button" title=" Solicite um orçamento">
              <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/phone.png" alt="Telefone" title="Telefone">
              <span class="bold">
                <?= $infos['telefone']; ?>
              </span>
            </a>
            <a href="https://api.whatsapp.com/send?phone=55<?= formatNumber($infos['whatsapp']); ?>" target="_blank" title="WhatsApp" class="whats-tracking bold">
              <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/whatsapp.png" alt="WhatsApp" title="WhatsApp">
              <?= $infos['whatsapp']; ?>
            </a>
          </div>
        </div>
      </div>
    </div>
    <hr class="line-header d-none d-lg-block">
    <div class="container container-header">

      <div class="row">

        <div class="col-lg-2 col-12">

          <a href="<?= get_home_url(); ?>/"><img src="<?= get_template_directory_uri(); ?>/dist/imgs/logo.png" alt="Moment Locações" class="logo-header" width="124" height="67"></a>

          <span class="hamb"></span>

        </div>

        <div class="col-lg col-12" id="nav-menu-container">
        <?php echo do_shortcode('[wd_asp id=1]'); ?>
          <!-- <form class="form-search">
            <input type="text" name="search" data-swplive="true" placeholder="Utilize este espaço para pesquisar">
            <button type="submit">
              <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/lupa.png" class="lupa-search" alt="search" title="search">
            </button>
          </form> -->
          <nav class="navbar navbar-expand-lg nav-content-full ">
            <div class="collapse navbar-collapse offcanvas-collapse" id="navbarNav">
              <?php
              $locations = get_nav_menu_locations();
              $menu = wp_get_nav_menu_object($locations['header']);
              $items = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
              $menus = buildTree($items);
              // var_dump($menus);
              ?>
              <ul class="navbar-nav">
                <?php $contMenu = 0; ?>
                <?php foreach ($menus as $item) : ?>
                  <?php $contMenu++;

                  $current_url = home_url('/' . get_post_field('post_name', get_post()) . '/');
                  if ($item['url'] == $current_url) {
                    $menuActive = 'menu-active';
                  } else if ($item['url'] ==  home_url('/') && is_front_page()) {
                    $menuActive = "menu-active";
                  } else if (is_tax('categorias-de-produtos') && $item['title'] == "Catálogo") {
                    $menuActive = "menu-active";
                  } else {
                    $menuActive = "";
                  } ?>
                  <?php if (empty($item['children'])) : ?>
                    <li class="nav-item">
                      <a class="nav-link <?= $menuActive; ?> " href="<?= $item['url']; ?>" title="<?= $item['title']; ?>"><?= $item['title']; ?>

                        <span class="title-before"></span>

                      </a>
                      <!-- <?php if ($item['classes'][0] == 'divisor') : ?>
                        <span class="divisor-link-nav "></span>
                      <?php endif; ?> -->
                    </li>
                  <?php else :   ?>
                    <?php if (!wp_is_mobile()) : ?>
                      <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link  <?= $menuActive; ?> dropdown-toggle" title="<?= $item['url']; ?>" href="<?= $item['url']; ?>">
                          <?= $item['title']; ?>
                          <span class="title-before"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <div class="container">
                            <div class="row">
                              <div class="col-12 column-list">
                                <?php foreach ($item['children'] as $category) : ?>
                                  <li class="nav-item dropend">
                                    <a class="dropdown-item" title="<?= $category['title']; ?>" href="<?= $category['url']; ?>">
                                      • <?= $category['title']; ?>
                                    </a>
                                    <?php if ($category['children']) : ?>
                                      <div class="dropdown-menu-sub">
                                        <?php foreach ($category['children'] as $subCategory) : ?>
                                          <a class="dropdown-item" href="<?= $subCategory['url']; ?>" title="<?= $subCategory['title']; ?>">• <?= $subCategory['title']; ?></a>
                                        <?php endforeach; ?>
                                      </div>
                                    <?php endif; ?>
                                  </li>
                                <?php endforeach; ?>
                              </div>
                            </div>
                          </div>
                        </ul>
                      </li>
                    <?php endif; ?>
                    <?php if (wp_is_mobile()) : ?>

                      <div class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle d-lg-none link-drop-mob collapsed" data-bs-toggle="collapse" href="#collapseExample<?= $item['title']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?= $item['title']; ?>">
                          <?= $item['title']; ?>
                        </a>
                        <div class="collapse" id="collapseExample<?= $item['title']; ?>">
                          <?php $contN1 = 0; ?>
                          <?php foreach ($item['children'] as $category) : $contN1++; ?>
                            <?php if ($category['children']) : ?>
                              <a class="dropdown-item dropdown-toggle link-drop-mob collapsed" data-bs-toggle="collapse" href="#collapseExample<?= $item['title'] . $contN1; ?>-sub" role="button" aria-expanded="false" aria-controls="collapseExample<?= $item['title'] . $contN1; ?>-sub">
                                <?= $category['title']; ?>
                              </a>
                            <?php else : ?>
                              <a class="dropdown-item" href="<?= $category['url']; ?>" title="<?= $category['title']; ?>">
                                • <?= $category['title']; ?>
                              </a>
                            <?php endif; ?>
                            <?php if ($category['children']) : ?>
                              <div class="collapse sub-box-drop" id="collapseExample<?= $item['title'] . $contN1; ?>-sub">
                                <?php $contN2 = 0; ?>
                                <?php foreach ($category['children'] as $categoryN2) : ?>
                                  <a class="dropdown-item" href="<?= $categoryN2['url']; ?>" title="<?= $categoryN2['title']; ?>"> <?= $categoryN2['title']; ?></a>
                                <?php endforeach; ?>
                              </div>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <div class="d-lg-none box-infos">
                  <div class="box">
                    <a href="tel:0<?= formatNumber($infos['telefone']); ?>" title="Telefone">
                      <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/phone.png" alt="Telefone" title="Telefone">
                      <?= $infos['telefone']; ?>
                    </a>
                  </div>
                  <div class="box">
                    <a href="https://api.whatsapp.com/send?phone=55<?= formatNumber($infos['whatsapp']); ?>" target="_blank" title="WhatsApp" class="whats-tracking">
                      <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/whatsapp.png" alt="WhatsApp" title="WhatsApp">
                      <?= $infos['whatsapp']; ?>
                    </a>
                  </div>
                  <div class="box">
                    <a href="mailto:<?= $infos['email']; ?>" title="email">
                      <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/envelope-email.png" alt="E-mail" title="E-mail">
                      <?= $infos['email']; ?>
                    </a>
                  </div>
                  <div class="box-redes">
                    Siga-nos:
                    <a href="<?= $infos['instagram']; ?>" target="_blank" title="email">
                      <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/instagram.png" alt="Instagram" title="Instagram">
                    </a>
                    <a href="<?= $infos['facebook']; ?>" target="_blank" title="email">
                      <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/facebook.png" alt="Facebook" title="Facebook">
                    </a>
                  </div>
                </div>
                <p class="d-lg-none direitos">
                  <strong>©Moment Locações - <?= date("Y"); ?> </strong> - Todos os direitos reservados
                </p>
              </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- FIM HEADER -->

  <main id="<?= $args['page']; ?>" class="<?= $args['class']; ?>">