<form method="post" class="needs-validation" novalidate>
    <input type="hidden" name="Formulário" value="Contato">
    <input type="hidden" name="g-recaptcha-response" class="token">
    <div class="row line-form">
        <div class="col-lg col-12">
            <input type="text" class="form-control" name="Nome" placeholder="Nome*" required>
        </div>
        <div class="col-lg col-12">
            <input type="text" class="form-control phone-mask" name="Telefone" pattern=".{14,}" placeholder="Telefone*" required>
        </div>
    </div>
    <div class="row line-form">
        <div class="col-lg col-12">
            <input type="email" class="form-control" name="E-mail" placeholder="E-mail*" required>
        </div>
    </div>
    <div class="row line-form">
        <div class="col-12">
            <textarea class="form-control" name="Mensagem" placeholder="Mensagem*" required></textarea>
        </div>
    </div>
    <?php
    get_template_part('includes/components/forms/politica-de-privacidade', null, null);
    ?>
    <button type="submit" class="button button-primary">Enviar <i class="fa fa-paper-plane"></i></button>
</form>