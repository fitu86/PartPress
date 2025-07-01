<?php
add_action('admin_notices', function() {
    if ($msg = get_transient('pp_error')) {
        echo '<div class="notice notice-error"><p>' . esc_html($msg) . '</p></div>';
        delete_transient('pp_error');
    }
});
