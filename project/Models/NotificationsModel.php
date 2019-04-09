<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class NotificationsModel extends Eloquent
{
    public $table = 'notifications';
    protected $fillable = [
        'user_id',
        'started_at',
        'data'
    ];
}