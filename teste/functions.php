<?php

add_theme_support( 'post-thumbnails' );

function registrar_imoveis() {
	$descricao = 'Usado para listar os imóveis do Quarto Andar';
	$singular = 'Imóvel';
	$plural = 'Imóveis';

	$labels = array(
		'name' => $plural,
		'singular_name' => $singular,
		'view_item' => 'Ver ' . $singular,
		'edit_item' => 'Editar ' . $singular,
		'new_item' => 'Novo ' . $singular,
		'add_new_item' => 'Adicionar novo ' . $singular
	);

	$supports = array(
		'title',
		'editor',
		'thumbnail'
	);

	$args = array(
		'labels' => $labels,
		'description' => $descricao,
		'public' => true,
		'menu_icon' => 'dashicons-admin-home',
		'supports' => $supports
	);


	register_post_type('imovel', $args);	
}

add_action('init', 'registrar_imoveis');



function registrar_menu_navegacao() {
    register_nav_menu('header-menu', 'main-menu');
}

add_action( 'init', 'registrar_menu_navegacao');

function geraTitle() {
	blog_info('name'); 
	if(!is_home()) echo ' | ';
	the_title();
 }

function registrar_taxonomia_localizacao(){

	$nomeSingular = 'Localizacao';
	$nomePlural = 'Localizacoes';
	
	$labels = array(
		'name' => $nomePlural,
		'singular_name' => $nomeSingular,
		'edit_item' => 'Editar' . $nomeSingular,
		'add_new_item' => 'Adicionar nova ' . $nomeSingular
	);
	
	 $args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => true
	 );
	
	register_taxonomy('localizacao', 'imovel', $args);

}

add_action('init', 'registrar_taxonomia_localizacao');

function preenche_conteudo_informacoes_imovel(){?>
	<style>
		.maluras-metabox {
			display: flex;
			justify-content: space-between;
		}

		.maluras-metabox-item {
			flex-basis: 30%;

		}

		.maluras-metabox-item label {
			font-weight: 700;
			display: block;
			margin: .5rem 0;

		}

		.input-addon-wrapper {
			height: 30px;
			display: flex;
			align-items: center;
		}

		.input-addon {
			display: block;
			border: 1px solid #CCC;
			border-bottom-left-radius: 5px;
			border-top-left-radius: 5px;
			height: 100%;
			width: 30px;
			text-align: center;
			line-height: 30px;
			box-sizing: border-box;
			background-color: #888;
			color: #FFF;
		}

		.maluras-metabox-input {
			height: 100%;
			border: 1px solid #CCC;
			border-left: none;
			margin: 0;
		}

	</style>
	<div class="quarto-metabox">
		<div class="quarto-metabox-item">
			<label for="quarto-preco-input">Preço:</label>
			<div class="input-addon-wrapper">
				<span class="input-addon">R$</span>
				<input id="quarto-preco-input" class="quarto-metabox-input" type="text" name="preco_id"
				value="<?= number_format($imoveis_meta_data['preco_id'][0], 2, ',', '.'); ?>">
			</div>
		</div>

		<div class="quarto-metabox-item">
			<label for="quarto-vagas-input">Vagas:</label>
			<input id="quarto-vagas-input" class="quarto-metabox-input" type="number" name="vagas_id"
			value="<?= $imoveis_meta_data['vagas_id'][0]; ?>">
		</div>

		<div class="quarto-metabox-item">
			<label for="quarto-banheiros-input">Banheiros:</label>
			<input id="quarto-banheiros-input" class="quarto-metabox-input" type="number" name="banheiros_id"
			value="<?= $imoveis_meta_data['banheiros_id'][0]; ?>">
		</div>

		<div class="quarto-metabox-item">
			<label for="quarto-quartos-input">Quartos:</label>
			<input id="quarto-quartos-input" class="quarto-metabox-input" type="number" name="quartos_id"
			value="<?php echo $imoveis_meta_data['quartos_id'][0]; ?>">
		</div>

	</div>
<?php }

function registra_meta_boxes(){
	add_meta_box('informacoes-imoveis',
	'Informacoes do Imovel' ,
	'preenche_conteudo_informacoes_imovel',
	'imovel',
	'normal',
	'high'
	);
}
add_action('add_meta_boxes', 'registra_meta_boxes');
?>
