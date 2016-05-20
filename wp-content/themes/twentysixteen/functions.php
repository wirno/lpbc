<?php
/*
 * functions.php
 * 
 */
require_once('include/DMStoDD.php');

add_theme_support('post-thumbnails');
add_action('init', 'create_custom_post_type');
add_action('init', 'create_custom_taxonomy');

function create_custom_post_type(){
	register_post_type('chateaux',array(
		'labels'=>array(
			'name'=>__('Chateaux'),
			'all_items'=>('Tous les châteaux'),
			'singular_name'=>__('Chateau'),
			'add_new'=>('Ajouter un château')
		),
		'public'=>true,
		'supports'=>array(
			'title','editor','thumbnail','comments'),
		'has_archive'=>true
	));


	register_post_type('evenements',array(
		'labels'=>array(
			'name'=>__('Evenements'),
			'all_items'=>('Tous les événements'),
			'singular_name'=>__('Evenement'),
			'add_new'=>('Ajouter un événement')
		),
		'public'=>true,
		'supports'=>array(
			'title','editor','thumbnail','comments'),
		'has_archive'=>true
	));

		register_post_type('anecdotes',array(
		'labels'=>array(
			'name'=>__('Anecdotes'),
			'all_items'=>('Toutes les anecdotes'),
			'singular_name'=>__('Anecdote'),
			'add_new'=>('Ajouter une anecdote')
		),
		'public'=>true,
		'supports'=>array(
			'title','editor','thumbnail','comments'),
		'has_archive'=>true
	));

	register_post_type('monuments-et-musees',array(
		'labels'=>array(
			'name'=>__('Monuments et musées'),
			'all_items'=>('Tous les monuments et musées'),
			'singular_name'=>__('Monument et musée'),
			'add_new'=>('Ajouter un musée ou monument')
		),
		'public'=>true,
		'supports'=>array(
			'title','editor','thumbnail','comments'),
		'has_archive'=>true
	));

	register_post_type('point-interet',array(
		'labels'=>array(
			'name'=>__("Point d'interet"),
			'all_items'=>("Tous les points d'intérêts"),
			'singular_name'=>__("Point d'intérêt"),
			'add_new'=>("Ajouter un point d'intérêt")
		),
		'public'=>true,
		'supports'=>array(
			'title','editor','thumbnail','comments'),
		'has_archive'=>true
	));


	register_post_type('region',array(
		'labels'=>array(
			'name'=>__("Region"),
			'all_items'=>("Tous les régions"),
			'singular_name'=>__("Région"),
			'add_new'=>("Ajouter une région")
		),
		'public'=>true,
		'supports'=>array(
			'title','editor','thumbnail','comments'),
		'has_archive'=>true
	));
}

function create_custom_taxonomy(){
	register_taxonomy(
		'Region',
		array('chateaux','monuments-et-musees','point-interet','region'),
		array(
			'label'=>__('Region'),
			'hierarchical'=>true,
			));

	register_taxonomy(
		'Epoque',
		array('chateaux','monuments-et-musees'),
		array(
			'label'=>__('Epoque'),
			'hierarchical'=>true,
			));

	register_taxonomy(
		'Style',
		array('chateaux','monuments-et-musees'),
		array(
			'label'=>__('Style'),
			'hierarchical'=>true,
			));

	register_taxonomy(
		'Roi',
		array('chateaux'),
		array(
			'label'=>__('Roi'),
			'hierarchical'=>true,
			));
}




