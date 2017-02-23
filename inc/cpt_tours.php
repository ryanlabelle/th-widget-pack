<?php
//-----------------------------------------------------
// themo_tour_custom_post_type
// Portfolio Post Type
//-----------------------------------------------------

if ( ! function_exists('themo_tour_custom_post_type') ) {

	// Register Custom Post Type
	function themo_tour_custom_post_type() {

		$labels = array(
			'name'                => _x( 'Tours', 'Post Type General Name', 'themovation-widgets' ),
			'singular_name'       => _x( 'Tour', 'Post Type Singular Name', 'themovation-widgets' ),
			'menu_name'           => __( 'Tours', 'themovation-widgets' ),
			'parent_item_colon'   => __( 'Parent Tour:', 'themovation-widgets' ),
			'all_items'           => __( 'All Tours', 'themovation-widgets' ),
			'view_item'           => __( 'View Tour', 'themovation-widgets' ),
			'add_new_item'        => __( 'Add New Tours', 'themovation-widgets' ),
			'add_new'             => __( 'Add New', 'themovation-widgets' ),
			'edit_item'           => __( 'Edit Tour', 'themovation-widgets' ),
			'update_item'         => __( 'Update Tour', 'themovation-widgets' ),
			'search_items'        => __( 'Search Tour', 'themovation-widgets' ),
			'not_found'           => __( 'Not found', 'themovation-widgets' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'themovation-widgets' ),
		);

		if ( function_exists( 'ot_get_option' ) ) {
			$custom_slug = ot_get_option( 'themo_tour_rewrite_slug', 'tours' );
		} else {
			$custom_slug = 'tours';
		}

		$rewrite = array(
			'slug'                => $custom_slug,
			'with_front'          => false,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'themo_tour', 'themovation-widgets' ),
			'description'         => __( 'Tours', 'themovation-widgets' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
			'taxonomies'          => array( 'themo_tour_type' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-star-empty',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
		);
		register_post_type( 'themo_tour', $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'themo_tour_custom_post_type', 0 );

}

//-----------------------------------------------------
// themo_tour_type
// Project Types Taxonomy
//-----------------------------------------------------

if ( ! function_exists( 'themo_tour_type' ) ) {

	// Register Custom Taxonomy
	function themo_tour_type() {

		$labels = array(
			'name'                       => _x( 'Tour Types', 'Taxonomy General Name', 'themovation-widgets' ),
			'singular_name'              => _x( 'Tour Type', 'Taxonomy Singular Name', 'themovation-widgets' ),
			'menu_name'                  => __( 'Tour Types', 'themovation-widgets' ),
			'all_items'                  => __( 'All Tour Types', 'themovation-widgets' ),
			'parent_item'                => __( 'Parent Tour Type', 'themovation-widgets' ),
			'parent_item_colon'          => __( 'Parent Tour Type:', 'themovation-widgets' ),
			'new_item_name'              => __( 'New Tour Type Name', 'themovation-widgets' ),
			'add_new_item'               => __( 'Add New Tour Type', 'themovation-widgets' ),
			'edit_item'                  => __( 'Edit Tour Type', 'themovation-widgets' ),
			'update_item'                => __( 'Update Tour Type', 'themovation-widgets' ),
			'separate_items_with_commas' => __( 'Separate Tour Type with commas', 'themovation-widgets' ),
			'search_items'               => __( 'Search Tour Types', 'themovation-widgets' ),
			'add_or_remove_items'        => __( 'Add or remove Tour type', 'themovation-widgets' ),
			'choose_from_most_used'      => __( 'Choose from the most Tour types', 'themovation-widgets' ),
			'not_found'                  => __( 'Not Found', 'themovation-widgets' ),
		);
		$rewrite = array(
			'slug'                       => 'tour-type',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'themo_tour_type', array( 'themo_tour' ), $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'themo_tour_type', 0 );

}


add_action( 'admin_init', 'th_register_tour_meta_boxes' );

function th_register_tour_meta_boxes()
{
    //-----------------------------------------------------
    // Page Layout, Sidebar, Content Editor Sort Order
    //-----------------------------------------------------
    $themo_tours_meta_box = array(
        'id' => 'th_tours_meta_box',
        'title' => __('Tour Grid Options', 'westwood'),
        'pages' => array('themo_tour'),
        'context' => 'normal',
        'priority' => 'sorted',
        'fields' => array(
            // START PAGE LAYOUT META BOX

            array(
                'id' => 'th_tour_highlight',
                'label' => 'Highlight',
                'type' => 'text',
            ),
            array(
                'id' => 'th_tour_title',
                'label' => 'Title',
                'type' => 'text',
            ),
            array(
                'id' => 'th_tour_intro',
                'label' => 'Intro',
                'type' => 'text',
            ),
            array(
                'id'          => "th_tour_thumb",
                'label'       => __( 'Thumbnail Image', 'westwood'),
                'type'        => 'upload',
                'class'       => 'ot-upload-attachment-id',
                'desc' => 'Sets the thumbnail image for Image post format only.',
            ),
            // END PAGE LAYOUT META BOX
        )
    );

    if (function_exists('ot_register_meta_box')) {
        ot_register_meta_box($themo_tours_meta_box);
    }

}


function jt_get_allowed_project_formats() {

    return array( 'image','link' );
}

add_action( 'load-post.php',     'jt_post_format_support_filter' );
add_action( 'load-post-new.php', 'jt_post_format_support_filter' );
add_action( 'load-edit.php',     'jt_post_format_support_filter' );

function jt_post_format_support_filter() {

    $screen = get_current_screen();

    // Bail if not on the projects screen.
    if ( empty( $screen->post_type ) ||  $screen->post_type !== 'themo_tour' )
        return;

    // Check if the current theme supports formats.
    if ( current_theme_supports( 'post-formats' ) ) {

        $formats = get_theme_support( 'post-formats' );

        // If we have formats, add theme support for only the allowed formats.
        if ( isset( $formats[0] ) ) {
            $new_formats = array_intersect( $formats[0], jt_get_allowed_project_formats() );

            // Remove post formats support.
            remove_theme_support( 'post-formats' );

            // If the theme supports the allowed formats, add support for them.
            if ( $new_formats )
                add_theme_support( 'post-formats', $new_formats );
        }
    }

    // Filter the default post format.
    add_filter( 'option_default_post_format', 'jt_default_post_format_filter', 95 );
}

function jt_default_post_format_filter( $format ) {

    return in_array( $format, jt_get_allowed_project_formats() ) ? $format : 'standard';
}