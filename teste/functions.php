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

?>


