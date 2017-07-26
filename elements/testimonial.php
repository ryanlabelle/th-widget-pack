<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Themo_Widget_Testimonial extends Widget_Base {

	public function get_name() {
		return 'themo-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'th-widget-pack' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'themo-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => __( 'Testimonial', 'th-widget-pack' ),
			]
		);

		$this->add_control(
			'testimonial_content',
			[
				'label' => __( 'Content', 'th-widget-pack' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => '10',
				'default' => __( '“Amazing trip; Great whitewater, food, and awesome guides. We had an amazing trip. Big group, but easily accommodated by Thrillz Co. The food was amazing, the weather was perfect, and the rafting was fun”', 'th-widget-pack' ),
				'placeholder' => __( '“Amazing trip; Great whitewater, food, and awesome guides. We had an amazing trip. Big group, but easily accommodated by Thrillz Co. The food was amazing, the weather was perfect, and the rafting was fun”', 'th-widget-pack' ),
			]
		);

        $this->add_control(
            'text_size',
            [
                'label' => __( 'Content Size', 'th-widget-pack' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'sm' => __( 'Small', 'th-widget-pack' ),
                    'md' => __( 'Medium', 'th-widget-pack' ),
                    'lg' => __( 'Large', 'th-widget-pack' ),
                ],
                'default' => 'md',
            ]
        );


        $this->add_control(
            'star_rating',
            [
                'label' => __( 'Star Rating', 'th-widget-pack' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'th-widget-pack' ),
                'label_off' => __( 'No', 'th-widget-pack' ),
                'return_value' => 'yes',
            ]
        );


        $this->add_control(
            'rating',
            [
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 5,
                ],
                'range' => [
                    'px' => [
                        'min' => .5,
                        'max' => 5,
                        'step' => .5,
                    ],
                ],
                'condition' => [
                    'star_rating' => 'yes',
                ],
                /*'selectors' => [
                    '{{WRAPPER}} .box' => 'data-blah: {{SIZE}};',
                ],*/
                'separator' => 'none',
            ]
        );

		$this->add_control(
			'testimonial_image',
			[
				'label' => __( 'Add Image', 'th-widget-pack' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'testimonial_name',
			[
				'label' => __( 'Name', 'th-widget-pack' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Doug Martin',
				'placeholder' => 'Doug Martin',
			]
		);

		$this->add_control(
			'testimonial_job',
			[
				'label' => __( 'Job', 'th-widget-pack' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Adventurer',
				'placeholder' => 'Adventurer',
			]
		);

		$this->add_control(
			'testimonial_image_position',
			[
				'label' => __( 'Image Position', 'th-widget-pack' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'aside',
				'options' => [
					'aside' => __( 'Aside', 'th-widget-pack' ),
					'top' => __( 'Top', 'th-widget-pack' ),
				],
				'condition' => [
					'testimonial_image[url]!' => '',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'testimonial_alignment',
			[
				'label' => __( 'Alignment', 'th-widget-pack' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'center',
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'th-widget-pack' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'th-widget-pack' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'th-widget-pack' ),
						'icon' => 'fa fa-align-right',
					],
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'th-widget-pack' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();


        // Content
        $this->start_controls_section(
            'section_style_testimonial_content',
            [
                'label' => __( 'Colors', 'th-widget-pack' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'content_content_color',
			[
				'label' => __( 'Content', 'th-widget-pack' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-content' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
            'star_rating_color',
            [
                'label' => __( 'Star Rating', 'th-widget-pack' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_3,
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .th-star-rating' => 'color: {{VALUE}};',
                ],
            ]
        );


		$this->add_control(
			'name_text_color',
			[
				'label' => __( 'Name', 'th-widget-pack' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-name' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'job_text_color',
			[
				'label' => __( 'Job', 'th-widget-pack' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-job' => 'color: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();


	}

	protected function render() {

	    $settings = $this->get_settings();


		$this->add_render_attribute( 'wrapper', 'class', 'elementor-testimonial-wrapper' );
        $this->add_render_attribute( 'wrapper', 'class', 'th-testimonial-w' );

        $this->add_render_attribute( 'wrapper', 'class', 'th-txt-'.esc_attr( $settings['text_size'] ) );

		if ( $settings['testimonial_alignment'] ) {
			$this->add_render_attribute( 'wrapper', 'class', 'elementor-testimonial-text-align-' . esc_attr( $settings['testimonial_alignment'] ) );
		}

		$this->add_render_attribute( 'meta', 'class', 'elementor-testimonial-meta' );

		/*if ( $settings['testimonial_image']['url'] ) {
			$this->add_render_attribute( 'meta', 'class', 'elementor-has-image' );
		}*/

        if ( isset( $settings['testimonial_image']['id']) && $settings['testimonial_image']['id'] > "" ) {

            if ( $settings['testimonial_image']['id'] ) $image = wp_get_attachment_image( $settings['testimonial_image']['id'], 'th_img_sm_square', false, array( 'class' => 'th-team-member-image' ) );

        }elseif ( ! empty( $settings['testimonial_image']['url'] ) ) {
            $this->add_render_attribute( 'image', 'src', esc_url( $settings['testimonial_image']['url'] ) );
            $this->add_render_attribute( 'image', 'alt', esc_attr( Control_Media::get_image_alt( $settings['testimonial_image'] ) ) );
            $this->add_render_attribute( 'image', 'title', esc_attr( Control_Media::get_image_title( $settings['testimonial_image'] ) ) );
            $this->add_render_attribute( 'image', 'class', 'th-team-member-image' );
            $image = '<img ' . $this->get_render_attribute_string( 'image' ) . '>';
        }

		if ( $settings['testimonial_image_position'] ) {
			$this->add_render_attribute( 'meta', 'class', 'elementor-testimonial-image-position-' . esc_attr( $settings['testimonial_image_position'] ) );
		}

		$has_content = ! ! $settings['testimonial_content'];

		$has_image = ! ! $settings['testimonial_image']['url'];

		$has_name = ! ! $settings['testimonial_name'];

		$has_job = ! ! $settings['testimonial_job'];

		if ( ! $has_content && ! $has_image && ! $has_name && ! $has_job ) {
			return;
		}

        if ( $settings['rating']['size'] ) {
		    $th_rating = $settings['rating']['size'];
            $th_rating = $th_rating*10;
            $th_rating = sprintf("%02d", $th_rating);
            $this->add_render_attribute( 'star-rating', 'class', 'th-star-rating th-star-' . esc_attr( $th_rating ) );
        }

		?>
		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>

			<?php if ( $has_content ) : ?>
				<div class="elementor-testimonial-content"><?php echo wp_kses_post( $settings['testimonial_content'] ); ?></div>
			<?php endif; ?>

            <?php if ($settings['star_rating'] == 'yes') : ?>
                <div <?php echo $this->get_render_attribute_string( 'star-rating' ); ?>>
                    <span class="th-star-1 fa"></span>
                    <span class="th-star-2 fa"></span>
                    <span class="th-star-3 fa"></span>
                    <span class="th-star-4 fa"></span>
                    <span class="th-star-5 fa"></span>
                </div>
            <?php endif; ?>

			<?php if ( $has_image || $has_name || $has_job ) : ?>

                    <div <?php echo $this->get_render_attribute_string( 'meta' ); ?>>

				<div class="elementor-testimonial-meta-inner">
                    <?php if ( isset( $image ) ) : ?>
                        <div class="elementor-testimonial-image">
                            <?php echo wp_kses_post($image); ?>
                        </div>
                    <?php endif; ?>

					<?php if ( $has_name || $has_job ) : ?>
					<div class="elementor-testimonial-details">
						<?php if ( $has_name ) : ?>
							<div class="elementor-testimonial-name"><?php echo esc_html( $settings['testimonial_name'] ); ?></div>
						<?php endif; ?>

						<?php if ( $has_job ) : ?>
							<div class="elementor-testimonial-job"><?php echo esc_html( $settings['testimonial_job'] ); ?></div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	<?php
	}

	protected function _content_template() {}
}

Plugin::instance()->widgets_manager->register_widget_type( new Themo_Widget_Testimonial() );
