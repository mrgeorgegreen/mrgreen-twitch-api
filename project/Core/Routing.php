<?php
/**
 * Created by PhpStorm.
 * User: mrgreen
 * Date: 09/04/19
 * Time: 6:08 PM
 */

namespace App\Core;


class Routing
{
    /** @var array Rout */
    private $routs = [];

    /**
     * @param Rout $rout
     */
    public function setRout(Rout $rout): void
    {
        $this->routs[] = $rout;
    }

    /**
     * Execute method controller by rote
     * @param Request $request
     */
    public function execute(Request $request): bool
    {
        /** @var Rout $rout */
        foreach ($this->routs as $rout) {
            if ($rout->type === $request->type && $rout->url === $request->url) {

                $calss = $rout->controller;
                try {
                    (new $calss())->{$rout->method}($request);
                } catch (Exception $e){
                    header('HTTP/1.1 405 Method Not Allowed', true, 405);
                }

                return true;
            }
        }

        return false;
    }

}