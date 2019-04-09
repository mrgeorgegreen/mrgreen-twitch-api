<?php
/**
 * Created by PhpStorm.
 * User: mrgreen
 * Date: 09/04/19
 * Time: 5:39 PM
 */

namespace App\ApiControllers;

use App\Core\Request;
use App\Models\NotificationsModel;

class GetLogApiControllers
{

    public function get(Request $request): void
    {
        try {
            echo (LoggerModel::all())->toJson();
            logger('GetNotificationApiControllers', json_encode($request));
        } catch (Exception $e) {
            header('HTTP/1.1 405 Method Not Allowed', true, 405);
        }
    }
}