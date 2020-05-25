<?php

/**
 * Registers the `movie` post type.
 */
function movie_init() {
	register_post_type( 'movie', array(
		'labels'                => array(
			'name'                  => __( 'Movies', 'carlos' ),
			'singular_name'         => __( 'Movie', 'carlos' ),
			'all_items'             => __( 'All Movies', 'carlos' ),
			'archives'              => __( 'Movie Archives', 'carlos' ),
			'attributes'            => __( 'Movie Attributes', 'carlos' ),
			'insert_into_item'      => __( 'Insert into Movie', 'carlos' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'carlos' ),
			'featured_image'        => _x( 'Featured Image', 'movie', 'carlos' ),
			'set_featured_image'    => _x( 'Set featured image', 'movie', 'carlos' ),
			'remove_featured_image' => _x( 'Remove featured image', 'movie', 'carlos' ),
			'use_featured_image'    => _x( 'Use as featured image', 'movie', 'carlos' ),
			'filter_items_list'     => __( 'Filter Movies list', 'carlos' ),
			'items_list_navigation' => __( 'Movies list navigation', 'carlos' ),
			'items_list'            => __( 'Movies list', 'carlos' ),
			'new_item'              => __( 'New Movie', 'carlos' ),
			'add_new'               => __( 'Add New', 'carlos' ),
			'add_new_item'          => __( 'Add New Movie', 'carlos' ),
			'edit_item'             => __( 'Edit Movie', 'carlos' ),
			'view_item'             => __( 'View Movie', 'carlos' ),
			'view_items'            => __( 'View Movies', 'carlos' ),
			'search_items'          => __( 'Search Movies', 'carlos' ),
			'not_found'             => __( 'No Movies found', 'carlos' ),
			'not_found_in_trash'    => __( 'No Movies found in trash', 'carlos' ),
			'parent_item_colon'     => __( 'Parent Movie:', 'carlos' ),
			'menu_name'             => __( 'Movies', 'carlos' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'movie',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'movie_init' );

/**
 * Sets the post updated messages for the `movie` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `movie` post type.
 */
function movie_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['movie'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Movie updated. <a target="_blank" href="%s">View Movie</a>', 'carlos' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'carlos' ),
		3  => __( 'Custom field deleted.', 'carlos' ),
		4  => __( 'Movie updated.', 'carlos' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Movie restored to revision from %s', 'carlos' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Movie published. <a href="%s">View Movie</a>', 'carlos' ), esc_url( $permalink ) ),
		7  => __( 'Movie saved.', 'carlos' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Movie submitted. <a target="_blank" href="%s">Preview Movie</a>', 'carlos' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Movie scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Movie</a>', 'carlos' ),
		date_i18n( __( 'M j, Y @ G:i', 'carlos' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Movie draft updated. <a target="_blank" href="%s">Preview Movie</a>', 'carlos' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'movie_updated_messages' );
