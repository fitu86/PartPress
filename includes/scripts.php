<?php
function pp_cargar_admin_scripts($hook) {
    global $post;
    if (($hook === 'post-new.php' || $hook === 'post.php') && $post->post_type === 'base_vehicle') {
        wp_enqueue_script('pp-admin-js', plugin_dir_url(__FILE__) . '../assets/js/admin-scripts.js', ['jquery'], '1.0', true);
        wp_localize_script('pp-admin-js', 'pp_ajax_object', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('pp_nonce')
        ]);
    }
}
add_action('admin_enqueue_scripts', 'pp_cargar_admin_scripts');
