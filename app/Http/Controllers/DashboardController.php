<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Repository\ControlStateRepository;

class DashboardController extends Controller
{
    private ControlStateRepository $controlRepo;

    public function __construct()
    {
        $this->controlRepo = new ControlStateRepository;
    }

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

            $device->ammo = $device->values()
                ->where('device_id', $device->id)
                ->where('type', 'ammonia')
                ->orderBy('created_at', 'desc')
                ->first();

            $device->lastUpdated = $device->values()->orderBy('created_at', 'desc')->first()->created_at;
            $device->state = $this->controlRepo->getState($device->id);

            return $device;
        });

        return view('pages.dashboard', compact('devices'));
    }
}
