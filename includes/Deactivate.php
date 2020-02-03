<?php
/**
 * @package joie-plugin
 */

namespace Includes;

 class Deactivate{
     public static function deactivate(){
         flush_rewrite_rules();
     }
 }