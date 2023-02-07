<!-- ============================================================================//
//==             Plugin pour GLPI - Dévelloppeur: IT Remote - ©2023         ==//
//==                        http://itremote.com                             ==//
//============================================================================// -->

<?php

// Creation du button IT Remote
class PluginItremoteController
{
    static public function button_support($params)
    {
        $item = $params['item'];
        if ($item::getType() != Computer::class)
            return;

        $name = $item->fields['name'];
        $encode = urlencode($name);
        $out = "<div class='container'>
                    <div class='btn' style='background: linear-gradient(45deg, #4d8aff, #ccd6e0);'>
                        <a href='https://control.itremote.com/Remote/OpenAccess?deviceName=$encode' target='_blank'>
                        IT Remote
                        </a>
                    </div>
                </div>";
        echo $out;
    }
}
?>