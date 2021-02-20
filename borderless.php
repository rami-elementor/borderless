<?php

/*
Plugin Name: Borderless
Plugin URI: https://borderless.visualmodo.com/
Description: One service packed with powerful tools to help you reach your purposes.
Version: 1.0.5
Author: Visualmodo
Author URI: https://visualmodo.com
License: GPLv3 or later
Text Domain: borderless
Domain Path: /languages
*/

// don't load directly
defined( 'ABSPATH' ) || exit;

/**
* Define Constants.
*/
define( 'BORDERLESS__VERSION', '1.0.5' );
define( 'BORDERLESS__DIR', plugin_dir_path( __FILE__ ) );
define( 'BORDERLESS__INC', BORDERLESS__DIR . '/includes' );
define( 'BORDERLESS__WPBAKERY', BORDERLESS__DIR . '/modules/wpbakery' );
define( 'BORDERLESS__ELEMENTOR', BORDERLESS__DIR . '/modules/elementor' );
define( 'BORDERLESS__RELATED_POSTS', BORDERLESS__DIR . '/modules/related-posts' );


/**
* Requires.
*/

$options = get_option( 'borderless' ); // Just for enable/disable requires.
require_once( BORDERLESS__DIR . "/dashboard.php");
require_once( BORDERLESS__INC . "/icon-manager/icon-manager.php");
require_once( BORDERLESS__INC . "/svg/svg.php");
if ( isset( $options['elementor'] ) ) { require_once( BORDERLESS__ELEMENTOR . "/elementor.php"); }
if ( isset( $options['related_posts'] ) ) { require_once( BORDERLESS__RELATED_POSTS . "/related-posts.php"); }

/*-----------------------------------------------------------------------------------*/
/*  *.  Borderless Construct 
/*-----------------------------------------------------------------------------------*/

class Borderless {
	function __construct() {
		
		// We safely integrate with WPBakery with this hook
		add_action( 'init', array( $this, 'wpbakeryCheck' ) );
		
		add_action( 'wp_enqueue_scripts', array( $this, 'frontendAssets' ) );
		add_action('admin_enqueue_scripts',array($this,'backendAssets'));
	}
	
	// Load plugin css and javascript files which you may need on front end of your site
	public function frontendAssets() {
		wp_register_style( 'borderless_frontend_style', plugins_url('assets/styles/borderless.min.css', __FILE__), array(), BORDERLESS__VERSION );
		wp_enqueue_style( 'borderless_frontend_style' );
		
		// If you need any javascript files on front end, here is how you can load them.
		wp_enqueue_script( 'borderless_frontend_script', plugins_url('assets/scripts/borderless.min.js', __FILE__), array(), BORDERLESS__VERSION, true );
	}
	
	function backendAssets($hook) {
		wp_enqueue_style('borderless_backend_style', plugins_url('assets/styles/backend.min.css', __FILE__) );
		
		// enqueue css files on backend
		if($hook == "post.php" || $hook == "post-new.php" || $hook == 'visual-composer_page_vc-roles'){
			if((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || is_ssl()) {
				$scheme = 'https';
			}
			else {
				$scheme = 'http';
			}
			$this->paths = wp_upload_dir();
			$this->paths['fonts']   = 'borderless_ip';
			$this->paths['fonturl'] = set_url_scheme($this->paths['baseurl'].'/'.$this->paths['fonts'], $scheme);
			$fonts = get_option('borderless_ip');
			if(is_array($fonts))
			{
				foreach($fonts as $font => $info)
				{
					if(strpos($info['style'], 'http://' ) !== false) {
						wp_enqueue_style('borderless-'.$font,$info['style']);
					} else {
						wp_enqueue_style('borderless-'.$font,trailingslashit($this->paths['fonturl']).$info['style']);
					}
				}
			}
		}
	}
	
	
	/**
	* WPBakery.
	*/	
	
	// Check if WPBakery is installed
	public function wpbakeryCheck() {
		if ( defined( 'WPB_VC_VERSION' ) ) {
			require_once( BORDERLESS__WPBAKERY . "/wpbakery.php");
		} else {
			add_action('admin_notices', array( $this, 'wpbakeryNotice' ));
			return;
		}   
	}
	
	// Show notice if your plugin is activated but WPBakery is not
	public function wpbakeryNotice() {
		$plugin_data = get_plugin_data(__FILE__);
		echo '
		<div class="updated">
		<p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="https://wpbakery.com/" target="_blank">WPBakery Page Builder</a></strong> plugin to be installed and activated on your site.', 'borderless'), $plugin_data['Name']).'</p>
		</div>';
	}
	
}
// Finally initialize code
new Borderless();