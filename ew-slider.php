<?php
	/*
	Plugin Name: EW slider
	Plugin URI: http://elegantweb.eu
	Description: Slaider mis kasutab owl-carouseli ja ACF PRO-d
	Version: 1.0.0
	Author: Veiko Teekel
	Author URI: http://elegantweb.eu
	License: GPL2
	 */

	function ew_slider() {
		register_post_type('Slaidid',
			array(
				'labels' => array(
					'name' => __('Slaidid'),
					'singular_name' => __('slaid'),

				),
				'public' => true,
				'taxonomies' => array('post_tag'),
				'menu_position' => 5,
				'rewrite' => array('slug' => 'slaid'),
				'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
			)
		);
	}

	add_action('init', 'ew_slider');

	function slaidirubriik_taxonomy() {
		register_taxonomy(
			'slaidirubriik',
			'slaidid',
			array(
				'hierarchical' => true,
				'label' => 'Slaidi rubriik',
				'query_var' => true,
				//'orderby' => 'date',
				'rewrite' => array('slug' => 'slaidi-rubriik'),
			)
		);
	}

	add_action('init', 'slaidirubriik_taxonomy');

	/**
	 * Create ACF options page under custom post type menu
	 *
	 * @since 1.0.0
	 */
	if (function_exists('acf_add_options_sub_page')) {
		acf_add_options_sub_page(array(
			'title' => 'Slaideri sätted',
			'parent' => 'edit.php?post_type=slaidid',
			'capability' => 'manage_options', // or edit_posts
		));
	}
	define('EW_URL', plugins_url('', __FILE__));
	define('EW_DIR', plugin_dir_path(__FILE__));
//echo EW_URL;

	/*function loadEwStyles() {
	wp_enqueue_style('owlcarouselcss', EW_DIR . '/owl-carousel/owl.carousel.min.css');
	wp_enqueue_style('owlthemecss', EW_DIR . '/owl-carousel/owl.theme.default.css');
	//	wp_enqueue_style('defaulcss', EW_DIR . '/css/ew-default.css');
	wp_enqueue_style('defaulcss', EW_DIR . '/css/ew-default.css');
	wp_enqueue_style('second-style');

	}*/

	function loadEwStyles() {
		wp_enqueue_style('owlcarouselmain', EW_URL . '/owl-carousel/owl.carousel.min.css', array(), '0.1', 'screen');
		wp_enqueue_style('owlcarouselcss', EW_URL . '/owl-carousel/owl.theme.default.css', array(), '0.1', 'screen');
		wp_enqueue_style('defaulcss', EW_URL . '/css/ew-default.css', array(), '0.1', 'screen');
	}

	add_action('wp_enqueue_scripts', 'loadEwStyles');

	function loadEwScripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('owljs', EW_URL . '/owl-carousel/owl.carousel.min.js');
	}
	add_action('wp_enqueue_scripts', 'loadEwScripts');

	include EW_DIR . 'slider_template.php';
include EW_DIR . 'acf-fields.php';
?>