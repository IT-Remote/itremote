<!-- ============================================================================//
//==             Plugin pour GLPI - Dévelloppeur: IT Remote - ©2023         ==//
//==                        https://itremote.com                             ==//
//============================================================================// -->

<?php

// Required
function plugin_init_itremote()
{
    global $PLUGIN_HOOKS;
    $PLUGIN_HOOKS['csrf_compliant']['itremote'] = true;
    $PLUGIN_HOOKS['config_page']['itremote'] = 'front/itremote.form.php';
    $PLUGIN_HOOKS['add_javascript']['itremote'] = 'js/itremote.js';
}

// Required
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

// Required
function plugin_itremote_check_prerequisites()
{
    return true;
}

// Required
function plugin_itremote_check_config($verbose = false)
{
    return true;
}
?>