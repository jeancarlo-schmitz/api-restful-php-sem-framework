<?php
/**
 * Created by PhpStorm.
 * User: jean.schmitz
 * Date: 23/05/2023
 * Time: 16:48
 */

namespace utils;


class JsonHelper
{
    public static function toJson($data): string
    {
        return json_encode($data, true);
    }

    public static function jsonToArray($data): array
    {
        return json_decode($data, true);
    }

    public static function jsonToObject($data): object
    {
        return json_decode($data);
    }

    public static function toJsonUtf8($data): string
    {
        $data = EncodingConverter::convertNestedArrayToUtf8($data);
        return json_encode($data, true);
    }

    public static function getHeader()
    {
       return 'Content-Type: application/json';
    }
}