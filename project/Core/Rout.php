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
    /** @var string Type of HTTP request POST GET */
    private $type;

    /** @var string Part of HTTP request POST GET */
    private $url;

    /** @var string Class Controller */
    private $controller;

    /** @var string Method of Class Controller */
    private $method;

    public function __construct(string $type, string $url, string $controller, string $method)
    {
        $this->type = $type;
        $this->url = $url;
        $this->controller = $controller;
        $this->method = $method;
    }

    public function __get($name): ?string
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