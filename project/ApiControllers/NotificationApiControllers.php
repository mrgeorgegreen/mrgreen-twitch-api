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

class NotificationApiControllers
{

    public function acceptSubscribes(Request $request): void
    {
        if ($request->hub_challenge) {

            echo $request->hub_challenge;
//            header('200 OK', true, 200);
        }
    }

    public function addNotification(Request $request): void
    {
        if (isset($request->content['data'])) {
            try {
                foreach ($request->content['data'] as $notification) {

                    NotificationsModel::create([
                        'user_id' => $notification->user_id,
                        'started_at' => $notification->started_at,
                        'data' => json_encode($notification)
                    ]);

//                    header('200 OK', true, 200);
                }
            } catch (\Exception $e) {
                header('HTTP/1.1 405 Method Not Allowed', true, 400);
            }
        }
    }
}