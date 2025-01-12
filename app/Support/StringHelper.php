<?php

namespace App\Support;

/**
 * Класс для вспомогательных методов для строк.
 */
class StringHelper
{
    /**
     * Функция возвращает строку, преобразуя первую букву в заглавную.
     * 
     * @param string $string Строка, которую нужно преобразовать.
     * @param string $encoding Кодировка. По умолчанию UTF-8.
     * @return string Преобразованная строка, в которой первая буква — заглавная.
     */
    public static function ucfirstMb($string, $encoding = 'UTF-8')
    {
        return mb_strtoupper(mb_substr($string, 0, 1, $encoding), $encoding) . mb_substr($string, 1, null, $encoding);
    }
}