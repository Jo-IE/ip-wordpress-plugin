<?php
/**
 * @package joie-plugin
 */

 namespace Includes;

 class Activate{
     public static function activate(){
         flush_rewrite_rules();
     }
 }