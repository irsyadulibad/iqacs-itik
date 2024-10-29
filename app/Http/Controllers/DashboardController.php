<?php

namespace App\Http\Controllers;

use App\Models\Device;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $devices = Device::all()->map(function ($device) {
            $device->temp = $device->values()
                ->where('device_id', $device->id)
                ->where('type', 'temperature')
                ->orderBy('created_at', 'desc')
                ->first();

            $device->humi = $device->values()
                ->where('device_id', $device->id)
                ->where('type', 'humidity')
                ->orderBy('created_at', 'desc')
                ->first();

            return $device;
        });

        return view('pages.dashboard', compact('devices'));
    }
}
