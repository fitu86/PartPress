<?php
add_filter('acf/load_field', function($field) {
    if ($field['key'] === 'field_68622bd882d83') {
        $field['ajax'] = 0;
    }
    return $field;
});
