<?php

/**
 * Registers the `genre` taxonomy,
 * for use with 'movie'.
 */
function genre_init() {
	register_taxonomy( 'genre', array( 'movie' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Genres', 'YOUR-TEXTDOMAIN' ),
			'singular_name'              => _x( 'Genre', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
			'search_items'               => __( 'Search Genres', 'YOUR-TEXTDOMAIN' ),
			'popular_items'              => __( 'Popular Genres', 'YOUR-TEXTDOMAIN' ),
			'all_items'                  => __( 'All Genres', 'YOUR-TEXTDOMAIN' ),
			'parent_item'                => __( 'Parent Genre', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'          => __( 'Parent Genre:', 'YOUR-TEXTDOMAIN' ),
			'edit_item'                  => __( 'Edit Genre', 'YOUR-TEXTDOMAIN' ),
			'update_item'                => __( 'Update Genre', 'YOUR-TEXTDOMAIN' ),
			'view_item'                  => __( 'View Genre', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'               => __( 'Add New Genre', 'YOUR-TEXTDOMAIN' ),
			'new_item_name'              => __( 'New Genre', 'YOUR-TEXTDOMAIN' ),
			'separate_items_with_commas' => __( 'Separate genres with commas', 'YOUR-TEXTDOMAIN' ),
			'add_or_remove_items'        => __( 'Add or remove genres', 'YOUR-TEXTDOMAIN' ),
			'choose_from_most_used'      => __( 'Choose from the most used genres', 'YOUR-TEXTDOMAIN' ),
			'not_found'                  => __( 'No genres found.', 'YOUR-TEXTDOMAIN' ),
			'no_terms'                   => __( 'No genres', 'YOUR-TEXTDOMAIN' ),
			'menu_name'                  => __( 'Genres', 'YOUR-TEXTDOMAIN' ),
			'items_list_navigation'      => __( 'Genres list navigation', 'YOUR-TEXTDOMAIN' ),
			'items_list'                 => __( 'Genres list', 'YOUR-TEXTDOMAIN' ),
			'most_used'                  => _x( 'Most Used', 'genre', 'YOUR-TEXTDOMAIN' ),
			'back_to_items'              => __( '&larr; Back to Genres', 'YOUR-TEXTDOMAIN' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'genre',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'genre_init' );

/**
 * Sets the post updated messages for the `genre` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `genre` taxonomy.
 */
function genre_updated_messages( $messages ) {

	$messages['genre'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Genre added.', 'YOUR-TEXTDOMAIN' ),
		2 => __( 'Genre deleted.', 'YOUR-TEXTDOMAIN' ),
		3 => __( 'Genre updated.', 'YOUR-TEXTDOMAIN' ),
		4 => __( 'Genre not added.', 'YOUR-TEXTDOMAIN' ),
		5 => __( 'Genre not updated.', 'YOUR-TEXTDOMAIN' ),
		6 => __( 'Genres deleted.', 'YOUR-TEXTDOMAIN' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'genre_updated_messages' );
