<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Widget_Ithemeslab_Icon_Box extends Widget_Base {

	public function get_name() {
		return 'icon-box';
	}

	public function get_title() {
		return __( 'ITL - Icon Box', 'msalon-core' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'ithemeslab-widgets' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Icon Box', 'msalon-core' ),
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'msalon-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'msalon-core' ),
					'stacked' => __( 'Stacked', 'msalon-core' ),
					'framed' => __( 'Framed', 'msalon-core' ),
				],
				'default' => 'default',
				'prefix_class' => 'elementor-view-',
			]
		);

		$this->add_control(
			'icon_type',
			[
				'label' => __( 'Icon Type', 'itl-mae' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'fontawesome' => __( 'FontAwesome', 'msalon-core' ),
					'lineicon' => __( 'Flat Icon', 'msalon-core' ),
				],
				'default' => 'fontawesome',
			]
		);

		$this->add_control(
			'line_icon',
			[
				'label'       => __( 'Flat Icon', 'msalon-core' ),
				'type'        => Controls_Manager::SELECT,
				'options' => [
					'msaloon-icon flaticon-application' => __( 'Application', 'msalon-core' ),
					'msaloon-icon flaticon-boy-hair-shape' => __( 'Boy Hair Shape', 'msalon-core' ),
					'msaloon-icon flaticon-boy-happy-smile' => __( 'Boy Happy Smile', 'msalon-core' ),
					'msaloon-icon flaticon-brush' => __( 'Brush', 'msalon-core' ),
					'msaloon-icon flaticon-brush-tool' => __( 'Brush Tool', 'msalon-core' ),
					'msaloon-icon flaticon-circle' => __( 'Circle', 'msalon-core' ),
					'msaloon-icon flaticon-cut' => __( 'Cut', 'msalon-core' ),
					'msaloon-icon flaticon-cut-1' => __( 'Cut 1', 'msalon-core' ),
					'msaloon-icon flaticon-hair' => __( 'Hair', 'msalon-core' ),
					'msaloon-icon flaticon-hair-dryer-on' => __( 'Hair Dryer On', 'msalon-core' ),
					'msaloon-icon flaticon-japanese-candles' => __( 'Japanese Candles', 'msalon-core' ),
					'msaloon-icon flaticon-massage' => __( 'Massage', 'msalon-core' ),
					'msaloon-icon flaticon-mustache-shape' => __( 'Mustache Shape', 'msalon-core' ),
					'msaloon-icon flaticon-nail-file' => __( 'Nail File', 'msalon-core' ),
					'msaloon-icon flaticon-one-comb' => __( 'One Comb', 'msalon-core' ),
					'msaloon-icon flaticon-people' => __( 'People', 'msalon-core' ),
					'msaloon-icon flaticon-razor-hair-salon-tool' => __( 'Razor', 'msalon-core' ),
					'msaloon-icon flaticon-scissors' => __( 'Scissors', 'msalon-core' ),
					'msaloon-icon flaticon-scissors-1' => __( 'Scissors 1', 'msalon-core' ),
					'msaloon-icon flaticon-scissors-2' => __( 'Scissors 2', 'msalon-core' ),
					'msaloon-icon flaticon-scissors-3' => __( 'Scissors 3', 'msalon-core' ),
					'msaloon-icon flaticon-scissors-4' => __( 'Scissors 4', 'msalon-core' ),
					'msaloon-icon flaticon-scissors-and-comb' => __( 'Scissors & Comb 1', 'msalon-core' ),
					'msaloon-icon flaticon-scissors-and-comb-1' => __( 'Scissors & Comb 2', 'msalon-core' ),
					'msaloon-icon flaticon-scissors-opened-tool' => __( 'Scissors opend', 'msalon-core' ),
					'msaloon-icon flaticon-tool' => __( 'Tool', 'msalon-core' ),

				],
				'default'     => 'icon-layers',
				'condition' => [
					'icon_type' => 'lineicon'
				]
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Choose Icon', 'msalon-core' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-star',
				'condition' => [
					'icon_type' => 'fontawesome'
				]
			]
		);

		$this->add_control(
			'shape',
			[
				'label' => __( 'Shape', 'msalon-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'msalon-core' ),
					'square' => __( 'Square', 'msalon-core' ),
				],
				'default' => 'circle',
				'condition' => [
					'view!' => 'default',
				],
				'prefix_class' => 'elementor-shape-',
			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title & Description', 'msalon-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'This is the heading', 'msalon-core' ),
				'placeholder' => __( 'Your Title', 'msalon-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'description_text',
			[
				'label' => '',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'msalon-core' ),
				'placeholder' => __( 'Your Description', 'msalon-core' ),
				'title' => __( 'Input icon text here', 'msalon-core' ),
				'rows' => 10,
				'separator' => 'none',
				'show_label' => false,
			]
		);



		$this->add_control(
			'link',
			[
				'label' => __( 'Link to', 'msalon-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'http://your-link.com', 'msalon-core' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'position',
			[
				'label' => __( 'Icon Position', 'msalon-core' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'msalon-core' ),
						'icon' => 'fa fa-align-left',
					],
					'top' => [
						'title' => __( 'Top', 'msalon-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'msalon-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'elementor-position-',
				'toggle' => false,
			]
		);

		$this->add_control(
			'title_size',
			[
				'label' => __( 'Title HTML Tag', 'msalon-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'msalon-core' ),
					'h2' => __( 'H2', 'msalon-core' ),
					'h3' => __( 'H3', 'msalon-core' ),
					'h4' => __( 'H4', 'msalon-core' ),
					'h5' => __( 'H5', 'msalon-core' ),
					'h6' => __( 'H6', 'msalon-core' ),
					'div' => __( 'div', 'msalon-core' ),
					'span' => __( 'span', 'msalon-core' ),
					'p' => __( 'p', 'msalon-core' ),
				],
				'default' => 'h3',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'msalon-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'primary_color',
			[
				'label' => __( 'Primary Color', 'msalon-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#bc9355',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon, {{WRAPPER}}.elementor-view-default .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'secondary_color',
			[
				'label' => __( 'Secondary Color', 'msalon-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-view-framed .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_space',
			[
				'label' => __( 'Spacing', 'msalon-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-position-right .elementor-icon-box-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-left .elementor-icon-box-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.elementor-position-top .elementor-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Size', 'msalon-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
                    'size' => 60,
                ],
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon .msaloon-icon:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'msalon-core' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
					],
				],
				'condition' => [
					'view!' => 'default',
				],
			]
		);

		$this->add_control(
			'rotate',
			[
				'label' => __( 'Rotate', 'msalon-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'msalon-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view' => 'framed',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'msalon-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view!' => 'default',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_hover',
			[
				'label' => __( 'Icon Hover', 'msalon-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hover_primary_color',
			[
				'label' => __( 'Primary Color', 'msalon-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-view-stacked:hover .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed:hover .elementor-icon, {{WRAPPER}}.elementor-view-default:hover .elementor-icon' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_secondary_color',
			[
				'label' => __( 'Secondary Color', 'msalon-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'view!' => 'default',
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-view-framed .elementor-icon:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Animation', 'msalon-core' ),
				'type' => Controls_Manager::HOVER_ANIMATION,

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'msalon-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'msalon-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'msalon-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'msalon-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'msalon-core' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'msalon-core' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-box-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_vertical_alignment',
			[
				'label' => __( 'Vertical Alignment', 'msalon-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top' => __( 'Top', 'msalon-core' ),
					'middle' => __( 'Middle', 'msalon-core' ),
					'bottom' => __( 'Bottom', 'msalon-core' ),
				],
				'default' => 'top',
				'prefix_class' => 'elementor-vertical-align-',
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'msalon-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => __( 'Spacing', 'msalon-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
				        'size' => 25,
                ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'msalon-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Description', 'msalon-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'msalon-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .elementor-icon-box-content .elementor-icon-box-description',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$this->add_render_attribute( 'icon', 'class', [ 'elementor-icon', 'elementor-animation-' . $settings['hover_animation'] ] );

		$icon_tag = 'span';

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'link', 'href', $settings['link']['url'] );
			$icon_tag = 'a';

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'link', 'rel', 'nofollow' );
			}
		}
		$icon_type = $settings['icon_type'];
        if( $icon_type == 'lineicon'){
	        $this->add_render_attribute( 'i', 'class', $settings['line_icon'] );
        } else {
	        $this->add_render_attribute( 'i', 'class', $settings['icon'] );
        }

		$icon_attributes = $this->get_render_attribute_string( 'icon' );
		$link_attributes = $this->get_render_attribute_string( 'link' );
		?>
		<div class="elementor-icon-box-wrapper">
            <div class="elementor-icon-box-icon">
				<<?php echo implode( ' ', [ $icon_tag, $icon_attributes, $link_attributes ] ); ?>>
					<i <?php echo $this->get_render_attribute_string( 'i' ); ?>></i>
				</<?php echo $icon_tag; ?>>
			</div>
			<div class="elementor-icon-box-content">
				<<?php echo $settings['title_size']; ?> class="elementor-icon-box-title">
					<<?php echo implode( ' ', [ $icon_tag, $link_attributes ] ); ?>><?php echo $settings['title_text']; ?></<?php echo $icon_tag; ?>>
				</<?php echo $settings['title_size']; ?>>
				<p class="elementor-icon-box-description"><?php echo $settings['description_text']; ?></p>
			</div>
		</div>
		<?php
	}

	protected function _content_template() {
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Ithemeslab_Icon_Box() );