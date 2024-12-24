<?php

namespace App\Support;

class StringHelper
{
    public static function ucfirstMb($string, $encoding = 'UTF-8')
    {
        return mb_strtoupper(mb_substr($string, 0, 1, $encoding), $encoding) . mb_substr($string, 1, null, $encoding);
    }
}