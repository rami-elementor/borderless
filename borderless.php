<?php

/*
Plugin Name: Borderless
Plugin URI: https://wpborderless.com/
Description: One service packed with powerful tools to help you reach your purposes.
Version: 1.3.5
Author: Visualmodo
Author URI: https://unicorp.global
License: GPLv3 or later
Text Domain: borderless
Domain Path: /languages
*/

// don't load directly
defined( 'ABSPATH' ) || exit;


/*-----------------------------------------------------------------------------------*/
/*  *.  Borderless Constants
/*-----------------------------------------------------------------------------------*/

define( 'BORDERLESS__VERSION', '1.3.5' );
define( 'BORDERLESS__DIR', plugin_dir_path( __FILE__ ) );
define( 'BORDERLESS__URL', plugins_url( '/', __FILE__ ) );
define( 'BORDERLESS__INC', BORDERLESS__DIR . '/includes' );
define( 'BORDERLESS__ASSETS', BORDERLESS__URL . 'assets/' );
define( 'BORDERLESS__STYLES', BORDERLESS__ASSETS . 'styles/' );
define( 'BORDERLESS__SCRIPTS', BORDERLESS__ASSETS . 'scripts/' );
define( 'BORDERLESS__LIB', BORDERLESS__ASSETS . 'lib/' );
define( 'BORDERLESS__WPBAKERY', BORDERLESS__DIR . '/modules/wpbakery' );
define( 'BORDERLESS__ELEMENTOR', BORDERLESS__DIR . '/modules/elementor' );
define( 'BORDERLESS__RELATED_POSTS', BORDERLESS__DIR . '/modules/related-posts' );

/*-----------------------------------------------------------------------------------*/
/*  *.  Borderless Core
/*-----------------------------------------------------------------------------------*/

require plugin_dir_path( __FILE__ ) . 'includes/class-borderless.php';

/*-----------------------------------------------------------------------------------*/
/*  *.  Borderless Init
/*-----------------------------------------------------------------------------------*/

function run_borderless() {

	$plugin = new Borderless();
	$plugin->run();

}
run_borderless();