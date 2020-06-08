<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // If this file is called directly, abort.

class Widget_Itl_Blank extends Widget_Base {

	public function get_name() {
		return 'itl-team';
	}

	public function get_title() {
		return __( 'ITL - Team', 'msalon-core' );
	}

	public function get_icon() {
		return 'fa fa-user';
	}

	public function get_categories() {
		return [ 'ithemeslab-widgets' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
            'team_addon_settings',
            [
                'label' => __( 'Team Info', 'msalon-core' )
            ]
        );
		$this->add_control(
			'team_name',
			[
				'label'       => __( 'Name', 'itl-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'John Doe', 'itl-core' ),
				'placeholder' => __( 'Type your name here', 'itl-core' ),
			]
		);
		$this->add_control(
			'team_position',
			[
				'label'       => __( 'Position', 'itl-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Developer', 'itl-core' ),
				'placeholder' => __( 'Type your position here', 'itl-core' ),
			]
		);
		$this->add_control(
			'team_image',
			[
				'label' => __( 'Insert Image', 'itl-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'team_social_settings',
			[
				'label' => __( 'Social Links', 'msalon-core' ),
			]
		);

		$this->add_control(
			'socials',
			[
				'label' => __( 'Add social profile', 'msalon-core' ),
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
						'name' => 'social_icon',
						'label' => __( 'Choose Icon', 'msalon-core' ),
						'type' => Controls_Manager::ICON,
					],
					[
						'name' => 'social_link',
						'label' => __( 'Insert Link', 'msalon-core' ),
						'type' => Controls_Manager::URL,
						'default' => [
							'url' => 'http://',
							'is_external' => '',
						],
						'show_external' => false,
					],
				],
//				'title_field' => '{{{ Company_name }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'team_addon_styles',
			[
				'label' => __( 'Team Styles', 'msalon-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		$image = $this->get_settings( 'team_image' );
		?>
        <div class="team-box text-center">
            <div class="team-img">
<!--                <img src="assets/images/team/team-dark-1.jpg" alt="" class="img-responsive">-->
	            <?php echo wp_get_attachment_image( $image['id'], 'large' ); ?>
                <div class="overley">
                    <div class="team-social">
	                    <?php foreach ($settings['socials'] as $social) : ?>
                            <a href="<?php echo $social['social_link']['url'] ;?>" target="_blank"><i class="<?php echo $social['social_icon']; ?>"></i></a>
	                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="team-content">
                <h4><?php echo $settings['team_name']; ?></h4>
                <p><?php echo $settings['team_position']; ?></p>
            </div>
        </div> <!--/.team-box-->
	<?php
	}

	protected function content_template() {
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Itl_Blank() );
?>