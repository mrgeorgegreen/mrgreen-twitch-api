<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class LoggerModel extends Eloquent
{
    public $table = 'log';
    protected $fillable = [
        'tag',
        'description'
    ];
}