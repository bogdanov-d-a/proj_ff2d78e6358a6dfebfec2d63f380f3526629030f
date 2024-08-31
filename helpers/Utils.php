<?php

namespace app\helpers;

class Utils
{
    const DATE_FORMAT = 'Y-m-d';

    public static function js_string_escape($data)
    {
        $safe = "";
        for($i = 0; $i < strlen($data); $i++)
        {
            if(ctype_alnum($data[$i]))
                $safe .= $data[$i];
            else
                $safe .= sprintf("\\x%02X", ord($data[$i]));
        }
        return $safe;
    }
}
