<?php

function builder_service_cpt() {
    $labels = array(
        'name'               => __( 'Services', 'msalon-core' ),
        'singular_name'      => __( 'Service', 'msalon-core' ),
        'menu_name'          => __( 'Services', 'msalon-core' ),
        'name_admin_bar'     => __( 'Service', 'msalon-core' ),
        'add_new'            => __( 'Add New Service', 'msalon-core' ),
        'add_new_item'       => __( 'Add New Service', 'msalon-core' ),
        'new_item'           => __( 'New Service', 'msalon-core' ),
        'edit_item'          => __( 'Edit Service', 'msalon-core' ),
        'view_item'          => __( 'View Service', 'msalon-core' ),
        'all_items'          => __( 'All Services', 'msalon-core' ),
        'search_items'       => __( 'Search Services', 'msalon-core' ),
        'parent_item_colon'  => __( 'Parent Service:', 'msalon-core' ),
        'not_found'          => __( 'No service found.', 'msalon-core' ),
        'not_found_in_trash' => __( 'No service found in Trash.', 'msalon-core' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'msalon-core' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
    );

    register_post_type( 'service', $args );
}
add_action( 'init', 'builder_service_cpt' );
//
//function builder_service_taxonomy() {
//
//    $labels = array(
//        'name'              => __( 'Service Types', 'msalon-core' ),
//        'singular_name'     => __( 'Service Type', 'msalon-core' ),
//        'search_items'      => __( 'Search Service Types', 'msalon-core' ),
//        'all_items'         => __( 'All Service Types', 'msalon-core' ),
//        'parent_item'       => __( 'Parent Service Type', 'msalon-core' ),
//        'parent_item_colon' => __( 'Parent Service Type:', 'msalon-core' ),
//        'edit_item'         => __( 'Edit Service Type', 'msalon-core' ),
//        'update_item'       => __( 'Update Service Type', 'msalon-core' ),
//        'add_new_item'      => __( 'Add New Service Type', 'msalon-core' ),
//        'new_item_name'     => __( 'New Service Type Name', 'msalon-core' ),
//        'menu_name'         => __( 'Service Type', 'msalon-core' ),
//    );
//
//    $args = array(
//        'hierarchical'      => true,
//        'labels'            => $labels,
//        'show_ui'           => true,
//        'show_admin_column' => true,
//        'query_var'         => true,
//        'show_in_nav_menus' => false,
//        'rewrite'           => array( 'slug' => 'service-type' ),
//    );
//
//    register_taxonomy( 'service_type', array( 'service' ), $args );
//
//}
//add_action( 'init', 'builder_service_taxonomy', 0 );
