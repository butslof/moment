</main>
<footer id="footer">
    <div class="direitos">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 d-none d-lg-block">
                    <p><strong>© Moment Locações - </strong> <?= date("Y"); ?> - Todos os direitos reservados</p>
                </div>
                <div class="col-lg-6 col-12 text-lg-end col-img">
                    <a href="https://www.3xceler.com.br/criacao-de-sites/" title="Agencia 3xceler" target="_blank">Criação de Sites:</a>
                    <img src="<?= get_template_directory_uri(); ?>/dist/imgs/logo-3xceler.svg" alt="Agencia 3xceler" title="Agencia 3xceler">
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- tracking here -->
<?php

include 'includes/tracking.php';
wp_footer();
include 'includes/scripts-globals.php';


?>


</body>

</html>