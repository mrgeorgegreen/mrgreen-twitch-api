<?php
/**
 * Created by PhpStorm.
 * User: mrgreen
 * Date: 09/04/19
 * Time: 5:48 PM
 */

namespace App\Core;

class Rout
{
    /** @var String Type of HTTP request POST GET */
    private $type;

    /** @var String Part of HTTP request POST GET */
    private $url;

    /** @var String Class Controller */
    private $controller;

    /** @var String Method of Class Controller */
    private $method;

    public function __construct(String $type, String $url, String $controller, String $method)
    {
        $this->type = $type;
        $this->url = $url;
        $this->controller = $controller;
        $this->method = $method;
    }

    public function __get($name): ?String
    {
        if (!property_exists($this, $name)) {
            return null;
        }

        return $this->$name;
    }

    public function __set($name, $value)
    {
        return null;
    }

}