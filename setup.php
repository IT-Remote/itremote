<?php

use Glpi\Plugin\Hooks;

// Main plugin
function plugin_init_itremote()
{
    global $PLUGIN_HOOKS;
    $PLUGIN_HOOKS['csrf_compliant']['itremote'] = true;

    $PLUGIN_HOOKS['config_page']['itremote'] = 'front/config.form.php';

    $PLUGIN_HOOKS[Hooks::PRE_ITEM_FORM]['itremote'] = [PluginRemoteRemote::class, 'button_support'];
}

// Obligatoire
function plugin_version_itremote()
{
    return array('name' => "IT Remote",
        'version' => '1.0.0',
        'author' => 'IT Remote',
        'license' => 'GPLv2+',
        'homepage' => 'https://itremote.com/',
        'minGlpiVersion' => '0.83');
}

// Obligatoire
function plugin_itremote_check_prerequisites()
{
    return true;
}

// Obligatoire
function plugin_itremote_check_config($verbose = false)
{
    if (true) { // Your configuration check
        return true;
    }
    if ($verbose) {
        echo 'Installed / not configured';
    }
    return false;
}