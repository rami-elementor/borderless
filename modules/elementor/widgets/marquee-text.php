<?php

namespace Borderless\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

class Marquee_Text extends Widget_Base {
	
	public function get_name() {
		return 'borderless-elementor-marquee-text';
	}
	
	public function get_title() {
		return 'Marquee Text';
	}
	
	public function get_icon() {
		return 'fa fa-envelope-o';
	}
	
	public function get_categories() {
		return [ 'borderless' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'borderless' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'borderless_elementor_marquee_text_content',
			[
				'label' => __( 'Text', 'borderless' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'borderless' ),
				'placeholder' => __( 'Type your description here', 'borderless' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'borderless_section_marquee_text_settings',
			[
				'label' => esc_html__( 'Settings', 'borderless' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'borderless_marquee_text_start_visible',
			[
				'label' => __( 'Start Visible', 'borderless' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'borderless_marquee_text_duplicated',
			[
				'label' => __( 'Duplicated', 'borderless' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'borderless_marquee_text_pause_on_hover',
			[
				'label' => __( 'Pause On Hover', 'borderless' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control(
			'borderless_marquee_text_direction',
			[
				'label' => __( 'Direction', 'borderless' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => __( 'Left', 'borderless' ),
					'right' => __( 'Right', 'borderless' ),
				],
			]
		);

		$this->add_control(
			'borderless_marquee_text_duration',
			[
				'label' => __( 'Duration', 'borderless' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1000,
				'max' => 100000,
				'step' => 100,
				'default' => 5000,
			]
		);

		$this->add_control(
			'borderless_marquee_text_gap',
			[
				'label' => __( 'Gap', 'borderless' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 99999,
				'step' => 1,
				'default' => 50,
			]
		);

		$this->add_control(
			'borderless_marquee_text_delay_before_start',
			[
				'label' => __( 'Delay Before Start', 'borderless' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 99999,
				'step' => 1,
				'default' => 0,
			]
		);


		$this->end_controls_section();
	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();	 

		$this->add_render_attribute( 'marquee-text', 'direction', $settings['borderless_marquee_text_direction'] );
		$this->add_render_attribute( 'marquee-text', 'duration', $settings['borderless_marquee_text_duration'] );
		$this->add_render_attribute( 'marquee-text', 'delay-before-start', $settings['borderless_marquee_text_delay_before_start'] );
		$this->add_render_attribute( 'marquee-text', 'gap', $settings['borderless_marquee_text_gap'] );
		$this->add_render_attribute( 'marquee-text', 'start-visible', $settings['borderless_marquee_text_start_visible'] );
		$this->add_render_attribute( 'marquee-text', 'duplicated', $settings['borderless_marquee_text_duplicated'] );
		$this->add_render_attribute( 'marquee-text', 'pause-on-hover', $settings['borderless_marquee_text_pause_on_hover'] );

		?>

		<div class="borderless-elementor-marquee-text-widget">
			<div class="borderless-elementor-marquee-text" <?php echo $this->get_render_attribute_string( 'marquee-text' ) ?>><?php echo wp_kses( ( $settings['borderless_elementor_marquee_text_content'] ), true ); ?></div>
		</div>

		<?php

	}
	
	protected function _content_template() {

    }
	
	
}