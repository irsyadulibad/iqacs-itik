<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'device_id',
        'relay_id',
        'type',
        'start',
        'end',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
