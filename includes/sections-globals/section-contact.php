<?php $data = get_field('entre_em_contato' , 'option'); ?>

<section id="entre-em-contato">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7 col-text">
                <h2 class="title-large">
                    <?= $data['titulo']; ?>
                </h2>
                <span class="title-before"></span>
                <div class="text-intro">
                    <?= $data['texto']; ?>
                </div>
                <div class="box-contact">
                    <div class="item">
                        <span class="title">
                            Tem algum dúvida? Ligue!
                        </span>
                        <a href="tel:0<?= formatNumber(get_field('telefone', 'option')); ?>" title="Telefone">
                            <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/phone-contact-footer.svg" alt="Telefone" title="Telefone">
                            <?= get_field('telefone', 'option'); ?>
                        </a>
                    </div>
                    <div class="item">
                        <span class="title">
                            Envie um
                            WhatsApp
                        </span>
                        <a href="https://api.whatsapp.com/send?phone=55<?= formatNumber(get_field('whatsapp', 'option')); ?>" target="_blank" title="WhatsApp" class="whats-tracking">
                            <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/whatsapp-contact-footer.svg" alt="WhatsApp" title="WhatsApp">
                            <?= get_field('whatsapp', 'option'); ?>
                        </a>
                    </div>
                </div>

                <?php
                get_template_part('includes/components/forms/form-contato', null, null);
                ?>

            </div>
            <div class="col-12 col-lg-5 col-img d-none d-lg-block">
                <img src="<?= get_template_directory_uri(); ?>/dist/imgs/bg-comp-contact.png" alt="Contato" title="Contato">
            </div>
            <div class="col-12 column-direitos">
                <a href="https://www.3xceler.com.br/criacao-de-sites/" title="Agencia 3xceler" target="_blank">Criação de Sites:</a>
                <img src="<?= get_template_directory_uri(); ?>/dist/imgs/logo-3xceler-mob.svg" alt="Agencia 3xceler" title="Agencia 3xceler">
            </div>
        </div>
    </div>
</section>