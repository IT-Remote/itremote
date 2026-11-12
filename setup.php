<?php
/**
 * Plugin IT Remote compatible GLPI ^9 ^10 ^11 ^12
 */

use Glpi\Plugin\Hooks;

define('PLUGIN_ITREMOTE_VERSION', '2.4');
define('PLUGIN_ITREMOTE_MIN_GLPI', '9.0.0');
define('PLUGIN_ITREMOTE_MAX_GLPI', '12.99.99');

function plugin_init_itremote() {
   global $PLUGIN_HOOKS;

   Plugin::registerClass('PluginItremoteItRemoteTab', [
      'addtabon' => ['Computer']
   ]);

   // Assets only for authenticated sessions: anonymous forms must not trigger an
   // "Access Denied" that invalidates the session (and its CSRF token).
   if (Session::isAuthenticated()) {
      // GLPI >= 11 serves the plugin "public" directory as web root
      $assetPrefix = version_compare(GLPI_VERSION, '11.0.0', '<') ? 'public/' : '';

      $PLUGIN_HOOKS[Hooks::ADD_JAVASCRIPT]['itremote'][] = $assetPrefix . 'env.js.php';
      $PLUGIN_HOOKS[Hooks::ADD_JAVASCRIPT]['itremote'][] = $assetPrefix . 'itremote-inject.js';
   }

   // GLPI >= 12 removed this hook: CSRF protection is always enforced
   if (version_compare(GLPI_VERSION, '12.0.0', '<')) {
      $PLUGIN_HOOKS[Hooks::CSRF_COMPLIANT]['itremote'] = true;
   }
}

function plugin_version_itremote() {
   return [
      'name'         => 'IT Remote',
      'version'      => PLUGIN_ITREMOTE_VERSION,
      'author'       => 'IT Remote',
      'license'      => 'GPLv2+',
      'homepage'     => 'https://itremote.com/',
      'requirements' => [
         'glpi' => [
            'min' => PLUGIN_ITREMOTE_MIN_GLPI,
            'max' => PLUGIN_ITREMOTE_MAX_GLPI
         ]
      ]
   ];
}

function plugin_itremote_check_prerequisites() { return true; }
function plugin_itremote_check_config($verbose = false) { return true; }