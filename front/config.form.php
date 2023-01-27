<?php
global $DB, $CFG_GLPI;

include("../../../inc/includes.php");
Html::header("Remote support", $_SERVER['PHP_SELF'], 'Tools', 'PluginRemoteController');

$config = new PluginRemoteConfig();

$config->showConfigForm();

Html::footer();
