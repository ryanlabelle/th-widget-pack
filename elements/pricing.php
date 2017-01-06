<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Themo_Widget_Pricing extends Widget_Base {

	public function get_name() {
		return 'themo-pricing';
	}

	public function get_title() {
		return __( 'Pricing', 'elementor' );
	}

	public function get_icon() {
		return 'pricing';
	}

	public function get_categories() {
		return [ 'themo-elements' ];
	}

	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'elementor-pro' ),
			'sm' => __( 'Small', 'elementor-pro' ),
			'md' => __( 'Medium', 'elementor-pro' ),
			'lg' => __( 'Large', 'elementor-pro' ),
			'xl' => __( 'Extra Large', 'elementor-pro' ),
		];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_pricing',
			[
				'label' => __( 'Pricing Table', 'elementor' ),
			]
		);

		$this->add_control(
			'pricing',
			[
				'label' => __( 'Pricing Table', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'url' => 'http://your-link.com'
					]
				],
				'fields' => [
					[
						'name' => 'price_col_background',
						'label' => __( 'Background Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#bbbbbb',
						'selectors' => [
							'{{WRAPPER}} #main-flex-slider {{CURRENT_ITEM}} .slider-bg' => 'background-color: {{VALUE}}',
						],
					],
					[
						'name' => 'price_col_title',
						'label' => __( 'Name', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'placeholder' => __( 'Starter', 'elementor' ),
						'label_block' => true,
					],
					[
						'name' => 'price_col_price',
						'label' => __( 'Price', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'placeholder' => __( 'Free', 'elementor' ),
						'label_block' => true,
					],
					[
						'name' => 'price_col_text',
						'label' => __( 'Price text', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'placeholder' => __( '/month', 'elementor' ),
						'label_block' => true,
					],
					[
						'name' => 'price_col_description',
						'label' => __( 'Description', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'placeholder' => __( 'List all details here. Use line break to for new line.', 'elementor' ),
						'label_block' => true,
					],
					[
						'name' => 'price_col_button_1_text',
						'label' => __( 'Button 1 Text', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Click Here', 'elementor' ),
					],
					[
						'name' => 'price_col_button_1_link',
						'label' => __( 'Button 1 Link', 'elementor' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'http://your-link.com', 'elementor' ),
					],
					[
						'name' => 'price_col_button_2_text',
						'label' => __( 'Button 2 Text', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Click Here', 'elementor' ),
					],
					[
						'name' => 'price_col_button_2_link',
						'label' => __( 'Button 2 Link', 'elementor' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'http://your-link.com', 'elementor' ),
					],
					[
						'name' => 'price_col_featured',
						'label' => __( 'Featured', 'elementor' ),
						'type' => Controls_Manager::CHECKBOX,
						'default' => false,
					]
				],
				'title_field' => '{{{ price_col_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .th-team-member-bio' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .th-team-member-bio',
			]
		);

		$this->add_control(
			'price_color',
			[
				'label' => __( 'Price Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .th-team-member-bio' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'label' => __( 'Price Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .th-team-member-bio',
			]
		);

		$this->add_control(
			'price_text_color',
			[
				'label' => __( 'Price Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .th-team-member-bio' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_text_typography',
				'label' => __( 'Price Text Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .th-team-member-bio',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Description Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .th-team-member-bio' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => __( 'Description Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .th-team-member-bio',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_button_1',
			[
				'label' => __( 'Button 1', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_size_1',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button_sizes(),
			]
		);

		$this->add_control( 'button_color_1',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'color: {{VALUE}}; border-color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography_1',
				'label' => __( 'Typography', 'elementor' ),
				'selector' => '{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1',
			]
		);

		$this->add_control(
			'button_border_width_1',
			[
				'label' => __( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
				],
			]
		);

		$this->add_control(
			'button_border_radius_1',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->start_controls_tabs( 'button_1_tabs' );

		$this->start_controls_tab( 'normal_1', [ 'label' => __( 'Normal', 'elementor' ) ] );

		$this->add_control(
			'button_text_color_1',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color_1',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color_1',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover_1', [ 'label' => __( 'Hover', 'elementor' ) ] );

		$this->add_control(
			'button_hover_text_color_1',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_background_color_1',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color_1',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_button_2',
			[
				'label' => __( 'Button 2', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_size_2',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button_sizes(),
			]
		);

		$this->add_control( 'button_color_2',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'color: {{VALUE}}; border-color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography_2',
				'label' => __( 'Typography', 'elementor' ),
				'selector' => '{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2',
			]
		);

		$this->add_control(
			'button_border_width_2',
			[
				'label' => __( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
				],
			]
		);

		$this->add_control(
			'button_border_radius_2',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->start_controls_tabs( 'button_2_tabs' );

		$this->start_controls_tab( 'normal_2', [ 'label' => __( 'Normal', 'elementor' ) ] );

		$this->add_control(
			'button_text_color_2',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color_2',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color_2',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover_2', [ 'label' => __( 'Hover', 'elementor' ) ] );

		$this->add_control(
			'button_hover_text_color_2',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_background_color_2',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color_2',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_featured',
			[
				'label' => __( 'Featured', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'featured_title_color',
			[
				'label' => __( 'Title Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .th-team-member-bio' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'featured_title_typography',
				'label' => __( 'Title Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .th-team-member-bio',
			]
		);

		$this->add_control(
			'featured_price_color',
			[
				'label' => __( 'Price Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .th-team-member-bio' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'featured_price_typography',
				'label' => __( 'Price Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .th-team-member-bio',
			]
		);

		$this->add_control(
			'featured_price_text_color',
			[
				'label' => __( 'Price Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .th-team-member-bio' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'featured_price_text_typography',
				'label' => __( 'Price Text Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .th-team-member-bio',
			]
		);

		$this->add_control(
			'featured_description_color',
			[
				'label' => __( 'Description Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .th-team-member-bio' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'featured_description_typography',
				'label' => __( 'Description Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .th-team-member-bio',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_featured_button_1',
			[
				'label' => __( 'Featured Button 1', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'featured_button_size_1',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button_sizes(),
			]
		);

		$this->add_control( 'featured_button_color_1',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'color: {{VALUE}}; border-color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'featured_button_typography_1',
				'label' => __( 'Typography', 'elementor' ),
				'selector' => '{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1',
			]
		);

		$this->add_control(
			'featured_button_border_width_1',
			[
				'label' => __( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
				],
			]
		);

		$this->add_control(
			'featured_button_border_radius_1',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->start_controls_tabs( 'featured_button_1_tabs' );

		$this->start_controls_tab( 'featured_normal_1', [ 'label' => __( 'Normal', 'elementor' ) ] );

		$this->add_control(
			'featured_button_text_color_1',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'featured_button_background_color_1',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'featured_button_border_color_1',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'featured_hover_1', [ 'label' => __( 'Hover', 'elementor' ) ] );

		$this->add_control(
			'featured_button_hover_text_color_1',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'featured_button_hover_background_color_1',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'featured_button_hover_border_color_1',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-1:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_featured_button_2',
			[
				'label' => __( 'Featured Button 2', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'featured_button_size_2',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button_sizes(),
			]
		);

		$this->add_control( 'featured_button_color_2',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'color: {{VALUE}}; border-color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'featured_button_typography_2',
				'label' => __( 'Typography', 'elementor' ),
				'selector' => '{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2',
			]
		);

		$this->add_control(
			'featured_button_border_width_2',
			[
				'label' => __( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
				],
			]
		);

		$this->add_control(
			'featured_button_border_radius_2',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->start_controls_tabs( 'featured_button_2_tabs' );

		$this->start_controls_tab( 'featured_normal_2', [ 'label' => __( 'Normal', 'elementor' ) ] );

		$this->add_control(
			'featured_button_text_color_2',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'featured_button_background_color_2',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'featured_button_border_color_2',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'featured_hover_2', [ 'label' => __( 'Hover', 'elementor' ) ] );

		$this->add_control(
			'featured_button_hover_text_color_2',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'featured_button_hover_background_color_2',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'featured_button_hover_border_color_2',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #main-flex-slider .slider-bg .container .th-button-2:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		?>

		<?php
	}

	protected function _content_template() {
		?>

		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Themo_Widget_Pricing() );
