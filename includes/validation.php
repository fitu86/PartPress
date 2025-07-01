<?php
function pp_validar_unicidad_base_vehicle($post_id, $post, $update) {
    if ($post->post_type !== 'base_vehicle' || wp_is_post_revision($post_id)) return;

    $make = get_field('marca', $post_id);
    $model = get_field('modelo', $post_id);
    $years = get_the_terms($post_id, 'vehicle_year');

    if (!$make || !$model || empty($years)) return;

    $year_id = $years[0]->term_id;
    $query = new WP_Query([
        'post_type' => 'base_vehicle',
        'post__not_in' => [$post_id],
        'meta_query' => [
            ['key' => 'marca', 'value' => $make],
            ['key' => 'modelo', 'value' => $model],
        ],
        'tax_query' => [[
            'taxonomy' => 'vehicle_year',
            'field' => 'term_id',
            'terms' => $year_id,
        ]]
    ]);

    if ($query->have_posts()) {
        set_transient('pp_error', 'Ya existe ese vehículo base.', 5);
        wp_update_post(['ID' => $post_id, 'post_status' => 'draft']);
    }
}
add_action('save_post', 'pp_validar_unicidad_base_vehicle', 10, 3);
