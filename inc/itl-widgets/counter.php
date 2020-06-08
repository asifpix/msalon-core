<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // If this file is called directly, abort.

class Widget_Itl_Counter extends Widget_Base {

	public function get_name() {
		return 'itl-counter';
	}

	public function get_title() {
		return __( 'ITL - Counter', 'msalon-core' );
	}

	public function get_icon() {
		return 'fa eicon-counter';
	}

	public function get_categories() {
		return [ 'ithemeslab-widgets' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'counter_content_settings',
            [
                'label' => __( 'Counter Settings', 'msalon-core' )
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
			'count',
			[
				'label'   => __( 'Count', 'msalon-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 768,
				'min'     => 1,
				'max'     => 9999,
				'step'    => 1,
			]
		);
		$this->add_control(
			'counter_text',
			[
				'label'       => __( 'Counter Text', 'msalon-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Stunning Hair Styles', 'msalon-core' ),
				'placeholder' => __( 'Stunning Hair Styles', 'msalon-core' ),
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
			'counter_align',
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
					'{{WRAPPER}} .counter-box' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
//		$this->add_control(
//			'text_color',
//			[
//				'label' => __( 'Text Color', 'msalon-core' ),
//				'type' => Controls_Manager::COLOR,
//				'default' => "#333333",
//				'selectors' => [
//					'{{WRAPPER}} .percent' => 'color: {{VALUE}}',
//				],
//			]
//		);
		$this->end_controls_section();

		$this->start_controls_section(
			'your_addon_styles',
			[
				'label' => __( 'Style Section Title', 'msalon-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings        = $this->get_settings();
		$count         = intval( $settings['count'] );
		$icon_type = $settings['icon_type'];
		if( $icon_type == 'lineicon'){
			$this->add_render_attribute( 'i', 'class', $settings['line_icon'] );
		} else {
			$this->add_render_attribute( 'i', 'class', $settings['icon'] );
		}

		$icon_attributes = $this->get_render_attribute_string( 'icon' );
		?>
        <div class="counter-box" data-count="<?php echo $count; ?>">
            <div class="counter-icon">
                <i <?php echo $this->get_render_attribute_string( 'i' ); ?>></i>
            </div>
            <div class="counter-content">
                <h2 class="counter"></h2>
                <h4><?php echo $settings['counter_text']; ?></h4>
            </div>
        </div> <!--/.counter-box-->
	<?php }

	protected function content_template() {
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Itl_Counter() );
