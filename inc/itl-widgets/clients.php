<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // If this file is called directly, abort.

class Widget_Itl_Clients extends Widget_Base {

	public function get_name() {
		return 'itl-clients';
	}

	public function get_title() {
		return __( 'ITL - Clients', 'msalon-core' );
	}

	public function get_icon() {
		return 'eicon-carousel';
	}

	public function get_categories() {
		return [ 'ithemeslab-widgets' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'client_settings',
            [
                'label' => __( 'Client Settings', 'msalon-core' )
            ]
        );

        $this->add_control(
			'clients',
			[
				'label' => __( 'Client Items', 'msalon-core' ),
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
						'name' => 'Company_name',
						'label' => __( 'Company Name', 'msalon-core' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Company' , 'msalon-core' ),
						'label_block' => true,
					],
					[
						'name' => 'client_image',
						'label' => __('Company Logo', 'msalon-core'),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'label_block' => true,
					],
				],
				'title_field' => '{{{ Company_name }}}',
			]
		);
		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'msalon-core' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'carousel_settings',
			[
				'label' => __( 'Carousel Options', 'msalon-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'item_count',
			[
				'label'   => __( 'Items', 'msalon-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
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
		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<div id="clients-carousel-<?php echo uniqid(); ?>" class="clients-carousel owl-carousel owl-theme" data-count="<?php esc_attr_e($count); ?>" data-autoplay="<?php esc_attr_e($autoplay); ?>" data-loop="<?php esc_attr_e($loop); ?>" data-nav="<?php esc_attr_e($nav); ?>" data-dots="<?php esc_attr_e($dots); ?>" data-speed="<?php esc_attr_e($speed); ?>" data-timeout="<?php esc_attr_e($timeout); ?>">
				<?php
				foreach ( $settings['clients'] as $client ) {
				$client_image = $client['client_image'];
					if ( ! empty( $client_image ) ) {
				?>
				<div class="client-item">
					<?php echo wp_get_attachment_image( $client_image['id'], 'thumbnail', false, array( 'class' => 'itl-client-image full' ) ); ?>
				</div>
					<?php }  }?>
			</div>
		</div>
<?php
	}
	protected function content_template() {
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Itl_Clients() );