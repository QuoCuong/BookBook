<?php
if (!function_exists('convert_to_default_date_format')) {
    function convert_to_default_date_format($string)
    {
        $strings = explode('/', $string);
        $result  = $strings[2] . '-' . $strings[1] . '-' . $strings[0];

        return $result;
    }
}
