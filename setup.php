<?php

/**
 * -------------------------------------------------------------------------
 * IT Remote plugin for GLPI
 * -------------------------------------------------------------------------
 *
 * LICENSE
 *
 * IT Remote plugin is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * IT Remote plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with IT Remote. If not, see <http://www.gnu.org/licenses/>.
 * -------------------------------------------------------------------------
 * @copyright Copyright (C) 2023 by IT Remote plugin team.
 * @license   GPLv2 https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://itremote.com
 * -------------------------------------------------------------------------
 */

use Glpi\Plugin\Hooks;

define('PLUGIN_ITREMOTE_VERSION', '2.0');

// Minimal GLPI version, inclusive
define('PLUGIN_ITREMOTE_MIN_GLPI', '0.85.4');
// Maximum GLPI version, exclusive
define('PLUGIN_ITREMOTE_MAX_GLPI', '10.0.99');

/**
 * Init hooks of the plugin.
 * REQUIRED
 *
 * @return void
 */
function plugin_init_itremote()
{
    global $PLUGIN_HOOKS;
    $PLUGIN_HOOKS[Hooks::CSRF_COMPLIANT]['itremote'] = true;
    $PLUGIN_HOOKS['config_page']['itremote'] = 'front/itremote.form.php';
    $PLUGIN_HOOKS[Hooks::ADD_JAVASCRIPT]['itremote'] = './itremote.js';
}

/**
 * Get the name and the version of the plugin
 * REQUIRED
 *
 * @return array
 */
function plugin_version_itremote()
{
    return [
        'name' => 'IT Remote',
        'version' => PLUGIN_ITREMOTE_VERSION,
        'author' => 'IT Remote',
        'license' => 'GPLv2+',
        'homepage' => 'https://itremote.com/',
        'requirements'   => [
            'glpi' => [
               'min' => PLUGIN_ITREMOTE_MIN_GLPI,
               'max' => PLUGIN_ITREMOTE_MAX_GLPI,
            ]
        ]
    ];
}

/**
 * Check pre-requisites before install
 * OPTIONNAL, but recommanded
 *
 * @return boolean
 */
function plugin_itremote_check_prerequisites()
{
    if (false) {
        return false;
     }
     return true;
}

/**
 * Check configuration process
 *
 * @param boolean $verbose Whether to display message on failure. Defaults to false
 *
 * @return boolean
 */
function plugin_itremote_check_config($verbose = false)
{
    if (true) {
        return true;
     }
  
     if ($verbose) {
        echo __('Installed / not configured', 'itremote');
     }
     return false;
}