<?php

// Creation du button IT Remote
class PluginItremoteController extends CommonGLPI
{
    static public function button_support($params)
    {
        $item = $params['item'];
        if ($item::getType() != Computer::class)
            return;

        $name = $item->fields['name'];
        $encode = urlencode($name);
        $out = "<div class='container'>
                    <div class='btn'>
                        <a href='https://control.itremote.com/Remote/OpenAccess?deviceName=$encode' target='_blank'>
                        IT Remote
                        </a>
                    </div>
                </div>";
        echo $out;
    }
}