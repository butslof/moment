<form method="post" class="needs-validation" novalidate>
    <input type="hidden" name="Formulário" value="Download">
    <input type="hidden" name="g-recaptcha-response" class="token">
    <div class="row line-form">
        <div class="col-lg col-12">
            <label class="icons-form">
                <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/user-form.svg" alt="Nome" tilte="Nome">
            </label>
            <input type="text" class="form-control" name="Nome" placeholder="Nome*" required>
        </div>
        <div class="col-lg col-12">
            <label class="icons-form">
                <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/email-form.svg" alt="E-mail" tilte="E-mail">
            </label>
            <input type="email" class="form-control" name="E-mail" placeholder="E-mail*" required>
        </div>
    </div>
    <div class="row line-form">
        <div class="col-lg col-12">
            <label class="icons-form">
                <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/telefone-form.svg" alt="Telefone" tilte="Telefone">
            </label>
            <input type="text" class="form-control phone-mask" name="Telefone" pattern=".{14,}" placeholder="Telefone*" required>
        </div>
        <div class="col-lg col-12">
            <label class="icons-form">
                <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/empresa-form.svg" alt="Empresa" tilte="Empresa">
            </label>
            <input type="text" class="form-control" name="Empresa" placeholder="Empresa*" required>
        </div>
    </div>
    <button type="submit" class="button button-blue">Realizar Download <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icons/download-button.svg" alt="Baixar Catálogo" title="Baixar Catálogo"></button>
    <?php
    get_template_part('includes/components/forms/politica-de-privacidade', null, null);
    ?>
</form>