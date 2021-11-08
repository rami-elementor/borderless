<?php

namespace Borderless\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use Elementor\Utils;

class Marquee_Text extends Widget_Base {
	
	public function get_name() {
		return 'borderless-elementor-marquee-text';
	}
	
	public function get_title() {
		return 'Marquee Text';
	}
	
	public function get_icon() {
		return 'borderless-icon-marquee-text';
	}
	
	public function get_categories() {
		return [ 'borderless' ];
	}

	public function get_style_depends() {
		return [ 'borderless-elementor-style' ];
	}

	public function get_script_depends() {
		return [ 'borderless-elementor-marquee-script' ];
	}
	
	protected function _register_controls() {

		/*-----------------------------------------------------------------------------------*/
		/*  *.  Marquee Text - Content
		/*-----------------------------------------------------------------------------------*/

		$this->start_controls_section(
			'borderless_elementor_section_marquee_text_content',
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

		/*-----------------------------------------------------------------------------------*/
		/*  *.  Marquee Text/Settings - Content
		/*-----------------------------------------------------------------------------------*/

		$this->start_controls_section(
			'borderless_elementor_section_marquee_text_settings',
			[
				'label' => esc_html__( 'Settings', 'borderless' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'borderless_elementor_marquee_text_start_visible',
				[
					'label' => __( 'Start Visible', 'borderless' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'true',
					'default' => 'true',
				]
			);

			$this->add_control(
				'borderless_elementor_marquee_text_duplicated',
				[
					'label' => __( 'Duplicated', 'borderless' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'true',
					'default' => 'true',
				]
			);

			$this->add_control(
				'borderless_elementor_marquee_text_pause_on_hover',
				[
					'label' => __( 'Pause On Hover', 'borderless' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'true',
					'default' => 'false',
				]
			);

			$this->add_control(
				'borderless_elementor_marquee_text_direction',
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
				'borderless_elementor_marquee_text_duration',
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
				'borderless_elementor_marquee_text_gap',
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
				'borderless_elementor_marquee_text_delay_before_start',
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

		/*-----------------------------------------------------------------------------------*/
		/*  *.  Marquee Text - Style
		/*-----------------------------------------------------------------------------------*/

		$this->start_controls_section(
			'borderless_elementor_section_marquee_text_style',
			[
				'label' => esc_html__( 'Marquee Text', 'borderless'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

			$this->add_control(
				'borderless_elementor_marquee_text_color',
				[
					'label' => __( 'Color', 'borderless' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .borderless-elementor-marquee-text *' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'borderless_elementor_marquee_text_typography',
					'label' => __('Typography', 'borderless'),
					'scheme' => Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .borderless-elementor-marquee-text *',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'borderless_elementor_marquee_text_shadow',
					'label' => __( 'Text Shadow', 'borderless' ),
					'selector' => '{{WRAPPER}} .borderless-elementor-marquee-text *',
				]
			);

		$this->end_controls_section();
	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();	 

		$this->add_render_attribute( 'marquee-text', 'data-direction', $settings['borderless_elementor_marquee_text_direction'] );
		$this->add_render_attribute( 'marquee-text', 'data-duration', $settings['borderless_elementor_marquee_text_duration'] );
		$this->add_render_attribute( 'marquee-text', 'data-delayBeforeStart', $settings['borderless_elementor_marquee_text_delay_before_start'] );
		$this->add_render_attribute( 'marquee-text', 'data-gap', $settings['borderless_elementor_marquee_text_gap'] );
		$this->add_render_attribute( 'marquee-text', 'data-startVisible', $settings['borderless_elementor_marquee_text_start_visible'] );
		$this->add_render_attribute( 'marquee-text', 'data-duplicated', $settings['borderless_elementor_marquee_text_duplicated'] );
		$this->add_render_attribute( 'marquee-text', 'data-pauseOnHover', $settings['borderless_elementor_marquee_text_pause_on_hover'] );

		?>

		<div class="borderless-elementor-marquee-text-widget">
			<div class="borderless-elementor-marquee-text" <?php echo $this->get_render_attribute_string( 'marquee-text' ) ?>><?php echo wp_kses( ( $settings['borderless_elementor_marquee_text_content'] ), true ); ?></div>
		</div>

		<?php

	}
	
	protected function _content_template() {

    }
	
	
}