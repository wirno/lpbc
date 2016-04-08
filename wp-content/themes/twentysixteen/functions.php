<?php

add_theme_support('post-thumbnails');
add_action('init', 'create_custom_post_type');
add_action('init', 'create_custom_taxonomy');

function create_custom_post_type(){
	register_post_type('castle',array(
		'labels'=>array(
			'name'=>__('Château'),
			'all_items'=>('Tous les châteaux'),
			'singular_name'=>__('Château'),
			'add_new'=>('Ajouter un château')
		),
		'public'=>true,
		'supports'=>array(
			'editor','thumbnail','comments'),
		'has_archive'=>true
	));


	register_post_type('event',array(
		'labels'=>array(
			'name'=>__('Evénement'),
			'all_items'=>('Tous les événements'),
			'singular_name'=>__('Evénement'),
			'add_new'=>('Ajouter un événement')
		),
		'public'=>true,
		'supports'=>array(
			'editor','thumbnail','comments'),
		'has_archive'=>true
	));

		register_post_type('anecdote',array(
		'labels'=>array(
			'name'=>__('Anecdote'),
			'all_items'=>('Toutes les anecdotes'),
			'singular_name'=>__('Anecdote'),
			'add_new'=>('Ajouter une anecdote')
		),
		'public'=>true,
		'supports'=>array(
			'editor','thumbnail','comments'),
		'has_archive'=>true
	));

	register_post_type('m_mh',array(
		'labels'=>array(
			'name'=>__('Monument et musée'),
			'all_items'=>('Tous les monuments et musées'),
			'singular_name'=>__('Monument et musée'),
			'add_new'=>('Ajouter un musée ou monument')
		),
		'public'=>true,
		'supports'=>array(
			'editor','thumbnail','comments'),
		'has_archive'=>true
	));

	register_post_type('poi',array(
		'labels'=>array(
			'name'=>__("Point d'intérêt"),
			'all_items'=>("Tous les points d'intérêts"),
			'singular_name'=>__("Point d'intérêt"),
			'add_new'=>("Ajouter un point d'intérêt")
		),
		'public'=>true,
		'supports'=>array(
			'editor','thumbnail','comments'),
		'has_archive'=>true
	));


	register_post_type('region',array(
		'labels'=>array(
			'name'=>__("Région"),
			'all_items'=>("Tous les régions"),
			'singular_name'=>__("Région"),
			'add_new'=>("Ajouter une région")
		),
		'public'=>true,
		'supports'=>array(
			'editor','thumbnail','comments'),
		'has_archive'=>true
	));
}

function create_custom_taxonomy(){
	register_taxonomy(
		'Region',
		array('castle','m_mh','poi','region'),
		array(
			'label'=>__('Region'),
			'hierarchical'=>true,
			));

	register_taxonomy(
		'Epoque',
		array('castle','m_mh'),
		array(
			'label'=>__('Epoque'),
			'hierarchical'=>true,
			));

	register_taxonomy(
		'Style',
		array('castle','m_mh'),
		array(
			'label'=>__('Style'),
			'hierarchical'=>true,
			));

	register_taxonomy(
		'Roi',
		array('castle'),
		array(
			'label'=>__('Roi'),
			'hierarchical'=>true,
			));
}




