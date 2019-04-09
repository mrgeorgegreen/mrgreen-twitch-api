<?php
/**
 * Created by PhpStorm.
 * User: mrgreen
 * Date: 09/04/19
 * Time: 6:39 PM
 */

namespace App\Core;


class Request
{
    private $type;
    private $url;
    private $content = [];

    function __construct()
    {
        foreach (($_GET ?? []) as $key => $value) {
            $this->$key = $value;
        }

        $this->type = $_SERVER['REQUEST_METHOD'];
        $this->url = $_SERVER['REDIRECT_URL'] ?? '/';
        $this->content = $this->httpPost();
    }

    private function httpPost(): array
    {
        try {
            return json_decode((file_get_contents('php://input') ?? ''), true);
        } catch (Exception | Throwable $e) {
            return [];
        }
    }

    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            return null;
        }

        return $this->$name;
    }

}