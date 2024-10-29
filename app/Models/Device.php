<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'latitude',
        'longitude',
    ];

    public function values()
    {
        return $this->hasMany(DeviceValue::class);
    }
}
