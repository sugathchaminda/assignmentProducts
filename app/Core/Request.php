<?php

namespace App\Core;

class Request
{
    /**
     * @return string
     */
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /**
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param $method
     * @return bool
     */
    public static function is($method)
    {
        return strtoupper($method) == $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        return $_REQUEST[$key];
    }
}