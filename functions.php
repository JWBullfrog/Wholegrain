<?php
/**
 * Wholegraindevtest functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wholegraindevtest
 */

if ( ! function_exists( 'wholegraindevtest_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wholegraindevtest_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Wholegraindevtest, use a find and replace
		 * to change 'wholegraindevtest' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wholegraindevtest', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wholegraindevtest' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );


	}
endif;
add_action( 'after_setup_theme', 'wholegraindevtest_setup' );


	/**
	 * Custom Post Types and Taxonomies
	 */

function cptui_register_my_cpts() {

	/**
	 * Post Type: Recipes.
	 */

	$labels = array(
		"name" => __( "Recipies", "wholegraindevtest" ),
		"singular_name" => __( "Recipie", "wholegraindevtest" ),
		"menu_name" => __( "Recipies", "wholegraindevtest" ),
		"all_items" => __( "All recipies", "wholegraindevtest" ),
		"add_new" => __( "Add a recipie", "wholegraindevtest" ),
		"add_new_item" => __( "Add new recipie", "wholegraindevtest" ),
		"edit_item" => __( "Edit recipie", "wholegraindevtest" ),
		"new_item" => __( "New recipie", "wholegraindevtest" ),
		"view_item" => __( "View recipie", "wholegraindevtest" ),
		"view_items" => __( "View recipies", "wholegraindevtest" ),
		"search_items" => __( "Search recipies", "wholegraindevtest" ),
		"not_found" => __( "No recipies found", "wholegraindevtest" ),
		"featured_image" => __( "Featured image for this recipie", "wholegraindevtest" ),
		"set_featured_image" => __( "Set featured image for this recipie", "wholegraindevtest" ),
		"remove_featured_image" => __( "Remove featured image for this recipie", "wholegraindevtest" ),
		"use_featured_image" => __( "Use featured image for this recipie", "wholegraindevtest" ),
	);

	$args = array(
		"label" => __( "Recipies", "wholegraindevtest" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "recipies", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "recipies", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Ingredients.
	 */

	$labels = array(
		"name" => __( "Ingredients", "wholegraindevtest" ),
		"singular_name" => __( "Ingredients", "wholegraindevtest" ),
	);

	$args = array(
		"label" => __( "Ingredients", "wholegraindevtest" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Ingredients",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'ingredients', 'with_front' => true, 'hierarchical' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "ingredients",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "indgredients", array( "recipies" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

	/**
	 * End Custom Post Types and Taxonomies
	 */

