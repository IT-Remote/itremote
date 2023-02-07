<!-- ============================================================================//
//==             Plugin pour GLPI - Dévelloppeur: IT Remote - ©2023         ==//
//==                        http://itremote.com                             ==//
//============================================================================// -->

<?php

// Main plugin
function plugin_init_itremote()
{
    global $PLUGIN_HOOKS;
    $PLUGIN_HOOKS['csrf_compliant']['itremote'] = true;

    $PLUGIN_HOOKS['config_page']['itremote'] = 'front/config.form.php';

    $PLUGIN_HOOKS['pre_item_form']['itremote'] = ['PluginItremoteController', 'button_support'];

}

// Obligatoire
function plugin_version_itremote()
{
    return array(
        'name' => "IT Remote",
        'version' => '1.5',
        'author' => 'IT Remote',
        'license' => 'GPLv2+',
        'homepage' => 'https://itremote.com/',
        'minGlpiVersion' => '0.85.4'
    );
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

?>