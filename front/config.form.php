<?php
global $DB, $CFG_GLPI;

include("../../../inc/includes.php");
Html::header("Remote support", $_SERVER['PHP_SELF'], 'Tools', 'PluginRemoteController');

$config = new PluginRemoteConfig();

if (!empty($_POST)) {

    //controllo che ci sia uno slash finale nella url
    $url = $_POST['url'];
    if (!str_ends_with($url, "/")) {
        $url .= "/";
    }
    $DB->update(
        'glpi_plugin_remote', [
        'url' => $url,
        'password' => $_POST['password'],
        'enableNoVnc' => $_POST['enableNoVnc'],
        'enableVnc' => $_POST['enableVnc']

    ],
        [1 => 1]
    );

}
$config->showConfigForm();

Html::footer();
