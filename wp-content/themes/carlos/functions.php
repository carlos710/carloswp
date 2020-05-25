<?php
define('THEME_PATH', dirname(__FILE__));
include_once THEME_PATH . '/post-types/movie.php';
include_once THEME_PATH . '/inc/taxonomy.php';

function enqueue_scripts_action() {
	wp_register_style(
		'bootstrap',
		get_template_directory_uri() . '/css/bootstrap.min.css',
		[], '4.0.0', 'all'
	);
	wp_enqueue_style( 'bootstrap' );
}

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5d9fa22675deb3vid',
	'title' => 'Movie Fields',
	'fields' => array(
        array (
			'key' => 'field_5d9fa2318a51e',
			'label' => 'Movie Director',
			'name' => 'movie_director',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
        ),
		array(
			'key' => 'field_5b464a5c913ax',
			'label' => 'Movie Year',
			'name' => 'movie_year',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '1850',
			'max' => '2020',
			'step' => 1,
			'disabled' => 0
		),
	),

    'location' => array (
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'movie',
            ),
        ),
    ),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));
endif;



add_action( 'wp_enqueue_scripts', 'enqueue_scripts_action' ); // Add Theme Styles and Scripts