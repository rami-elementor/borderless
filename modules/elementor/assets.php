<?php

// don't load directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Borderless_Elementor_Assets' ) ) {
	
	class Borderless_Elementor_Assets {

		private static $instance = null;

		public function init() {

			add_action( 'elementor/frontend/before_register_styles', array( $this, 'register_styles' ) );

			add_action( 'elementor/frontend/before_register_scripts', array( $this, 'register_scripts' ) );
			add_action( 'elementor/frontend/before_enqueue_scripts',  array( $this, 'enqueue_scripts' ) );

			add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'icon_font_styles' ) );
			add_action( 'elementor/preview/enqueue_styles',      array( $this, 'icon_font_styles' ) );
		
		}

		
		public function register_styles() {

			wp_register_style( 
				'elementor-widget-animated-text', 
				BORDERLESS__STYLES . 'elementor-widget-animated-text.css', 
				false, 
				BORDERLESS__VERSION
			);

			wp_register_style( 
				'elementor-widget-portfolio',
				BORDERLESS__STYLES . 'elementor-widget-portfolio.css', 
				false, 
				BORDERLESS__VERSION
			);

			wp_register_style(
				'font-awesome-5',
				ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/all.min.css',
				false,
				BORDERLESS__VERSION
			);

		}


		public function register_scripts() {

			wp_register_script( 
				'elementor-widget-marquee', 
				BORDERLESS__SCRIPTS . '/lib/marquee.js', [ 'elementor-frontend' ], 
				'1.5.2', 
				true 
			);

			wp_register_script( 
				'elementor-widget-isotope', 
				BORDERLESS__SCRIPTS . '/lib/isotope.js', [ 'elementor-frontend' ], 
				'3.0.6', 
				true 
			);

			wp_register_script( 
				'typewriterjs', 
				BORDERLESS__SCRIPTS . '/lib/typewriterjs.js', [ 'elementor-frontend' ], 
				'2.18.0', 
				true 
			);

		}

		public function enqueue_scripts() {

			wp_enqueue_script(
				'borderless-elementor',
				BORDERLESS__SCRIPTS . 'borderless-elementor.min.js', [ 'elementor-frontend' ], 
				BORDERLESS__VERSION, 
				true 
			);
		}

		public function icon_font_styles() {
			
			wp_enqueue_style(
				'borderless-icon-font',
				BORDERLESS__STYLES . 'borderless-icon-font.css', 
				false, 
				BORDERLESS__VERSION
			);

		}

		public static function get_instance() {
			
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
		
	}
	
}

function borderless_elementor_assets() {
	return Borderless_Elementor_Assets::get_instance();
}