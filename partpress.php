<?php
/**
 * Plugin Name:       PartPress
 * Description:       Plugin para gestionar marcas, modelos y vehículos base.
 * Version:           1.0
 * Author:            Rafa
 * License:           GPL v2 or later
 * Text Domain:       partpress
 */

if (!defined('ABSPATH')) exit;

// Incluir módulos
require_once __DIR__ . '/includes/register-types.php';
require_once __DIR__ . '/includes/activation.php';
require_once __DIR__ . '/includes/ajax-handlers.php';
require_once __DIR__ . '/includes/scripts.php';
require_once __DIR__ . '/includes/validation.php';
require_once __DIR__ . '/includes/acf-hooks.php';
require_once __DIR__ . '/includes/admin-notices.php';
