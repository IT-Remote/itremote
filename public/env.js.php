<?php
// plugins/itremote/public/env.js.php
header('Content-Type: application/javascript; charset=UTF-8');

echo 'window.GLPI_MAJOR = ' . (int) explode('.', GLPI_VERSION)[0] . ';';
