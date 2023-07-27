<?php
$text_intro_ola = "Olá,";
$text_intro = "Gostaria de receber uma ligação?";
$text_intro_button = "Sim";
?>
<?php $infos = get_field('informacoes', 'option'); ?>

<!-- Modal CTA triggger -->
<div id="cta-trigger">
  <div id="trigger-body">
    <button close-trigger-body>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="7.68" height="7.75">
        <defs>
          <filter id="a" x="1886.13" y="580.125" width="7.68" height="7.75" filterUnits="userSpaceOnUse">
            <feFlood result="flood" flood-color="#342d1f" />
            <feComposite result="composite" operator="in" in2="SourceGraphic" />
            <feBlend result="blend" in2="SourceGraphic" />
          </filter>
        </defs>
        <g transform="translate(-1886.13 -580.125)" fill="none" filter="url(#a)">
          <path id="b" data-name="CLOSE copy" d="M1893.03 580.487l.45.437-6.57 6.359-.45-.439zm-6.57.657l.45-.439 6.57 6.359-.45.44z" stroke="inherit" filter="none" fill="inherit" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" fill-rule="evenodd" />
        </g>
        <use transform="translate(-1886.13 -580.125)" xlink:href="#b" stroke="#000" filter="none" fill="none" />
      </svg>
    </button>
    <hgroup>
      <strong><?= $text_intro_ola; ?></strong>
      <p><?= $text_intro; ?></p>
      <button open-modal-cta><?= $text_intro_button; ?></button>
    </hgroup>
  </div>
  <button open-trigger-body>
    <svg xmlns="http://www.w3.org/2000/svg" width="25.066" height="23.27" viewBox="0 0 25.066 23.27">
      <path id="Caminho_754" data-name="Caminho 754" d="M40.23,33.312c-.617-.309-3.649-1.8-4.214-2.006s-.976-.309-1.388.309-1.593,2.006-1.953,2.418-.72.463-1.336.154a16.843,16.843,0,0,1-4.959-3.061,18.588,18.588,0,0,1-3.431-4.272c-.36-.617-.038-.951.271-1.259.277-.276.617-.72.925-1.08a4.211,4.211,0,0,0,.617-1.029,1.135,1.135,0,0,0-.051-1.08c-.154-.309-1.388-3.344-1.9-4.579-.5-1.2-1.009-1.039-1.388-1.059-.359-.018-.771-.022-1.182-.022a2.266,2.266,0,0,0-1.644.772,6.917,6.917,0,0,0-2.159,5.145c0,3.036,2.21,5.968,2.518,6.38s4.349,6.641,10.535,9.312a35.406,35.406,0,0,0,3.516,1.3,8.452,8.452,0,0,0,3.884.244c1.185-.177,3.649-1.492,4.163-2.932a5.154,5.154,0,0,0,.36-2.933C41.258,33.775,40.847,33.621,40.23,33.312Z" transform="translate(-16.436 -16.746)" fill-rule="evenodd" />
    </svg>
  </button>
</div>

<!-- Modal CTA -->
<div id="modal-cta">
  <div id="modal-overlay" modal-close>
    <div id="modal-container">
      <div class="wrap-modal-btns">
        <button modal-tab data-open="me-ligue-agora">
          <!-- <img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/cta-icon-phone.svg" width="30" height="31"> -->
          Me ligue agora
        </button>
        <button modal-tab data-open="me-ligue-depois">
          <!-- <img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/cta-icon-clock.svg" width="30" height="31">   -->
          Me ligue depois
        </button>
        <button modal-tab data-open="deixe-uma-mensagem">
          <!-- <img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/cta-icon-comments.svg" width="30" height="31"> -->
          Deixe uma mensagem
        </button>
      </div>
      <div class="modal-content-btns" id="me-ligue-agora">
        <h2>NÓS TE LIGAMOS!</h2>
        <p>Informe seu telefone que entraremos em contato o mais rápido possível.</p>

        <form method="post" name="me-ligue-agora" id="me_ligue_agora" class="form-tracking needs-validation">
          <input type="hidden" name="Formulário" value="Me Ligue Agora">
          <input type="hidden" name="g-recaptcha-response" class="token">


          <label class=" fa fa-user-circle">
            <input type="text" name="Nome" placeholder="Informe seu nome" required>
          </label>
          <label class="fa fa-phone">
            <input type="text" name="Telefone" placeholder="Informe seu telefone" class="phone-mask" pattern=".{14,}" required>
          </label>
          <button type="submit" class="btn-submit title-min">Enviar</button>
        </form>

        <small>Você já é a <span>27</span> pessoa a solicitar uma ligação.</small>
      </div>
      <div class="modal-content-btns" id="me-ligue-depois">
        <p>Gostaria de agendar e receber uma chamada em outro horário?</p>

        <form method="post" name="me-ligue-depois" id="me_ligue_depois" class="form-tracking needs-validation">
          <input type="hidden" name="g-recaptcha-response" class="token">

          <input type="hidden" name="Formulário" value="Me Ligue Depois">

          <label class="icon-user fa fa-user-circle">
            <input type="text" name="Nome" placeholder="Informe seu nome" required>
          </label>

          <label class="half">
            <input type="date" name="Data" max="2100-12-31" required>
          </label>
          <label class="half">
            <input type="time" name="Horário" placeholder="Informe um horário" required>
          </label>

          <label class="icon-phone fa fa-phone ">
            <input type="text" name="Telefone" placeholder="Informe seu telefone" class="phone-mask" pattern=".{14,}" required>
          </label>

          <button type="submit" class="btn-submit title-min">Enviar</button>
        </form>

        <small>Você já é a <span>27</span> pessoa a solicitar uma ligação.</small>

      </div>
      <div class="modal-content-btns" id="deixe-uma-mensagem">
        <h2>
          Deixe sua mensagem!
        </h2>
        <p>Entraremos em contato o mais rápido possível.</p>

        <form method="post" name="deixar-mensagem" id="deixar_mensagem" class="form-tracking needs-validation">
          <input type="hidden" name="Formulário" value="Deixe Uma Mensagem">
          <input type="hidden" name="g-recaptcha-response" class="token">

          <label class="icon-user fa fa-user-circle">
            <input type="text" name="Nome" placeholder="Informe seu nome" required>
          </label>
          <label class="icon-phone fa fa-phone ">
            <input type="text" name="Telefone" placeholder="Informe seu telefone" class="phone-mask" pattern=".{14,}" required>
          </label>
          <label>
            <textarea name="Mensagem" placeholder="Deixe sua mensagem" required></textarea>
          </label>
          <button type="submit" class="btn-submit">Enviar</button>
        </form>
        <small>Você já é a <span>27</span> pessoa a deixar uma mensagem.</small>
      </div>
    </div>
  </div>
</div>

<!-- Mobile CTA -->
<div id="mobile-cta">

  <div class="wrap">
    <div class="column-whats">
      <a id="btn-whatsapp" href="https://api.whatsapp.com/send?phone=55<?= formatNumber($infos['whatsapp']); ?>" target="_blank" title="Contato via WhatsApp" class="trigger trigger-whats whats-tracking"><i class="fa fa-whatsapp"></i></a>
    </div>

    <div class="column-ligar">
      <a id="btn-ligar" href="tel:0<?= formatNumber($infos['telefone']); ?>" title="Telefone fixo">Ligar</a>
    </div>
    <div class="column-contato">
      <button id="btn-open-modal" title="Entre em contato" open-modal-cta>Entre em contato</button>
    </div>
  </div>
</div>

<!-- Whats CTA -->
<a id="whats-cta" target="_blank" href="https://api.whatsapp.com/send?phone=55<?= formatNumber($infos['whatsapp']); ?>" title="Contato via WhatsApp" class="trigger-whats whats-tracking">
  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="31" height="31" viewBox="0 0 172 172" style=" fill:#000000;">
    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
      <path d="M0,172v-172h172v172z" fill="none"></path>
      <g fill="#ffffff">
        <path d="M86.08399,14.33333c-39.45967,0 -71.58235,32.09502 -71.59668,71.55469c-0.00717,12.61333 3.29655,24.92701 9.56022,35.77734l-9.71419,36.00131l37.49902,-8.86035c10.45617,5.70467 22.22697,8.69922 34.20963,8.70638h0.028c39.4525,0 71.56118,-32.10219 71.58268,-71.55469c0.01433,-19.12784 -7.42377,-37.11191 -20.9401,-50.64258c-13.51633,-13.5235 -31.47925,-20.97493 -50.62858,-20.9821zM86.06999,28.66667c15.308,0.00717 29.69396,5.97554 40.50846,16.78288c10.8145,10.82167 16.75522,25.2008 16.74089,40.49447c-0.01433,31.56199 -25.68702,57.23535 -57.26335,57.23535c-9.55317,-0.00717 -19.01607,-2.40588 -27.35091,-6.95671l-4.8291,-2.63151l-5.33301,1.25976l-14.10937,3.33138l3.44336,-12.79362l1.55371,-5.73894l-2.96745,-5.15104c-5.00233,-8.65733 -7.64974,-18.55584 -7.64258,-28.61067c0.01433,-31.54767 25.69452,-57.22135 57.24935,-57.22135zM60.7487,52.85417c-1.19683,0 -3.13195,0.44792 -4.77311,2.23958c-1.64117,1.7845 -6.27083,6.10656 -6.27083,14.90723c0,8.80067 6.41081,17.30772 7.30664,18.50455c0.88867,1.18967 12.37448,19.82031 30.55632,26.98698c15.10733,5.9555 18.17568,4.78017 21.45801,4.47917c3.28233,-0.29383 10.58909,-4.31825 12.07975,-8.49641c1.49066,-4.17817 1.49414,-7.77226 1.0498,-8.51042c-0.44433,-0.74533 -1.6377,-1.18978 -3.42936,-2.08561c-1.7845,-0.89583 -10.57856,-5.21409 -12.21973,-5.80892c-1.64117,-0.59483 -2.84158,-0.89583 -4.03125,0.89583c-1.18967,1.79167 -4.60861,5.80903 -5.65494,6.9987c-1.04633,1.19683 -2.08561,1.35775 -3.87728,0.46191c-1.79167,-0.903 -7.55232,-2.79668 -14.38932,-8.88835c-5.31767,-4.73717 -8.90582,-10.58203 -9.95215,-12.37369c-1.03917,-1.7845 -0.09798,-2.76466 0.79785,-3.65332c0.80267,-0.80267 1.77767,-2.08908 2.6735,-3.13542c0.88867,-1.04633 1.19683,-1.79178 1.79167,-2.98145c0.59483,-1.18966 0.29036,-2.23958 -0.15398,-3.13541c-0.44433,-0.89583 -3.92397,-9.7292 -5.51497,-13.26953c-1.34017,-2.97417 -2.75558,-3.04326 -4.03125,-3.09342c-1.03917,-0.043 -2.2257,-0.04199 -3.41536,-0.04199z">
        </path>
      </g>
    </g>
  </svg>
</a>