<?php
// plugins/itremote/inc/itremotetab.class.php

class PluginItremoteItRemoteTab extends CommonGLPI {

   public function getTabNameForItem(CommonGLPI $item, $withtemplate = 0) {
      if ($item instanceof Computer) {
         return '<span class="d-flex align-items-center"><i class="ti ti-screen-share me-2"></i>IT Remote</span>';
      }
      return '';
   }

   public static function displayTabContentForItem(CommonGLPI $item, $tabnum = 1, $withtemplate = 0) {
      if (!($item instanceof Computer)) {
         return false;
      }

      $name = $item->fields['name'] ?? '';
      $url  = 'https://control.itremote.com/remote/openaccess?devicename=' . rawurlencode($name);

      // Bouton d’ouverture
      echo Html::link(
         __('IT Remote', 'itremote'),
         $url,
         ['class' => 'btn btn-primary', 'target' => '_blank', 'rel' => 'noopener']
      );

      return true;
   }
}