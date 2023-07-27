<?php
//registrando visitas
function ed_set_post_views($postID)
{
	$count_key = 'ed_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_widgets_blog_editor', '__return_false');

//removendo script desnecessários do wp
add_action('wp_enqueue_scripts', function () {
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('classic-theme-styles-css');
}, 20);

function hoist_object()
{
	global $wp;

	// URLS
	$theme_url = get_bloginfo('template_url');
	$admin_url = admin_url('admin-ajax.php');
	$home_url = home_url('/');
	$current_url = home_url($wp->request);
	$is_front_page = is_front_page();
	$page_obj = get_queried_object();

	$hoist = [
		'theme_url'       => $theme_url,
		'admin_url'       => $admin_url,
		'home_url'        => $home_url,
		'current_url'     => $current_url,
		'is_single'       => is_single(),
		'is_front_page'   => $is_front_page,
		'page'            => $page_obj,
		'currentObjectID' => get_queried_object_id()
	];

	$hoist = json_encode($hoist);

	if ($hoist) {
		wp_localize_script('app-js', 'hoist', $hoist);
	}
}
add_action('wp_enqueue_scripts', 'hoist_object');


// removendo ctp link do breadcrump yoast
function my_breadcrumb_filter_function($crumbs)
{

	// replace "cpt" with your custom post type name 
	if (is_singular('cpt_74') || is_singular('cpt_75')) {
		$crumbs[1] = '';
	}
	return $crumbs;
}
add_filter('wpseo_breadcrumb_links', 'my_breadcrumb_filter_function');


// removendo library wp css
function wpassist_remove_block_library_css()
{
	wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');

//Removendo pré-buscas para melhorar a precisão dos dados
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// configurando menus
function setup_menus()
{
	register_nav_menus(array(
		'header'   => 'Header',
		'footer-1'   => 'Footer 1',
		'footer-2'   => 'Footer 2',
		'footer-3'   => 'Footer 3',
		'footer-4'   => 'Footer 4'

	));
}
add_action('after_setup_theme', 'setup_menus');


// MENU
function buildTree(array $elements, $parentId = 0)
{
	$branch = array();
	foreach ($elements as $x) {
		$element = json_decode(json_encode($x), True);
		if ($element['menu_item_parent'] == $parentId) {
			$children = buildTree($elements, $element['ID']);
			if ($children) {
				$element['children'] = $children;
			}
			$branch[] = $element;
		}
	}
	return $branch;
}
// FIM MENU

// suport thumb
function ed_support_thumbnails()
{
	add_theme_support('post-thumbnails'); // thumbnails
}
add_action('after_setup_theme', 'ed_support_thumbnails');

// limit words
function limit_words($texto, $limite, $quebra = false)
{
	$tamanho = strlen($texto);
	if ($tamanho <= $limite) { //Verifica se o tamanho do texto é menor ou igual ao limite
		$novo_texto = $texto;
	} else { // Se o tamanho do texto for maior que o limite
		if ($quebra == true) { // Verifica a opção de quebrar o texto
			$novo_texto = trim(substr($texto, 0, $limite)) . "...";
		} else { // Se não, corta $texto na última palavra antes do limite
			$ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
			$novo_texto = trim(substr($texto, 0, $ultimo_espaco)) . "..."; // Corta o $texto até a posição localizada
		}
	}
	return $novo_texto; // Retorna o valor formatado
}


// send forms
function enviaDados()
{

	require_once ABSPATH . WPINC . '/class-phpmailer.php';
	require_once ABSPATH . WPINC . '/class-smtp.php';

	$secret_key = '*';
	$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'];
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HEADER, false);
	$data = curl_exec($curl);
	curl_close($curl);
	$responseCaptchaData = json_decode($data);
	$sucess = $responseCaptchaData->success;

	$values = $_POST;

	if ($sucess) {
		$mail = new PHPMailer();
		$mail->CharSet = 'UTF-8';
	   // $mail->SMTPDebug  = 4;
			$mail->isSMTP();
			$mail->Host       = '*';
			$mail->SMTPAuth   = true;
			$mail->Username   = '*';
			$mail->Password   = '*';
			$mail->SMTPSecure = 'ssl';
			$mail->Port       = 465;
			$mail->From       = "Envio";

		$mail_body = '<table style="border-collapse: collapse; border: 1px solid;">';
		$subject = !empty($values['subject']) ? $values['subject'] : 'Contato pelo Site';

		unset($values['TCM_PostShown']);
		unset($values['TCM_SnippetsWrittenIds']);
		unset($values['TCM_SnippetsWrittenMd5']);
		unset($values['TCM_Cache_Query_2_']);
		unset($values['type']);
		unset($values['subject']);
		unset($values['action']);

		foreach ($values as $field => $value) {
			if ($field != 'g-recaptcha-response') {
				$mail_body .= '<tr><td style="padding:10px; font-size: 16px;">' . $field . ':' . '</td>';
				$mail_body .= '<td style="font-size: 16px; padding: 10px;">';
				$mail_body .= $value;
				$mail_body .= '</td></tr>';
			}

			if ($field == 'E-mail') {
				$replyto = $value;
			}
		}

		$mail_body .= '</table>';

		if (isset($replyto)) {
			$mail->addReplyTo($replyto);
		}

		if (isset($subject)) {
			$mail->Subject = $subject;
		}

		if ($_FILES['arquivo']) {
			$mail->addAttachment(
				$_FILES['arquivo']['tmp_name'],
				$_FILES['arquivo']['name']
			);
		}


		$mail->setFrom('atendimento@momentlocacoes.com.br', 'Envio');
		$mail->addAddress('atendimento@momentlocacoes.com.br', 'Moment Locações');


		$mail->isHTML(true);
		$mail->Body = $mail_body;
		$mail->send();

		if ($values['Formulário'] == 'Download') {
			$catalogo = get_field('download_do_catalogo', 'option');

			$mail->ClearAllRecipients();
			$mail->addAddress($values['E-mail'], 'Cliente');

			$mail_body = '<table style="font-family: Roboto, sans-serif;border-collapse: collapse; border: 1px solid #2a426b; background: #fff; width: 600px; margin:auto;">';

			$mail_body .=
				'<tr>
    				<th colspan="2 style="padding: 20px; border: 1px solid #2a426b">
    						<img src="' . get_template_directory_uri() . '/dist/imgs/logo.png" style="display:block; margin: 30px auto; width: 120px;" />
    				</th>
    		</tr>';

			$mail_body .=  '
    		<tr>
    			<td style="padding:10px; font-size: 16px; border: 1px solid #2a426b; color:#000; font-weight: bold;">Catálogo Moment Locações</td>
    			<td style="padding:10px; font-size: 16px; border: 1px solid #2a426b; color:#000; font-weight: bold;"><a href="' .  $catalogo['catalogo'] . '">Clique aqui para download</a></td>
    		</tr>';

			$mail_body .= '</table>';
			$mail_body .= '</table>';
			$mail->Subject =  'Catálogo Moment Locações';

			$mail->isHTML(true);
			$mail->Body = $mail_body;
			$mail->send();
		}


		echo "
			<script> 
			window.onload = function(){
			    gtag('event', 'Formulário', {
					'event_category': 'Formulário',
					'event_action' : 'Envio',
					'event_label': 'Formulário',
					'value': 'Formulário',
				  });
			}

			Swal.fire({
				title: 'Enviado com sucesso!',
				icon: 'success'
			})
			</script>
		";
	} else {
		echo "
			<script>   
				Swal.fire({
					title: 'Não foi possível enviar, você foi detectado como um robô. Tente novamente',
					icon: 'error'
				})
			</script>
		";
	}
}

// option page
function create_acf_option_pages(): void
{

	if (function_exists('acf_add_options_page')) {

		acf_add_options_page([

			'page_title'    => 'Informações Gerais',

			'menu_title'    => 'Informações',

			'menu_slug'     => 'informacoes-gerais',

		]);
	}
}

add_action('init', 'create_acf_option_pages');

// option page 
function create_acf_sections_pages(): void
{

	if (function_exists('acf_add_options_page')) {

		acf_add_options_page([

			'page_title'    => 'Sessões Globais',

			'menu_title'    => 'Sessões Globais',

			'menu_slug'     => 'sessoes-globais',

		]);
	}
}

add_action('init', 'create_acf_sections_pages');


// Formata número para whatsapp ou fixo
function formatNumber($number)
{

	return preg_replace('/[^0-9]/', '', $number);
}

// Remover acentuação da string
function tirarAcentos($string)
{
	$string = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);
	return strip_tags(strtolower($string));
}

/**
 * Enqueue scripts and styles.
 */
add_action('init', 'register_custom_styles_scripts');
function register_custom_styles_scripts()
{

	// Carregar arquivos JS e CSS aqui

	wp_register_style('bootstrap-css', get_template_directory_uri() . '/dist/build/css/bootstrap.min.css');
	wp_register_style('main-css', get_template_directory_uri() . '/dist/css/main.css', array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-home', get_template_directory_uri() . '/dist/css/pages/home.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-pagina-categoria', get_template_directory_uri() . '/dist/css/pages/category-product.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('page-quem-somos', get_template_directory_uri() . '/dist/css/pages/quem-somos.css',  array('bootstrap-css'), '1.0', 'all');

	wp_register_style('404', get_template_directory_uri() . '/dist/css/pages/404.css',  array('bootstrap-css'), '1.0', 'all');


	wp_register_style('font-awesome', get_template_directory_uri() . '/dist/css/font-awesome.min.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('tracking', get_template_directory_uri() . '/dist/css/tracking.min.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/splide.min.css',  array('bootstrap-css'), '1.0', 'all');
	wp_register_style('lightbox-css', get_template_directory_uri() . '/dist/css/lightbox.css',  array('bootstrap-css'), '1.0', 'all');


	wp_register_script('app-js', get_template_directory_uri() . '/dist/js/app.min.js', '', null, true);
	wp_register_script('popper', get_template_directory_uri() . '/dist/js/popper.min.js', '', null, true);
	wp_register_script('bootstrap-js', get_template_directory_uri() . '/dist/js/bootstrap.min.js', '', null, true);
	wp_register_script('splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js', '', null, false);
	wp_register_script('recaptcha-js', 'https://www.google.com/recaptcha/api.js?render=6LeoHMQmAAAAAI5sqNB1WncJ1JEbuPqwrmaV6qeL', '', null, true);
	wp_register_script('tracking-js', get_template_directory_uri() . '/dist/js/tracking.js', array(), '1.0.0', true);
	wp_register_script('polyfill', 'https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver', '', null, true);
	wp_register_script('swall-alert', 'https://cdn.jsdelivr.net/npm/sweetalert2@9', '', null, true);
	wp_register_script('vanilla-js', 'https://cdn.rawgit.com/lagden/vanilla-masker/lagden/build/vanilla-masker.min.js', '', null, true);
	wp_register_script('lightbox', get_template_directory_uri() . '/dist/js/lightbox.min.js', '', null, true);

}

function theme_scripts()
{
	// css global
	wp_enqueue_style('bootstrap-css');
	wp_enqueue_style('main-css');
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('splide-css');
	wp_enqueue_style('tracking');
	wp_enqueue_style('lightbox-css');

	// css page 
	$styles = 	array(
		'page-home',
		'page-pagina-categoria',
		'page-quem-somos'
	);

	foreach ($styles as $style) {
		if (is_page_template($style . '.php')) {
			wp_enqueue_style($style);
		}
	}

	if (get_post_type() == "produtos") {

		wp_enqueue_style('page-produto-single');
	}

	if (is_tax('categorias-de-produtos')) {
		wp_enqueue_style('page-pagina-categoria');
	}

	if (is_home() ||  is_search() || is_category() || is_tag() || get_post_type() == "post") {
		wp_enqueue_style('page-blog');
	}
	if (is_404()) {
		wp_enqueue_style('404');
	}

	//global css

	// js global
	wp_enqueue_script('app-js');
	wp_enqueue_script('bootstrap-js');
	wp_enqueue_script('popper');
	wp_enqueue_script('splide-js');
	wp_enqueue_script('recaptcha-js');
	wp_enqueue_script('tracking-js');
	wp_enqueue_script('polyfill');
	wp_enqueue_script('swall-alert');
	wp_enqueue_script('vanilla-js');
	wp_enqueue_script('lightbox');

}
add_action('wp_enqueue_scripts', 'theme_scripts');


// get more product
function load_more_product()
{
	$requested_page = intval($_POST['pageOffset']);
	$dlist = explode(",", $_POST['list']);
	$tax =  $_POST['tax'];

	// var_dump($dlist);
	if ($_POST['condition']) {
		$posts = new WP_Query(array(
			'posts_per_page' => 8,
			'paged' => $paged = $requested_page,
			'orderby' => 'title',
			'order' => 'ASC',
			'post_type' => 'produtos',
			'post__not_in' => $dlist,
			'post_status' => 'publish',
			'tax_query' => array(
				array(
					'taxonomy' => 'tipos-de-produtos',
					'field' => 'term_id',
					'terms' => $tax
				)
			),
			'meta_query'    => array(
				'relation'      => 'OR',
				array(
					'key'       => 'condicao_do_produto',
					'value'     => $_POST['condition'],
					'compare'   => 'LIKE'
				)
			)
		));
	} else {
		$posts = new WP_Query(array(
			'posts_per_page' => 8,
			'paged' => $paged = $requested_page,
			'orderby' => 'title',
			'order' => 'ASC',
			'post_type' => 'produtos',
			'post__not_in' => $dlist,
			'post_status' => 'publish',
			'tax_query' => array(
				array(
					'taxonomy' => 'tipos-de-produtos',
					'field' => 'term_id',
					'terms' => $tax
				)
			)
		));
	}
	if ($posts->have_posts()) {
		while ($posts->have_posts()) {
			$posts->the_post();
			$args = array(
				'title' => get_the_title(),
				'text' =>  get_field('texto_card_produto'),
				'image' => get_the_post_thumbnail_url(),
				'link' =>  get_the_permalink(),
				'alt_image' => get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true),
				'title_image' => get_the_title(get_post_thumbnail_id())
			);
			get_template_part('includes/components/card-produto', null, $args);
		}
		wp_die();
	} else {
		echo "<h3><strong style='font-size:20px;'> Nenhum Post Encontrado!')</strong></h3>";
	}
}
add_action('wp_ajax_load_more_product', 'load_more_product');
add_action('wp_ajax_nopriv_load_more_product', 'load_more_product');

// modification queries
function my_pre_get_posts($query)
{

	// do not modify queries in the admin
	if (is_admin()) {
		return $query;
	}

	// only modify queries for 'event' post type
	if (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'produtos') {

		// allow the url to alter the query
		if (isset($_GET['condition'])) {

			$query->set('meta_key', 'condicao_do_produto');
			$query->set('meta_value', $_GET['condition']);
			$query->set('meta_compare', 'LIKE');
		}

		// if(isset($_GET['promotion']))

	}

	// return
	return $query;
}

add_action('pre_get_posts', 'my_pre_get_posts');
