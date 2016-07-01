<?php

namespace App\Helpers;
/**
 * Created by PhpStorm.
 * User: rene
 * Date: 6/30/16
 * Time: 10:10 PM
 */
class ControllerHelper
{
    static function fix_OPENSHIFT_draw_parameter($request_input){
        /* OPENSHIFT hosting platform is returning the draw request parameter
           as "\\draw", for some obscure reason.
           This function repairs this anomaly.
        */
        $key1 =  "\\draw";
        $key2 =  "draw";
        if (array_key_exists($key1, $request_input)){
            $value = $request_input[$key1];
            $request_input[$key2] = $value;
            unset($request_input[$key1]);
        }

        return $request_input;
    }
}