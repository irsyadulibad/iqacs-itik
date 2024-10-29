<?php

namespace App\Http\Controllers;

use App\Models\Device;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $devices = Device::with(['values' => function ($query) {
            $query->whereIn('type', ['temperature', 'humidity'])
                ->latest('created_at');
        }])->get()->map(function ($device) {
            $device->temp = $device->values->firstWhere('type', 'temperature');
            $device->humi = $device->values->firstWhere('type', 'humidity');
            return $device;
        });

        return view('pages.dashboard', compact('devices'));
    }
}
