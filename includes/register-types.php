<?php
function pp_registrar_entidades() {

    register_taxonomy('make', ['vehicle_model', 'base_vehicle'], [
        'hierarchical' => true,
        'labels' => ['name' => __('Marcas', 'partpress')],
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'marca'],
    ]);

    register_taxonomy('vehicle_year', ['base_vehicle'], [
        'hierarchical' => true,
        'labels' => ['name' => __('Años', 'partpress')],
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'ano'],
    ]);

    register_post_type('vehicle_model', [
        'labels' => ['name' => __('Modelos de Vehículo', 'partpress')],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'modelos'],
        'supports' => ['title'],
        'taxonomies' => ['make'],
        'menu_icon' => 'dashicons-list-view',
    ]);

    register_post_type('base_vehicle', [
        'labels' => ['name' => __('Vehículos Base', 'partpress')],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'vehiculos'],
        'supports' => ['title'],
        'taxonomies' => ['vehicle_year'],
        'menu_icon' => 'dashicons-car',
    ]);
}
add_action('init', 'pp_registrar_entidades');
