<?php
add_action('wp_ajax_pp_get_models_by_make', function() {
    check_ajax_referer('pp_nonce', 'nonce');

    $make_id = intval($_POST['make_id'] ?? 0);
    if (!$make_id) wp_send_json_error('ID no válido');

    $posts = get_posts([
        'post_type' => 'vehicle_model',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'tax_query' => [[
            'taxonomy' => 'make',
            'field' => 'term_id',
            'terms' => $make_id
        ]]
    ]);

    $data = array_map(fn($p) => ['id' => $p->ID, 'text' => $p->post_title], $posts);
    wp_send_json_success($data);
});
