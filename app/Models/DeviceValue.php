<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceValue extends Model
{
    public $fillable = [
        'device_id',
        'type',
        'value',
    ];
}
