<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceValueResource;
use App\Models\Device;
use App\Models\DeviceValue;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function show(Device $device)
    {
        return view('pages.device.show', compact('device'));
    }

    public function deviceValue(Device $device, Request $request)
    {
        $records = DeviceValue::where('type', $request->type ?? 'temperature')
            ->where('device_id', $device->id)
            ->orderBy('created_at', 'desc')
            ->limit(7)
            ->get();

        return DeviceValueResource::collection($records);
    }
}
