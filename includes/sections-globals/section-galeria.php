<?php $data = get_field('momentos_que_duram' , 'option'); ?>
<section id="galeria-section">
    <div class="container">
        <div class="row row-intro">
            <div class="col-12 text-center">
                <?php if (is_page(32)) : ?>
                    <img class="aspas" src="<?= get_template_directory_uri(); ?>/dist/imgs/aspas.svg" alt="Galeria" title="Galeria">
                    <h2 class="title-large">
                        <?= $data['titulo_pagina_quem_somos']; ?>
                    </h2>
                <?php else : ?>
                    <h2 class="title-large">
                        <?= $data['titulo']; ?>
                    </h2>
                    <span class="title-before margin-0-auto"></span>
                    <p>
                        <?= $data['texto']; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row row-content">
            <div class="col-12">
                <div class="grid-container desktop">
                    <div class="grid-item">
                        <img class="img-min" src="<?= $data['imagem_1']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-min" src="<?= $data['imagem_2']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-large" src="<?= $data['imagem_3']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-large" src="<?= $data['imagem_4']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-medium" src="<?= $data['imagem_5']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-min" src="<?= $data['imagem_6']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-min" src="<?= $data['imagem_7']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-large" src="<?= $data['imagem_8']; ?>" alt="Galeria" title="Galeria">
                    </div>
                </div>
                <div class="grid-container mobile">
                    <div class="grid-item">
                        <img class="img-large" src="<?= $data['imagem_1']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-min" src="<?= $data['imagem_2']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-min" src="<?= $data['imagem_3']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-large" src="<?= $data['imagem_4']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-medium" src="<?= $data['imagem_5']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-large" src="<?= $data['imagem_6']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-min" src="<?= $data['imagem_7']; ?>" alt="Galeria" title="Galeria">
                    </div>
                    <div class="grid-item">
                        <img class="img-min" src="<?= $data['imagem_8']; ?>" alt="Galeria" title="Galeria">
                    </div>
                </div>
            </div>
        </div>
</section>