<?php
/**
 * Plugin IT Remote compatible GLPI ^9 ^10 ^11
 */

use Glpi\Plugin\Hooks;

define('PLUGIN_ITREMOTE_VERSION', '2.3');
define('PLUGIN_ITREMOTE_MIN_GLPI', '9.0.0');
define('PLUGIN_ITREMOTE_MAX_GLPI', '11.99.99');

function plugin_init_itremote() {
   global $PLUGIN_HOOKS;

   Plugin::registerClass('PluginItremoteItRemoteTab', [
      'addtabon' => ['Computer']
   ]);

   $PLUGIN_HOOKS[Hooks::ADD_JAVASCRIPT]['itremote'][] = 'public/env.js.php';
   $PLUGIN_HOOKS[Hooks::ADD_JAVASCRIPT]['itremote'][] = 'public/itremote-inject.js';

   $PLUGIN_HOOKS[Hooks::CSRF_COMPLIANT]['itremote'] = true;
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