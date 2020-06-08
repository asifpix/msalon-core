<?php
add_action( 'cmb2_admin_init', 'msaloon_banner_metabox' );

function msaloon_banner_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_msaloon_';

    $msaloon_banner = new_cmb2_box( array(
        'id'            => 'banner_meta',
        'title'         => esc_html__( 'Banner', 'msalon-core' ),
        'object_types'  => array( 'page', 'post', 'project' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $msaloon_banner->add_field( array(
        'name' => esc_html__( 'Banner Background Image', 'imperial-core' ),
        'desc' => esc_html__( 'This will override the default banner', 'imperial-core' ),
        'id'   => 'banner_bg_img',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
    ) );
	$msaloon_banner->add_field( array(
		'name' => esc_html__( 'Banner Image', 'imperial-core' ),
		'id'   => 'banner_img',
		'type' => 'file',
		'options' => array(
			'url' => false,
		),
	) );
}