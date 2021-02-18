<?php

// don't load directly
defined( 'ABSPATH' ) || exit;


/*-----------------------------------------------------------------------------------*/
/*  *.  Borderless Dashboard
/*-----------------------------------------------------------------------------------*/

class BorderlessDashboard {
    
    public function __construct() {
        
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
        add_action( 'admin_init', array( $this, 'init_settings'  ) );
        
    }
    
    public function add_admin_menu() {
        
        add_menu_page(
            esc_html__( 'Settings', 'borderless' ),
            esc_html__( 'Borderless', 'borderless' ),
            'manage_options',
            'borderless.php',
            array( $this, 'page_layout' ),
            plugin_dir_url(__FILE__) . "/assets/img/borderless.svg",
            2
        );
        
    }
    
    public function init_settings() {
        
        register_setting(
            'settings_group',
            'borderless'
        );
        
        add_settings_section(
            'borderless_section',
            '',
            false,
            'borderless'
        );
        
        add_settings_field(
            'primary_color',
            __( 'Primary Color', 'borderless' ),
            array( $this, 'render_primary_color_field' ),
            'borderless',
            'borderless_section'
        );
        add_settings_field(
            'secondary_color',
            __( 'Secondary Color', 'borderless' ),
            array( $this, 'render_secondary_color_field' ),
            'borderless',
            'borderless_section'
        );
        add_settings_field(
            'text_color',
            __( 'Text Color', 'borderless' ),
            array( $this, 'render_text_color_field' ),
            'borderless',
            'borderless_section'
        );
        add_settings_field(
            'accent_color',
            __( 'Accent Color', 'borderless' ),
            array( $this, 'render_accent_color_field' ),
            'borderless',
            'borderless_section'
        );
        add_settings_field(
			'elementor',
			__( 'Elementor', 'borderless' ),
			array( $this, 'render_elementor_field' ),
			'borderless',
			'borderless_section'
		);
        add_settings_field(
			'related_posts',
			__( 'Related Posts', 'borderless' ),
			array( $this, 'render_related_posts_field' ),
			'borderless',
			'borderless_section'
		);
        
    }
    
    public function page_layout() {
        
        // Check required user capability
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'borderless' ) );
        }
        
        // Admin Page Layout
        
        ?><div class="wrap ve-page-welcome about-wrap">
        <h1><?php echo sprintf( __( 'Welcome to Borderless %s', 'borderless' ), isset( $matches[0] ) ? $matches[0] : BORDERLESS__VERSION ) ?></h1>
        
        <div class="about-text">
        <?php _e( 'Congratulations! Within minutes you can build complex layouts on the basis of our content elements and without touching a single line of code.', 'borderless' ) ?>
        </div>
        <div class="wp-badge ve-page-logo">
        <?php echo sprintf( __( 'Version %s', 'borderless' ), BORDERLESS__VERSION ) ?>
        </div>
        <p class="ve-page-actions">
        <a href="https://twitter.com/share" class="twitter-share-button"
        data-via="visualmodo"
        data-text="Take full control over your WordPress site with Borderless"
        data-url="https://visualmodo.com" data-size="large">Tweet</a>
        <script>! function ( d, s, id ) {
            var js, fjs = d.getElementsByTagName( s )[ 0 ], p = /^http:/.test( d.location ) ? 'http' : 'https';
            if ( ! d.getElementById( id ) ) {
                js = d.createElement( s );
                js.id = id;
                js.src = p + '://platform.twitter.com/widgets.js';
                fjs.parentNode.insertBefore( js, fjs );
            }
        }( document, 'script', 'twitter-wjs' );</script>
        </p>
        
        <?php
        echo '<h3>Settings</h3>' . "\n";
        echo '	<form action="options.php" method="post">' . "\n";
        
        settings_fields( 'settings_group' );
        do_settings_sections( 'borderless' );
        submit_button();
        
        echo '	</form>' . "\n";
        echo '</div>' . "\n";
        
        ?></div><?php
        
    }
    
    function render_primary_color_field() {
        
        // Retrieve data from the database.
        $options = get_option( 'borderless' );
        
        // Set default value.
        $value = isset( $options['primary_color'] ) ? $options['primary_color'] : '#3379fc';
        
        // Field output.
        echo '<input type="color" name="borderless[primary_color]" class="regular-text primary_color_field" placeholder="' . esc_attr__( '', 'borderless' ) . '" value="' . esc_attr( $value ) . '">';
        echo '<p class="description">' . __( 'Pick a primary color for the elements.', 'borderless' ) . '</p>';
        
    }
    
    function render_secondary_color_field() {
        
        // Retrieve data from the database.
        $options = get_option( 'borderless' );
        
        // Set default value.
        $value = isset( $options['secondary_color'] ) ? $options['secondary_color'] : '#3379fc';
        
        // Field output.
        echo '<input type="color" name="borderless[secondary_color]" class="regular-text secondary_color_field" placeholder="' . esc_attr__( '', 'borderless' ) . '" value="' . esc_attr( $value ) . '">';
        echo '<p class="description">' . __( 'Pick a secondary color for the elements.', 'borderless' ) . '</p>';
        
    }
    
    function render_text_color_field() {
        
        // Retrieve data from the database.
        $options = get_option( 'borderless' );
        
        // Set default value.
        $value = isset( $options['text_color'] ) ? $options['text_color'] : '';
        
        // Field output.
        echo '<input type="color" name="borderless[text_color]" class="regular-text text_color_field" placeholder="' . esc_attr__( '', 'borderless' ) . '" value="' . esc_attr( $value ) . '">';
        echo '<p class="description">' . __( 'Pick a text color for the elements.', 'borderless' ) . '</p>';
        
    }
    
    function render_accent_color_field() {
        
        // Retrieve data from the database.
        $options = get_option( 'borderless' );
        
        // Set default value.
        $value = isset( $options['accent_color'] ) ? $options['accent_color'] : '#3379fc';
        
        // Field output.
        echo '<input type="color" name="borderless[accent_color]" class="regular-text accent_color_field" placeholder="' . esc_attr__( '', 'borderless' ) . '" value="' . esc_attr( $value ) . '">';
        echo '<p class="description">' . __( 'Pick a accent color for the elements.', 'borderless' ) . '</p>';
        
    }

    function render_elementor_field() {

		// Retrieve data from the database.
		$options = get_option( 'borderless' );

		// Set default value.
		$value = isset( $options['elementor'] ) ? $options['elementor'] : true;

		// Field output.
		echo '<input type="checkbox" name="borderless[elementor]" class="elementor_field" value="checked" ' . checked( $value, 'checked', false ) . '> ' . __( '', 'borderless' );
		echo '<span class="description">' . __( 'Enable or Disable Elementor Support', 'borderless' ) . '</span>';

	}
    
    function render_related_posts_field() {

		// Retrieve data from the database.
		$options = get_option( 'borderless' );

		// Set default value.
		$value = isset( $options['related_posts'] ) ? $options['related_posts'] : '';

		// Field output.
		echo '<input type="checkbox" name="borderless[related_posts]" class="related_posts_field" value="checked" ' . checked( $value, 'checked', false ) . '> ' . __( '', 'borderless' );
		echo '<span class="description">' . __( 'Enable or Disable Related Posts', 'borderless' ) . '</span>';

	}
    
}

new BorderlessDashboard;