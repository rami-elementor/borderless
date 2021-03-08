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

		wp_register_style(
			'font-awesome-5',
			ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/all.min.css',
			false,
			BORDERLESS__VERSION
		);

		return static::$instance;
	}

	protected function __construct() {
        include('helper.php');
        include('widgets/contact-form-7.php');
		include('widgets/team-member.php');
		include('widgets/testimonial.php');
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Borderless\Widgets\Contact_Form_7() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Borderless\Widgets\Team_Member() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Borderless\Widgets\Testimonial() );
	}

}

add_action( 'init', 'borderless_elementor_init' );
function borderless_elementor_init() {
	Borderless_Widgets::get_instance();
}