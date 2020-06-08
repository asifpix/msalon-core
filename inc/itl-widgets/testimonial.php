<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // If this file is called directly, abort.

class Widget_Itl_Testimonial extends Widget_Base {

	public function get_name() {
		return 'itl-testimonial';
	}

	public function get_title() {
		return __( 'ITL - Testimonial', 'msalon-core' );
	}

	public function get_icon() {
		return 'fa fa-comments';
	}

	public function get_categories() {
		return [ 'ithemeslab-widgets' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'testimonial_settings',
            [
                'label' => __( 'Testimonial Settings', 'msalon-core' )
            ]
        );

        $this->add_control(
			'testimonials',
			[
				'label' => __( 'Testimonial Items', 'msalon-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'person_name' => __( 'Asif Islam', 'msalon-core' ),
					],
					[
						'person_name' => __( 'Iffat Tasnim', 'msalon-core' ),
					],
				],
				'fields' => [
					[
						'name' => 'person_name',
						'label' => __( 'Person Name', 'msalon-core' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Asif Islam' , 'msalon-core' ),
						'label_block' => true,
					],
					[
						'name' => 'person_image',
						'label' => __('Person Image', 'msalon-core'),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'label_block' => true,
					],
//					[
//						'name' => 'company_name',
//						'label' => __( 'Company Name or Position', 'msalon-core' ),
//						'type' => Controls_Manager::TEXT,
//						'default' => __( 'iThemesLab' , 'msalon-core' ),
//						'label_block' => true,
//					],
					[
						'name' => 'testimonial_content',
						'label' => __( 'Content', 'msalon-core' ),
						'type' => Controls_Manager::WYSIWYG,
						'default' => __( 'Testimonial Content', 'msalon-core' ),
						'show_label' => false,
					],
				],
				'title_field' => '{{{ person_name }}}',
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'carousel_settings',
			[
				'label' => __( 'Carousel Options', 'msalon-core' ),
			]
		);
		$this->add_control(
			'item_count',
			[
				'label'   => __( 'Items', 'msalon-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 1,
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'msalon-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => __( 'Yes', 'msalon-core' ),
				'label_off' => __( 'No', 'msalon-core' ),
				'return_value' => 'true',
			]
		);
		$this->add_control(
			'loop',
			[
				'label' => __( 'Loop', 'msalon-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'true',
				'label_on' => __( 'Yes', 'msalon-core' ),
				'label_off' => __( 'No', 'msalon-core' ),
				'return_value' => 'true',
			]
		);
		$this->add_control(
			'nav',
			[
				'label' => __( 'Nav', 'msalon-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'label_on' => __( 'Yes', 'msalon-core' ),
				'label_off' => __( 'No', 'msalon-core' ),
				'return_value' => 'true',
			]
		);
		$this->add_control(
			'show_dots',
			[
				'label' => __( 'Show Dots', 'msalon-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'label_on' => __( 'Yes', 'msalon-core' ),
				'label_off' => __( 'No', 'msalon-core' ),
				'return_value' => 'true',
			]
		);
		$this->add_control(
			'speed',
			[
				'label'   => __( 'Speed', 'msalon-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 250,
				'min'     => 250,
				'max'     => 6000,
				'step'    => 250,
			]
		);
		$this->add_control(
			'timeout',
			[
				'label'   => __( 'Timeout', 'msalon-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5000,
				'min'     => 500,
				'max'     => 10000,
				'step'    => 500,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'image_styles',
			[
				'label' => __( 'Image Styles', 'msalon-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'width',
			[
				'label' => __( 'Width', 'msalon-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 75,
				],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 300,
						'step' => 25,
					],
				],
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .testimonial-thumb img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'thumb_spacing',
			[
				'label' => __( 'Spacing', 'msalon-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-thumb img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'thumb_style',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'content_styles',
			[
				'label' => __( 'Content', 'msalon-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .testimonial-item-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Person Name Color', 'msalon-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-head-content h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'pos_color',
			[
				'label' => __( 'Position Name Color', 'msalon-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-head-content h5' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content Color', 'msalon-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-content p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'content_spacing',
			[
				'label' => __( 'Content Spacing', 'msalon-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		/*$this->add_responsive_control(
			'content_width',
			[
				'label' => __( 'Content Width', 'msalon-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 5,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-item-wrap' => 'max-width: {{SIZE}}{{UNIT}}; margin: auto;',
				],
			]
		);*/

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		$count    = intval( $settings['item_count'] );
		$autoplay = $settings['autoplay'];
		$loop     = $settings['loop'];
		$nav      = $settings['nav'];
		$dots     = $settings['show_dots'];
		$speed    = intval( $settings['speed'] );
		$timeout  = intval( $settings['timeout'] );
		?>
		<div id="testimonial-carousel-<?php echo uniqid(); ?>" class="testimonial-carousel owl-carousel owl-theme"  data-count="<?php esc_attr_e($count); ?>" data-autoplay="<?php esc_attr_e($autoplay); ?>" data-loop="<?php esc_attr_e($loop); ?>" data-nav="<?php esc_attr_e($nav); ?>" data-dots="<?php esc_attr_e($dots); ?>" data-speed="<?php esc_attr_e($speed); ?>" data-timeout="<?php esc_attr_e($timeout); ?>">
			<?php foreach ($settings['testimonials'] as $testimonial) : ?>
				<div class="testimonial-item">
                    <div class="testimonial-item-wrap">
                        <?php $person_image = $testimonial['person_image']; ?>
                        <div class="testimonial-content">
	                        <?php echo $testimonial['testimonial_content'];?>
                        </div>
                        <div class="testimonial-head">
                            <div class="testimonial-thumb">
	                            <?php echo wp_get_attachment_image( $person_image['id'], 'thumbnail', false, array( 'class' => 'itl-testimonial-image' ) ); ?>
                            </div>
                            <div class="testimonial-head-content">
                                <h4><?php echo $testimonial['person_name'];?></h4>
<!--                                <h5>--><?php //echo $testimonial['company_name'];?><!--</h5>-->
                            </div>
                        </div>
                    </div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Itl_Testimonial() );
?>