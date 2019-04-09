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

class GetNotificationApiControllers
{

    public function get(Request $request): void
    {
        try {
            echo (NotificationsModel::all())->toJson();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}