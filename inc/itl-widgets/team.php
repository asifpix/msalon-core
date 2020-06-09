<?php
	namespace Elementor;

	if ( !defined( 'ABSPATH' ) ) {
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
			return ['ithemeslab-widgets'];
		}

		protected function _register_controls() {
			$this->start_controls_section(
				'team_addon_settings',
				[
					'label' => __( 'Team Info', 'msalon-core' ),
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
					'label'   => __( 'Insert Image', 'itl-core' ),
					'type'    => Controls_Manager::MEDIA,
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
					'label'   => __( 'Add social profile', 'msalon-core' ),
					'type'    => Controls_Manager::REPEATER,
					'default' => [
						[
							'person_name' => __( 'Asif Islam', 'msalon-core' ),
						],
						[
							'person_name' => __( 'Iffat Tasnim', 'msalon-core' ),
						],
					],
					'fields'  => [
						[
							'name'  => 'social_icon',
							'label' => __( 'Choose Icon', 'msalon-core' ),
							'type'  => Controls_Manager::ICON,
						],
						[
							'name'          => 'social_link',
							'label'         => __( 'Insert Link', 'msalon-core' ),
							'type'          => Controls_Manager::URL,
							'default'       => [
								'url'         => 'http://',
								'is_external' => '',
							],
							'show_external' => false,
						],
					],
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
			$this->start_controls_tabs(
				'style_team_tabs'
			);
			$this->start_controls_tab(
				'style_normal_state',
				[
					'label' => __( 'Normal', 'msalon-core' ),
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name'     => 'team_border_normal',
					'label'    => __( 'Border', 'msalon-core' ),
					'selector' => '{{WRAPPER}} .team-box',
				]
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'style_hover_state',
				[
					'label' => __( 'Hover', 'msalon-core' ),
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name'     => 'team_border_hover',
					'label'    => __( 'Border', 'msalon-core' ),
					'selector' => '{{WRAPPER}} .team-box:hover',
				]
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
			$this->start_controls_section(
				'team_content_color_style',
				[
					'label' => __( 'Content', 'msalon-core' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_control(
				'title_color',
				[
					'label'     => __( 'Title Color', 'msalon-core' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .team-box .team-content h4' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name'     => 'title_typography',
					'label'    => __( 'Title', 'msalon-core' ),
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .team-box .team-content h4',
				]
			);
			$this->add_control(
				'position_color',
				[
					'label'     => __( 'Position Color', 'msalon-core' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .team-box .team-content p' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name'     => 'position_typography',
					'label'    => __( 'Position', 'msalon-core' ),
					'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .team-box .team-content p',
				]
			);
			$this->end_controls_section();
			
			$this->start_controls_section(
				'team_social_style_section',
				[
					'label' => __( 'Social Icon', 'msalon-core' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);
				$this->start_controls_tabs('social_icon_tab');
					$this->start_controls_tab(
						'social_style_normal_state',
						[
							'label' => __('Normal', 'msalon-core'),
						],
					);
					$this->add_control(
						'triangle_color',
						[
							'label'     => __( 'Triangle Color', 'msalon-core' ),
							'type'      => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .team-box .team-img .overley:before' => 'border-color: transparent transparent {{VALUE}} transparent',
							],
						]
					);
					$this->add_control(
						'icon_color',
						[
							'label'     => __( 'Color', 'msalon-core' ),
							'type'      => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .team-box .team-img .overley .team-social a i' => 'color: {{VALUE}};',
							],
						]
					);
					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name'     => 'icon_border_normal',
							'label'    => __( 'Border', 'msalon-core' ),
							'selector' => '{{WRAPPER}} .team-box .team-img .overley .team-social a i',
						]
					);
					$this->end_controls_tab();
					$this->start_controls_tab(
						'social_style_hover_state',
						[
							'label' => __('Hover', 'msalon-core'),
						],
					);
					$this->add_control(
						'icon_hover_color',
						[
							'label'     => __( 'Color', 'msalon-core' ),
							'type'      => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .team-box .team-img .overley .team-social a:hover i' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name'     => 'icon_border_hover',
							'label'    => __( 'Border', 'msalon-core' ),
							'selector' => '{{WRAPPER}} .team-box .team-img .overley .team-social a:hover i',
						]
					);
					$this->end_controls_tab();
				$this->end_controls_tabs();
			$this->end_controls_section();
		}

		protected function render() {
			$settings = $this->get_settings();
			$image    = $this->get_settings( 'team_image' );
		?>
        <div class="team-box text-center">
            <div class="team-img">
<!--                <img src="assets/images/team/team-dark-1.jpg" alt="" class="img-responsive">-->
	            <?php echo wp_get_attachment_image( $image['id'], 'large' ); ?>
                <div class="overley">
                    <div class="team-social">
	                    <?php foreach ( $settings['socials'] as $social ): ?>
                            <a href="<?php echo $social['social_link']['url']; ?>" target="_blank"><i class="<?php echo $social['social_icon']; ?>"></i></a>
	                    <?php endforeach;?>
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