<?php
// plugins/itremote/public/env.js.php
header('Content-Type: application/javascript; charset=UTF-8');

$ver = defined('GLPI_VERSION') ? GLPI_VERSION : '0.0.0';
$parts = explode('.', $ver);
$major = (int)($parts[0] ?? 0);

// Émet juste du JavaScript, pas de balises <script>
echo 'window.GLPI_VERSION = ' . json_encode($ver) . ';';
echo 'window.GLPI_MAJOR = ' . $major . ';';