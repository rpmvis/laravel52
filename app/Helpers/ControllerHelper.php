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
        /* OPENSHIFT hosting platform is prefixing the first request parameter (¨draw)"
           with "\\" ("\\draw"), for some obscure reason.
           This function repairs this anomaly.
        */
        reset($request_input); // reset array pointer to first item
        $first_key = key($request_input); // "\\draw"

        if ($first_key[0] == "\\"){
            $value = $request_input[$first_key];
            $first_key2 = substr($first_key, 1); // strip "\\" from "\\draw"
            $request_input[$first_key2] = $value;
            unset($request_input[$first_key]);
        }

        return $request_input;
    }
}