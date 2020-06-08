<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class Widget_Itl_Portfolio extends Widget_Base {

    public function get_name() {
        return 'itl-portfolio';
    }

    public function get_title() {
        return __('ITL - Portfolio', 'msalon-core');
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
	    return [ 'ithemeslab-widgets' ];
    }

    public function get_script_depends() {
        return [
            'itl-widgets-scripts',
            'itl-frontend-scripts',
            'isotope.pkgd',
            'imagesloaded.pkgd'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_query',
            [
                'label' => __('Post Query', 'msalon-core'),
            ]
        );


        $this->add_control(
            'post_types',
            [
                'label' => __('Post Types', 'msalon-core'),
                'type' => Controls_Manager::SELECT2,
                'default' => 'post',
                'options' => itl_get_all_post_type_options(),
                'multiple' => true
            ]
        );

        $this->add_control(
            'tax_query',
            [
                'label' => __('Taxonomies', 'msalon-core'),
                'type' => Controls_Manager::SELECT2,
                'options' => itl_get_all_taxonomy_options(),
                'multiple' => true,
                'label_block' => true
            ]
        );

        $this->add_control(
            'post_in',
            [
                'label' => __('Post In', 'msalon-core'),
                'description' => __('Provide a comma separated list of Post IDs to display in the grid.', 'msalon-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'msalon-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );

        $this->add_control(
            'advanced',
            [
                'label' => __('Advanced', 'msalon-core'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'msalon-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'none' => __('No order', 'msalon-core'),
                    'ID' => __('Post ID', 'msalon-core'),
                    'author' => __('Author', 'msalon-core'),
                    'title' => __('Title', 'msalon-core'),
                    'date' => __('Published date', 'msalon-core'),
                    'modified' => __('Modified date', 'msalon-core'),
                    'parent' => __('By parent', 'msalon-core'),
                    'rand' => __('Random order', 'msalon-core'),
                    'comment_count' => __('Comment count', 'msalon-core'),
                    'menu_order' => __('Menu order', 'msalon-core'),
                    'post__in' => __('By include order', 'msalon-core'),
                ),
                'default' => 'date',
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __('Order', 'msalon-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'ASC' => __('Ascending', 'msalon-core'),
                    'DESC' => __('Descending', 'msalon-core'),
                ),
                'default' => 'DESC',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_post_content',
            [
                'label' => __('Post Content', 'msalon-core'),
            ]
        );

	    $this->add_control(
		    'per_line',
		    [
			    'label' => __('Columns per row', 'msalon-core'),
			    'type' => Controls_Manager::NUMBER,
			    'min' => 1,
			    'max' => 5,
			    'step' => 1,
			    'default' => 3,
		    ]
	    );

	    $this->add_control(
		    'layout_mode',
		    [
			    'type' => Controls_Manager::SELECT,
			    'label' => __('Choose a layout for the grid', 'msalon-core'),
			    'options' => array(
				    'fitRows' => __('Fit Rows', 'msalon-core'),
				    'masonry' => __('Masonry', 'msalon-core'),
			    ),
			    'default' => 'fitRows',
		    ]
	    );

        $this->add_control(
            'display_content',
            [
                'label' => __('Display posts content', 'msalon-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'msalon-core'),
                'label_off' => __('No', 'msalon-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

	    $this->add_control(
		    'content_pos',
		    [
			    'label'       => __( 'Content Position', 'msalon-core' ),
			    'type' => Controls_Manager::SELECT,
			    'default' => 'outside',
			    'options' => [
				    'outside'  => __( 'Outside', 'msalon-core' ),
				    'inside' => __( 'Inside', 'msalon-core' ),
			    ],
                'condition' => [
                        'display_content' => 'yes',
                ]
		    ]
	    );

        $this->add_control(
            'display_summary',
            [
                'label' => __('Display post excerpt/summary below the post item?', 'msalon-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'msalon-core'),
                'label_off' => __('No', 'msalon-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_post_meta',
            [
                'label' => __('Post Meta', 'msalon-core'),
            ]
        );
	    $this->add_responsive_control(
		    'filter_spacing',
		    [
			    'label' => __( 'Filter Spacing', 'msalon-core' ),
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
			    'size_units' => [ 'px'],
			    'selectors' => [
				    '{{WRAPPER}} .itl-portfolio-nav' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			    ],
		    ]
	    );
	    $this->add_control(
		    'filterable',
		    [
			    'label' => __('Filterable?', 'msalon-core'),
			    'type' => Controls_Manager::SWITCHER,
			    'label_on' => __('Yes', 'msalon-core'),
			    'label_off' => __('No', 'msalon-core'),
			    'return_value' => 'yes',
			    'default' => 'yes',
		    ]
	    );

	    $this->add_control(
		    'taxonomy_filter',
		    [
			    'type' => Controls_Manager::SELECT,
			    'label' => __('Choose the taxonomy to display and filter on.', 'msalon-core'),
			    'label_block' => true,
			    'description' => __('Choose the taxonomy information to display for posts/portfolio and the taxonomy that is used to filter the portfolio/post. Takes effect only if no taxonomy filters are specified when building query.', 'msalon-core'),
			    'options' => itl_get_taxonomies_map(),
			    'default' => 'portfolio_category',
                'condition' => [
                        'filterable' => 'yes'
                ]
		    ]
	    );


        $this->add_control(
            'display_post_date',
            [
                'label' => __('Display post date info below the post item?', 'msalon-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'msalon-core'),
                'label_off' => __('No', 'msalon-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        $this->add_control(
            'display_taxonomy',
            [
                'label' => __('Display taxonomy info below the post item? Choose the right taxonomy in Post Content section above.', 'msalon-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'msalon-core'),
                'label_off' => __('No', 'msalon-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_responsive',
            [
                'label' => __('Gutter Options', 'msalon-core'),
            ]
        );

        $this->add_control(
            'heading_desktop',
            [
                'label' => __( 'Desktop', 'msalon-core' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'gutter',
            [
                'label' => __('Gutter', 'msalon-core'),
                'description' => __('Space between columns in the grid.', 'msalon-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '{{WRAPPER}} .itl-portfolio .itl-portfolio-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'heading_tablet',
            [
                'label' => __( 'Tablet', 'msalon-core' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'tablet_gutter',
            [
                'label' => __('Gutter', 'msalon-core'),
                'description' => __('Space between columns.', 'msalon-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '(tablet-){{WRAPPER}} .itl-portfolio' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '(tablet-){{WRAPPER}} .itl-portfolio .itl-portfolio-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'tablet_width',
            [
                'label' => __('Tablet Resolution', 'msalon-core'),
                'description' => __('The resolution to treat as a tablet resolution.', 'msalon-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 800,
            ]
        );


        $this->add_control(
            'heading_mobile',
            [
                'label' => __( 'Mobile Phone', 'msalon-core' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'mobile_gutter',
            [
                'label' => __('Gutter', 'msalon-core'),
                'description' => __('Space between columns.', 'msalon-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '(mobile-){{WRAPPER}} .itl-portfolio' => 'margin-left: -{{VALUE}}px; margin-right: -{{VALUE}}px;',
                    '(mobile-){{WRAPPER}} .itl-portfolio .itl-portfolio-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'mobile_width',
            [
                'label' => __('Tablet Resolution', 'msalon-core'),
                'description' => __('The resolution to treat as a tablet resolution.', 'msalon-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 480,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_heading_styling',
            [
                'label' => __('Grid Heading', 'msalon-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'heading_tag',
            [
                'label' => __( 'Heading HTML Tag', 'msalon-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'msalon-core' ),
                    'h2' => __( 'H2', 'msalon-core' ),
                    'h3' => __( 'H3', 'msalon-core' ),
                    'h4' => __( 'H4', 'msalon-core' ),
                    'h5' => __( 'H5', 'msalon-core' ),
                    'h6' => __( 'H6', 'msalon-core' ),
                    'div' => __( 'div', 'msalon-core' ),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Heading Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .itl-portfolio-wrap .itl-heading',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_filters_styling',
            [
                'label' => __('Grid Filters', 'msalon-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'filter_color',
            [
                'label' => __( 'Filter Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-taxonomy-filter .itl-filter-item a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'filter_hover_color',
            [
                'label' => __( 'Filter Hover Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-taxonomy-filter .itl-filter-item a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'filter_active_border',
            [
                'label' => __( 'Active Filter Border Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-taxonomy-filter .itl-filter-item.itl-active' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'filter_typography',
                'selector' => '{{WRAPPER}} .itl-portfolio-wrap .itl-taxonomy-filter .itl-filter-item a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_grid_thumbnail_styling',
            [
                'label' => __('Grid Thumbnail', 'msalon-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'thumbnail_hover_bg_color',
            [
                'label' => __( 'Thumbnail Hover Background Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-project-image .itl-image-overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thumbnail_hover_opacity',
            [
                'label' => __( 'Thumbnail Hover Opacity (%)', 'msalon-core' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0.5,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-project-image:hover .itl-image-overlay' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_thumbnail_info',
            [
                'label' => __( 'Thumbnail Info Entry Title', 'msalon-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'title_tag',
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
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-project-image .itl-image-info .itl-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_border_color',
            [
                'label' => __( 'Title Hover Border Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-project-image .itl-image-info .itl-post-title a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-project-image .itl-image-info .itl-post-title',
            ]
        );

        $this->add_control(
            'heading_thumbnail_info_taxonomy',
            [
                'label' => __( 'Thumbnail Info Taxonomy Terms', 'msalon-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'thumbnail_info_tags_color',
            [
                'label' => __( 'Taxonomy Terms Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-project-image .itl-image-info .itl-terms, {{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-project-image .itl-image-info .itl-terms a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tags_typography',
                'selector' => '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-project-image .itl-image-info .itl-terms, {{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-project-image .itl-image-info .itl-terms a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_title_styling',
            [
                'label' => __('Grid Item Entry Title', 'msalon-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_title_tag',
            [
                'label' => __( 'Entry Title HTML Tag', 'msalon-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'msalon-core' ),
                    'h2' => __( 'H2', 'msalon-core' ),
                    'h3' => __( 'H3', 'msalon-core' ),
                    'h4' => __( 'H4', 'msalon-core' ),
                    'h5' => __( 'H5', 'msalon-core' ),
                    'h6' => __( 'H6', 'msalon-core' ),
                    'div' => __( 'div', 'msalon-core' ),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'entry_title_color',
            [
                'label' => __( 'Entry Title Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .entry-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_title_typography',
                'selector' => '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .entry-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_summary_styling',
            [
                'label' => __('Grid Item Entry Summary', 'msalon-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'entry_summary_color',
            [
                'label' => __( 'Entry Summary Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .entry-summary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_summary_typography',
                'selector' => '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .entry-summary',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_meta_styling',
            [
                'label' => __('Grid Item Entry Meta', 'msalon-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_entry_meta',
            [
                'label' => __( 'Entry Meta', 'msalon-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'entry_meta_color',
            [
                'label' => __( 'Entry Meta Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-entry-meta span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_typography',
                'selector' => '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-entry-meta span',
            ]
        );


        $this->add_control(
            'heading_entry_meta_link',
            [
                'label' => __( 'Entry Meta Link', 'msalon-core' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'entry_meta_link_color',
            [
                'label' => __( 'Entry Meta Link Color', 'msalon-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-entry-meta span a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_link_typography',
                'selector' => '{{WRAPPER}} .itl-portfolio-wrap .itl-portfolio .itl-portfolio-item .itl-entry-meta span a',
            ]
        );

        $this->end_controls_section();

    }


    function posts_grid($loop, $settings, $taxonomies) {
        $column_style = itl_get_column_class(intval($settings['per_line'])); ?>
        <?php $current_page = get_queried_object_id(); ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php $post_id = get_the_ID(); ?>
            <?php
            if ($post_id === $current_page)
                continue; // skip current page since we can run into infinite loop when users choose All option in build query
            ?>
            <?php
            $style = '';
            $meta = '';

            foreach ($taxonomies as $taxonomy) {
                $terms = get_the_terms($post_id, $taxonomy);
                if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        $style .= ' ' . $term->slug;
                        $meta .= '<li>'.$term->name .'</li>';
                    }
                }
            }
            ?>

            <div class="itl-portfolio-item<?php echo $style ?> portfolio-column-<?php echo $settings['per_line'] ?>">
                <div class="itl-portfolio-thumb">
                    <img src="<?php echo get_the_post_thumbnail_url($post_id, 'itl_portfolio_rect_sm_thumb') ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                    <div class="img-overley"></div>
                    <div class="buttons">
                        <span><a href="<?php echo get_the_post_thumbnail_url($post_id, 'itl_portfolio_rect_lg_thumb') ?>" class="portfolio-popup"><i class="fa fa-search"></i></a></span>
                        <span><a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-link"></i></a></span>
                    </div>
		            <?php if($settings['display_content'] == 'yes' && $settings['content_pos'] == 'inside') : ?>
                    <div class="itl-portfolio-content">
                        <h4><?php echo get_the_title(); ?></h4>
                        <div class="meta">
                            <ul>
	                            <?php echo $meta; ?>
                            </ul>
                        </div>
                    </div>
		            <?php endif; ?>
                </div>
                <?php if($settings['display_content'] == 'yes' && $settings['content_pos'] == 'outside') : ?>
                <div class="itl-portfolio-content">
                    <h4><?php echo get_the_title(); ?></h4>
                    <div class="meta">
                        <ul>
				            <?php echo $meta; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php
    }

    protected function render() {

        $settings = $this->get_settings();
        // Use the processed post selector query to find posts.
        $query_args = itl_build_query_args($settings);
        $loop = new \WP_Query($query_args);
        // Loop through the posts and do something with them.
        if ($loop->have_posts()) :
            // Check if any taxonomy filter has been applied
            list($chosen_terms, $taxonomies) = itl_get_chosen_terms($settings['tax_query']);
            if (empty($chosen_terms))
                $taxonomies[] = $settings['taxonomy_filter'];
            ?>
            <div class="itl-portfolio-wrap itl-container">
                <?php if (!empty($settings['heading']) || $settings['filterable'] == 'yes'): ?>
                    <div class="itl-portfolio-header">
                        <?php
                        if ($settings['filterable'] == 'yes')
                            echo itl_get_taxonomy_terms_filter($taxonomies, $chosen_terms);
                        ?>
                    </div>
                <?php endif; ?>

                <div id="itl-portfolio-<?php echo uniqid(); ?>"
                     class="itl-portfolio itl-<?php echo esc_attr($settings['layout_mode']); ?>"
                     data-isotope-options='{ "itemSelector": ".itl-portfolio-item", "layoutMode": "<?php echo esc_attr($settings['layout_mode']); ?>" }'>
                    <?php $this->posts_grid($loop, $settings, $taxonomies); ?>
                </div><!-- Isotope items -->
            </div>
            <?php
        endif;
    }

    protected function content_template() {
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Itl_Portfolio() );