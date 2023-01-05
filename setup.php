<?php

use Glpi\Plugin\Hooks;

// Main plugin
function plugin_init_remote()
{
    global $PLUGIN_HOOKS;
    $PLUGIN_HOOKS['csrf_compliant']['remote'] = true;

    $PLUGIN_HOOKS['config_page']['remote'] = 'front/config.form.php';

    $PLUGIN_HOOKS[Hooks::PRE_ITEM_FORM]['remote'] = [PluginRemoteRemote::class, 'button_support'];
}

// Obligatoire
function plugin_version_remote()
{
    return array('name' => "IT Remote",
        'version' => '1.2',
        'author' => 'IT Remote',
        'license' => 'GPLv2+',
        'homepage' => 'https://itremote.com/',
        'minGlpiVersion' => '0.85.4');
}

// Obligatoire
function plugin_remote_check_prerequisites()
{
    return true;
}

// Obligatoire
function plugin_remote_check_config($verbose = false)
{
    if (true) { // Your configuration check
        return true;
    }
    if ($verbose) {
        echo 'Installed / not configured';
    }
    return false;
}
