<?php

use Glpi\Plugin\Hooks;

// Main plugin
function plugin_init_itremote()
{
    global $PLUGIN_HOOKS;
    $PLUGIN_HOOKS['csrf_compliant']['itremote'] = true;

    $PLUGIN_HOOKS['config_page']['itremote'] = 'front/config.form.php';

    $PLUGIN_HOOKS[Hooks::PRE_ITEM_FORM]['itremote'] = [PluginItremoteController::class, 'button_support'];

}

// Obligatoire
function plugin_version_itremote()
{
    return array('name' => "IT Remote",
        'version' => '1.2',
        'author' => 'IT Remote',
        'license' => 'GPLv2+',
        'homepage' => 'https://itremote.com/',
        'minGlpiVersion' => '0.85.4');
}

// Obligatoire
function plugin_itremote_check_prerequisites()
{
    return true;
}

// Obligatoire
function plugin_itremote_check_config($verbose = false)
{
    return true;
}
