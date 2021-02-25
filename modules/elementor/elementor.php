<?php

// don't load directly
defined( 'ABSPATH' ) || exit;

/*-----------------------------------------------------------------------------------*/
/*  *.  Borderless Category
/*-----------------------------------------------------------------------------------*/

function add_elementor_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
        'borderless',
        [
            'title' => __( 'Borderless', 'borderless' ),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );


/*-----------------------------------------------------------------------------------*/
/*  *.  Borderless Widgets
/*-----------------------------------------------------------------------------------*/

class Borderless_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
        include('helper.php');
        include('widgets/contact-form-7.php');
		include('widgets/team-member.php');
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Borderless\Widgets\Contact_Form_7() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Borderless\Widgets\Team_Member() );
	}

}

add_action( 'init', 'my_elementor_init' );
function my_elementor_init() {
	Borderless_Widgets::get_instance();
}