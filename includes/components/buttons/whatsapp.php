<?php $infos = get_field('informacoes', 'option'); ?>

<a  href="https://api.whatsapp.com/send?phone=55<?= formatNumber($infos['whatsapp']) ;?>" target="_blank"  class="button button-whatsapp whats-tracking">
    <i class="fa fa-whatsapp"></i> WhatsApp
</a>