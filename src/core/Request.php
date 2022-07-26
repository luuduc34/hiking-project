<?php

class Request
{
    public static function uri(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}