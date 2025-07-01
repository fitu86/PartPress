<?php
function pp_activar_plugin() {
    // Registrar entidades antes de poblar
    pp_registrar_entidades();

    // Poblar años si no existen
    for ($y = 1906; $y <= 2026; $y++) {
        if (!term_exists($y, 'vehicle_year')) {
            wp_insert_term(strval($y), 'vehicle_year');
        }
    }
}
register_activation_hook(__FILE__, 'pp_activar_plugin');
