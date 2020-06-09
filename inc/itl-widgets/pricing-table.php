<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // If this file is called directly, abort.

class Widget_Itl_Pricing_Table extends Widget_Base {

	public function get_name() {
		return 'itl-pricing-table';
	}

	public function get_title() {
		return __( 'ITL - Pricing Table', 'msalon-core' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'ithemeslab-widgets' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'pricing_settings',
            [
                'label' => __( 'Pricing Header', 'msalon-core' )
            ]
        );

		$this->add_control(
			'pricing_title',
			[
				'label'       => __( 'Pricing Title', 'msalon-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Standard', 'msalon-core' ),
				'placeholder' => __( 'Basic, Standard, Premium', 'msalon-core' ),
			]
		);

		$this->add_control(
			'currency_symbol',
			[
				'label'       => __( 'Currency Symbol', 'msalon-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '$', 'msalon-core' ),
				'placeholder' => __( '$', 'msalon-core' ),
			]
		);

		$this->add_control(
			'primary_number',
			[
				'label'       => __( 'Price', 'msalon-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '79', 'msalon-core' ),
				'placeholder' => __( '79', 'msalon-core' ),
			]
		);

		$this->add_control(
			'floating_number',
			[
				'label'       => __( 'Floating Number', 'msalon-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '.49', 'msalon-core' ),
				'placeholder' => __( '.49', 'msalon-core' ),
			]
		);

		$this->add_control(
			'price_period',
			[
				'label' => __( 'Price Period', 'msalon-core' ),
				'description' => __( 'Mo = Per Month & Yr = Per Year', 'msalon-core'  ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'month',
				'label_on' => __( 'Mo', 'msalon-core' ),
				'label_off' => __( 'Yr', 'msalon-core' ),
				'return_value' => 'month',
			]
		);



		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_list_settings',
			[
				'label' => __( 'Pricing List items', 'msalon-core' )
			]
		);

		$this->add_control(
			'pricing_list_items',
			[
				'label' => __( 'Pricing List Items', 'msalon-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'item_title' => __( '1 GB Disk Space', 'msalon-core' ),
					],
					[
						'item_title' => __( '20 GB Bandwidth', 'msalon-core' ),
					],
					[
						'item_title' => __( 'Customer Support', 'msalon-core' ),
					],
				],
				'fields' => [
					[
						'name' => 'item_title',
						'label' => __( 'Item Title', 'msalon-core' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( '1 GB Disk Space' , 'msalon-core' ),
						'label_block' => true,
					],
                    [
                        'name' => 'icon',
                        'label' => __( 'Choose Icon', 'msalon-core' ),
                        'type' => Controls_Manager::ICON,
                        'default' => 'fa fa-check',
                    ],
				],
				'title_field' => '{{{ item_title }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button', 'msalon-core' ),
			]
		);

		$this->add_control(
			'btn-text',
			[
				'label' => __( 'Button Text', 'msalon-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Sign Up', 'msalon-core' ),
				'placeholder' => __( 'Sign Up', 'msalon-core' ),
			]
		);

		$this->add_control(
			'btn-link',
			[
				'label' => __( 'Link', 'msalon-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_alignment',
			[
				'label' => __( 'Alignment', 'msalon-core' ),
			]
		);
		$this->add_responsive_control(
			'pricing_table_align',
			[
				'label' => __( 'Alignment', 'msalon-core' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
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
				],
				'selectors' => [
					'{{WRAPPER}} .itl-pricing-table' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'msalon-core',
			[
				'label' => __('Content', 'msalon-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'msalon-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .itl-pricing-table .pricing-head .title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title', 'msalon-core' ),
				'selector' => '{{WRAPPER}} .itl-pricing-table .pricing-head .title',
			]
		);
		$this->start_controls_tabs('price_text');
			$this->start_controls_tab(
				'normal_state',
				[
					'label' => __('Normal', 'msalon-core'),
				]
			);
				$this->add_control(
					'price_text_color',
					[
						'label' => __( 'Price Text Color', 'msalon-core' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .itl-pricing-table .price-value' => 'color: {{VALUE}}',
						],
					]
				);
				$this->add_control(
					'price_bg_color',
					[
						'label' => __( 'Price BG Color', 'msalon-core' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .itl-pricing-table .price-value' => 'background-color: {{VALUE}}',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'price_text_typography',
						'label' => __( 'Price Text', 'msalon-core' ),
						'selector' => '{{WRAPPER}} .itl-pricing-table .price-value',
					]
				);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'hover_state',
				[
					'label' => __('Hover', 'msalon-core'),
				]
			);
			$this->add_control(
				'price_text_hover_color',
				[
					'label' => __( 'Price Text Color', 'msalon-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .itl-pricing-table .price-value:hover' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'price_bg_hover_color',
				[
					'label' => __( 'Price BG Color', 'msalon-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .itl-pricing-table:hover .price-value:hover' => 'background-color: {{VALUE}}',
					],
				]
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		$this->start_controls_section(
			'pricing_list_styles',
			[
				'label' => __('List Item', 'msalon-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'msalon-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .itl-pricing-table .pricing-list li span i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'list_item_color',
			[
				'label' => __( 'Price Text Color', 'msalon-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .itl-pricing-table .pricing-list li span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'list_item_typography',
				'label' => __( 'List Item', 'msalon-core' ),
				'selector' => '{{WRAPPER}} .itl-pricing-table .pricing-list li span',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'pricing_button_styles',
			[
				'label' => __('Button', 'msalon-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'pricing_button_tab'
		);

		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => __( 'Normal', 'plugin-name' ),
			]
		);
		$this->add_control(
			'btn_text_color',
			[
				'label' => __( 'Text Color', 'msalon-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .itl-pricing-table .btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __( 'Background Color', 'msalon-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .itl-pricing-table .btn' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .itl-pricing-table .btn',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'button_hover_tab',
			[
				'label' => __( 'Hover', 'plugin-name' ),
			]
		);
		$this->add_control(
			'btn_text_hover_color',
			[
				'label' => __( 'Text Color', 'msalon-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .itl-pricing-table .btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'btn_bg_hover_color',
			[
				'label' => __( 'Background Color', 'msalon-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .itl-pricing-table .btn:hover' => 'background: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		$this->add_render_attribute( 'wrapper', 'class', 'pricing-table-wrap' );
		$btn_link = $this->get_settings( 'btn-link' );
		$pricing_url = $btn_link['url'];
		$target = $btn_link['is_external'] ? 'target="_blank"' : '';
		$period = __( 'year', 'msalon-core' );
		if( 'month' == $settings['price_period'] ){
		    $period = $settings['price_period'];
        }
        ?>
        <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
            <div class="itl-pricing-table">
                <div class="pricing-head">
                    <div class="pricing-title">
                        <h3 class="title"><?php echo $settings['pricing_title'] ?></h3>
                        <!--<p class="subtitle"><?php //echo $settings['pricing_subtitle'] ?></p>-->
                    </div>
                    <h4 class="price-value">
                        <i><?php echo $settings['currency_symbol'] ?></i><?php echo $settings['primary_number'] ?><i><?php echo $settings['floating_number'] ?></i>
<!--                        <span> --><?php //echo __( 'per ', 'msalon-core' ) .$period; ?><!-- </span>-->
                    </h4>
                </div>
                <ul class="pricing-list">
                    <?php foreach ($settings['pricing_list_items'] as $list_item) { ?>
                    <li><span><i class=" <?php echo $list_item['icon']?>"></i> <?php echo $list_item['item_title']?></span></li>
                <?php } ?>
                </ul>
                <div class="pricing-footer">
                    <a href="<?php echo $pricing_url; ?>" class="btn pricing-btn" <?php echo $target; ?>>
                        <?php echo $settings['btn-text']; ?>
                    </a>
                </div>
            </div>
        </div>
        <?php

	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Itl_Pricing_Table() );
?>